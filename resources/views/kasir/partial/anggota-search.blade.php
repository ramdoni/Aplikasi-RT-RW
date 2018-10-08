<!-- .tmp-search -->
<div class="white-box" style="position:relative;">
    <h2># {{ $data->name }} / {{ $data->no_anggota }}</h2>
    <hr style="margin-top:0;" >
    <h3 class="pull-right" style="position: absolute;top:0;right:30px;cursor:pointer;" onclick="delete_el(this)"><i class="fa fa-close"></i></h3>
    <div class="col-md-2">
        <h3 style="margin-top: 0;"><small>Simpanan Wajib</small>
            <br /> Rp. {{ number_format(simpanan_wajib($data->id)->where('status', 3)->sum('nominal')) }}
                                        </h3>
        <label class="btn btn-info btn-xs" onclick="topup_simpanan_wajib()"><i class="fa fa-plus"></i> Topup</label>
    
        <p>Jatuh tempo pembayaran selanjutnya<br /> <label class="text-danger">{{ date('d F Y', strtotime($data->first_durasi_pembayaran_date ." + ". $data->durasi_pembayaran ." month") ) }}</label></p>
    </div>
    <div class="col-md-2">
        <h3><small>Simpanan Pokok</small><br /> Rp. {{ number_format(simpanan_pokok($data->id)->where('status', 3)->sum('nominal')) }}</h3>
        @if(simpanan_pokok($data->id)->where('status', 3)->sum('nominal') == 0)
            <label class="btn btn-info btn-xs" onclick="topup_simpanan_pokok()"><i class="fa fa-plus"></i> Topup</label>
        @endif
    </div>
    <div class="col-md-2">
        <h3><small>Simpanan Sukarela</small><br /> Rp. {{ number_format(simpanan_sukarela($data->id)->where('status', 3)->sum('nominal')) }}</h3>
        <label class="btn btn-info btn-xs" onclick="topup()"><i class="fa fa-plus"></i> Topup</label>
    </div>
    <div class="clearfix"></div>
    <hr />
    <br />
     <div>
        <div class="col-md-2">
            <ul class="nav tabs-vertical">
                <li class="tab active">
                    <a data-toggle="tab" href="#simpanan_pokok" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Simpanan Pokok</span> </a>
                </li>
                <li class="tab">
                    <a data-toggle="tab" href="#simpanan_sukarela" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Simpanan Sukarela</span> </a>
                </li>
                <li class="tab">
                    <a aria-expanded="false" data-toggle="tab" href="#simpanan_wajib"> <span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Simpanan Wajib</span> </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="tab-content" style="margin-top:0;">
                <div id="simpanan_pokok" class="tab-pane active">
                    <h3>Simpanan Pokok</h3>
                    <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>User Proses</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(simpanan_pokok($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ number_format($item->nominal) }}</td>    
                                <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>    
                                <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>
                                <td>
                                    <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="simpanan_sukarela" class="tab-pane">
                    <h3>Simpanan Sukarela</h3>
                    <table id="data_table2" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>User Proses</th>
                                <th>#</th>
                            </tr>
                        </thead>
                         <tbody>
                        @foreach(simpanan_sukarela($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ number_format($item->nominal) }}</td>    
                                <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>    
                                <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>
                                <td>
                                    <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="simpanan_wajib" class="tab-pane">
                    <h3>Simpanan Wajib</h3>
                    <table id="data_table3" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>User Proses</th>
                                <th></th>
                            </tr>
                        </thead>
                         <tbody>
                        @foreach(simpanan_wajib($data->id)->orderBy('id', 'DESC')->get() as $no => $item)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ number_format($item->nominal) }}</td>    
                                <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>  
                                <td>{{ isset($item->user_proses->name) ? $item->user_proses->name : '' }}</td>  
                                <td>
                                    <a href="{{ route('admin.anggota.cetak-kwitansi', $item->id) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> cetak kwitansi</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>