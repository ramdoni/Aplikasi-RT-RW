<?php
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
 * [all_simpanan_wajib description]
 * @return [type] [description]
 */
function all_simpanan_wajib()
{
  return \Kodami\Models\Mysql\Deposit::where('type', 5);
}

/**
 * [simpanan_pokok description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function all_simpanan_sukarela()
{
  return \Kodami\Models\Mysql\Deposit::where('type', 4);
}

/**
 * [simpanan_pokok description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function all_simpanan_pokok()
{
  return \Kodami\Models\Mysql\Deposit::where('type', 3);
}

/**
 * [total_anggota description]
 * @param  string $status [description]
 * @return [type]         [description]
 */
function total_anggota($status = 'all')
{
  if($status == 'all')
  {
    $count = \Kodami\Models\Mysql\Users::where('access_id', 2)->count();
  }
  if($status == 'active')
  {
    $count = \Kodami\Models\Mysql\Users::where('access_id', 2)->where('status', 1)->count();
  }

  return $count;
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
 * [type_deposit description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function type_deposit($key)
{
	$array_map = [
                  3 => 'Simpanan Pokok',
                  4 => 'Simpanan Sukarela',
                  5 => 'Simpanan Wajib'
               ];

    if(array_key_exists($key, $array_map))
    {
    	return $array_map[$key];
    }
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
 * [status_deposit_awal description]
 * @return [type] [description]
 */
function status_deposit_awal($user_id)
{
	$status = \Kodami\Models\Mysql\Deposit::where('type', 1)->where('user_id', $user_id)->first();

	if($status)
	{
		return $status->status;
	}
	else
	{
		return 0;
	}
}

/**
 * [no_invoice description]
 * @return [type] [description]
 */
function no_invoice()
{
	$no = (\Kodami\Models\Mysql\Deposit::count()+1);

	return  $no . \Auth::user()->id.'/INV/KDM/'. date('d').date('m').date('y');
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
 * [simpanan_wajib description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function simpanan_wajib($id)
{
	return \Kodami\Models\Mysql\Deposit::where('user_id', $id)->where('type', 5);
}

/**
 * [sum_simpanan_wajib description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function sum_simpanan_wajib($id, $status=3)
{
	if($status == 'all')
	{
		$simpanan_wajib = \Kodami\Models\Mysql\Deposit::where('user_id', $id)->sum('nominal');
	}
	else
	{
		$simpanan_wajib = \Kodami\Models\Mysql\Deposit::where('user_id', $id)->where('status', $status)->where('type', 5)->sum('nominal');

	}

	return $simpanan_wajib;
}

/**
 * [simpanan_pokok description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function simpanan_pokok($id)
{
	return \Kodami\Models\Mysql\Deposit::where('user_id', $id)->where('type', 3);
}

/**
 * [cek_tagihan description]
 * @return [type] [description]
 */
function simpanan_sukarela($id)
{
	return \Kodami\Models\Mysql\Deposit::where('user_id', $id)->where('type', 4);
}

/**
 * [get_setting description]
 * @param  [type] $field [description]
 * @return [type]        [description]
 */
function get_setting($field)
{
	$item = \App\Setting::where('field', $field)->first();

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
   return \App\Provinsi::orderBy('nama', 'ASC')->get();
}

/**
 * [get_kabupaten_by_provinsi description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function get_kabupaten_by_provinsi($id)
{
	return \App\Kabupaten::where('id_prov', $id)->get();
}

/**
 * [get_kecamatan_by_kabupaten description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function get_kecamatan_by_kabupaten($id)
{
	return \App\Kecamatan::where('id_kab', $id)->get();
}

/**
 * [get_kelurahan_by_kecamatan description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function get_kelurahan_by_kecamatan($id)
{
	return \App\Kelurahan::where('id_kec', $id)->get();
}

?>
