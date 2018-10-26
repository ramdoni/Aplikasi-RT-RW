<?php

/**
 * [total_warga_rt description]
 * @param  [type] $rt [description]
 * @return [type]     [description]
 */
function total_warga_rt()
{
  return \App\Models\Users::where('access_id', 2)->where('access_id', 4)
                            ->where('perumahan_id', \Auth::user()->perumahan_id)
                            ->where('rt_id', \Auth::user()->rt_id)
                            ->where('rw_id', \Auth::user()->rw_id)
                            ->count();
}

/**
 * [total_iuran_rt description]
 * @return [type] [description]
 */
function total_iuran_rt()
{
  return \App\Models\IuranWarga::join('users', 'users.id','=','iuran_warga.user_id')
                                ->where('iuran_warga.status', 2)
                                ->where('users.perumahan_id', \Auth::user()->perumahan_id)
                                ->where('users.rt_id', \Auth::user()->rt_id)
                                ->where('users.rw_id', \Auth::user()->rw_id)
                                ->sum('nominal');
}

/**
 * [total_iuran_rt description]
 * @return [type] [description]
 */
function total_pengeluaran_rt()
{
  return \App\Models\Pengeluaran::join('users', 'users.id','=','pengeluaran.user_id')
                                ->where('users.perumahan_id', \Auth::user()->perumahan_id)
                                ->where('users.rt_id', \Auth::user()->rt_id)
                                ->where('users.rw_id', \Auth::user()->rw_id)
                                ->sum('nominal');
}

/**
 * [total_warga description]
 * @return [type] [description]
 */
function total_warga()
{
  return \App\Models\Users::where('access_id', 2)->count();
}

/**
 * [bulan description]
 * @return [type] [description]
 */
function bulan()
{
  return [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'];
}

/**
 * [pengeluaran_type description]
 * @return [type] [description]
 */
function pengeluaran_type($user_id = NULL)
{
  if($user_id !== NULL)
  {
  return \App\Models\PengeluaranType::where('user_id', $user_id)->get();
  }

  return \App\Models\PengeluaranType::all();
}

/**
 * [status_anggota description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function status_anggota($id)
{
   $user = App\ModelUser::where('id', $id)->first();

   switch ($user->status) {
      case 1:
         return "<a class=\"btn btn-danger btn-xs\"><i class=\"fa fa-ban\"></i> Inactive</a>";
         break;
      case 2:
            return "<a class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i> Active</a>";
         break;
      case 3:
         return "<a class=\"btn btn-danger btn-xs\"><i class=\"fa fa-ban\"></i> Reject</a>";
         break;
      default:
         return "<a class=\"btn btn-warning btn-xs\"><i class=\"fa fa-ban\"></i> Inactive</a>";
         break;
   }
}

/**
 * [total_pengeluaran description]
 * @return [type] [description]
 */
function total_pengeluaran()
{
  return \App\Models\Pengeluaran::sum('nominal');
}

/**
 * [total_iuran description]
 * @return [type] [description]
 */
function total_iuran()
{
  $nominal = nominal_iuran();

  $total = \App\Models\IuranWarga::where('status', 2)->count() * $nominal;

  return $total;
}

/**
 * [list_surat_pengantar description]
 * @return [type] [description]
 */
function list_surat_pengantar()
{
  $arr = [ 
          'Membuat Akta Kelahiran',
          'Membuat Akta Kematian',
          'Membuat KK Baru',
          'Perubahan KK - Penambahan Anggota Keluarga yang mengalami kelahiran',
          'Perubahan KK - Penambahan Anggota Keluarga yang menumang',
          'Perubahan KK - Penambahan Anggota Keluarga dari WNA',
          'Perubahan KK - Pengurangan Anggota Keluarga baik Meninggal atau Pindah',
          'Perubahan KK - KK hilang / rusak',
          'Perubahan KK - Pembetulan data KK',
          'Penerbitan KTP / e-KTP baru',
          'Perpanjang KTP',
          'Surat Numpang Nikah',
          'Surat Keterangan Tamu',
          'Surat Keterangan Domisili',
          'Surat Keterangan Domisili Usaha (SKDU)',
          'Surat Keterangan Domisili Perusahaan (SKDP)',
          'Surat Keterangan Tinggal Sementara (SKTS)',
          'Surat Keterangan Pindah Alamat / KTP - Alamat Tujuan', 
          'Surat Keterangan Pindah Alamat / KTP - Alamat Asal',
          'Surat Keterangan/Pernyataan Tidak Mampu (SKTM)'
        ];

  return $arr;
}


/**
 * [getRekeningBank description]
 * @return [type] [description]
 */
function getRekeningBank()
{
    $data = \App\Models\RekeningBank::all();

    return $data;
}

/**
 * [nominal_iuran description]
 * @param  [type] $user_id [description]
 * @return [type]          [description]
 */
function nominal_iuran()
{
  $nominal = \App\Models\Iuran::sum('nominal');

  return $nominal;
}

/**
 * [chekcIuranWarga description]
 * @param  [type] $user_id [description]
 * @param  [type] $bulan   [description]
 * @param  [type] $tahun   [description]
 * @return [type]          [description]
 */
function check_iuran_warga($user_id, $bulan, $tahun, $boolean=false)
{
  $iuran = \App\Models\IuranWarga::where('user_id', $user_id)->where('bulan', $bulan)->where('tahun', $tahun)->first();

  if($boolean)
  {
    return $iuran;
  }

  if($iuran)
  {
    if($iuran->status ==2)
    {
      return '<label class="btn btn-success btn-xs">Lunas</label>';
    }
    else
    {
      return '<label class="btn btn-danger btn-xs">Belum Lunas</label>';
    }
  }
  else
  {
      return '<label class="btn btn-danger btn-xs">Belum Lunas</label>';
  }
  return $iuran;
}

/**
 * [access_login description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function access_login($id="")
{
  $arr = [1 => 'Admin', 2 => 'Warga', 3 => 'Bendahara', 4 => 'Rukun Tetangga', 5 => 'Rukun Warga'];
  
  if(empty($id))
    return $arr;
  else
    return $arr[$id];
}

/**
 * [getKepemilikanRumah description]
 * @return [type] [description]
 */
function getKepemilikanRumah()
{
  return ['Milik Sendiri', 'Keluarga', 'Kontrak / Sewa'];
}

/**
 * [jenis_bangunan description]
 * @return [type] [description]
 */
function getJenisBangunan()
{
  return ['Rumah','Ruko', 'Villa', 'Apartement', 'Lainnya'];
}

/**
 * [getRw description]
 * @return [type] [description]
 */
function getRw()
{
  return App\Models\Rw::all();
}

/**
 * [getPerumahan description]
 * @return [type] [description]
 */
function getPerumahan()
{
  return \App\Models\Perumahan::all();
}

/**
 * [access_rules description]
 * @param  [type] $selected [description]
 * @return [type]           [description]
 */
function access_rules($selected = 0)
{
   $array_map = [
                  1 => 'Administrator',
                  2 => 'Anggota',
                  3 => 'Teller / Kasir',
                  4 => 'Customer Service',
                  5 => 'Operator',
                  6 => 'Admin Operator',
                  7 => 'Dropshiper'
               ];

   if($selected != null || $selected != "" || $selected != 0)
   {
      return '<span class="label label-info"><i class="fa fa-key"></i> '. $array_map[$selected] .'</span>';
   }

   return $array_map;
}

/**
 * [list_bank description]
 * @return [type] [description]
 */
function list_bank()
{
  return \App\Models\Bank::all();
}

/**
 * [get_jabatan description]
 * @return [type] [description]
 */
function get_jabatan($key)
{
	$array_map = [
                  1 => 'Administrator',
                  2 => 'Warga',
                  3 => 'Bendahara',
                  4 => 'RT',
                  5 => 'RW'
               ];

    if(array_key_exists($key, $array_map))
    {
    	return $array_map[$key];
    }
}

/**
 * [status_deposit description]
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function status_deposit($status)
{
	switch ($status) {
      case 1:
         return "<a class=\"btn btn-warning btn-xs\"><i class=\"fa fa-ban\"></i> Menunggu Konfirmasi Pembayaran</a>";
         break;
      case 2:
            return "<a class=\"btn btn-warning btn-xs\"><i class=\"fa fa-info\"></i> Menunggu Persetujuan Admin</a>";
         break;
      case 3:
         return "<a class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i> Berhasil</a>";
         break;
       case 4:
         return "<a class=\"btn btn-danger btn-xs\"><i class=\"fa fa-ban\"></i> Ditolak</a>";
         break;
      default:
         return "<a class=\"btn btn-warning btn-xs\"><i class=\"fa fa-ban\"></i> Inactive</a>";
         break;
   }
}

/**
 * [get_setting description]
 * @param  [type] $field [description]
 * @return [type]        [description]
 */
function get_setting($field)
{
	$item = \App\Models\Setting::where('field', $field)->first();

	if($item)
	{
		return $item->value;
	}

	return;
}

/**
 * [get_provinsi description]
 * @return [type] [description]
 */
function get_provinsi()
{
   return \App\Models\Provinsi::orderBy('nama', 'ASC')->get();
}

/**
 * [get_kabupaten_by_provinsi description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function get_kabupaten_by_provinsi($id)
{
	return \App\Models\Kabupaten::where('id_prov', $id)->get();
}

/**
 * [get_kecamatan_by_kabupaten description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function get_kecamatan_by_kabupaten($id)
{
	return \App\Models\Kecamatan::where('id_kab', $id)->get();
}

/**
 * [get_kelurahan_by_kecamatan description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function get_kelurahan_by_kecamatan($id)
{
	return \App\Models\Kelurahan::where('id_kec', $id)->get();
}

?>
