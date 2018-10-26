<!DOCTYPE html>
<html>
<head>
	<title>{{ $data->surat_pengantar }}</title>
</head>
<body>
	<div class="" style="margin-top: 150px;">
		<h3 style="text-align: center;">SURAT PENGANTAR</h3>
		<h4 style="text-align: center;">Nomor : </h4>
		<p>
			Yang bertanda tangan di bawah ini, Ketua RT {{ isset(Auth::user()->rt->no) ? Auth::user()->rt->no : '' }} {{ isset(\Auth::user()->perumahan->nama_perumahan) ? \Auth::user()->perumahan->nama_perumahan : ''  }} menerangkan bahwa : 
		</p>
		<table>
			<tr>
				<td>Nama</td>
				<td> : {{ isset($data->user->name) ? $data->user->name : '' }} </td>
			</tr>
			<tr>
				<td>Tempat/Tgl Lahir</td>
				<td> : {{ $data->tanggal_lahir }} / {{ $data->tempat_lahir }}</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td> : {{ $data->jenis_kelamin }}</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td> : {{ $data->agama }}</td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td> : </td>
			</tr>
			<tr>
				<td>Kewarganegaraan</td>
				<td> : Indonesia</td>
			</tr>
			<tr>
				<td>Alamat Asal</td>
				<td>{{ $data->agama }}</td>
			</tr>
		</table>
		<p>
			Bahwa nama tersebut di atas adalah benar berdomisili/bertempat tinggal sekarang ini di {{ isset($data->user->perumahan->nama_perumahan) ? $data->user->perumahan->nama_perumahan : '' }} Kecamatan {{ isset(Auth::user()->domisiliKecamatan->nama) ? Auth::user()->domisiliKecamatan->nama : '' }}
		</p>
		<br style="clear: both;" />
		<div style="width: 200px; float: right;text-align: center;">
			<p>{{ isset(\Auth::user()->domisiliKecamatan->nama) }}{{ date('d F Y') }}</p>
			<p>Ketua RT{{ isset(\Auth::user()->rt->no) ? \Auth::user()->rt->no : ''}}/{{ isset(\Auth::user()->rw->no) ? \Auth::user()->rw->no : '' }}</p>
			<br />
			<br />
			<br />
			<p>{{ \Auth::user()->name }}</p>
		</div>
	</div>
</body>
</html>