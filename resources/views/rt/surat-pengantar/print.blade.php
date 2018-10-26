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
				<td>{{ $data->jenis_kelamin }}</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>{{ $data->agama }}</td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td></td>
			</tr>
			<tr>
				<td>Kewarganegaraan</td>
				<td>Indonesia</td>
			</tr>
			<tr>
				<td>Alamat Asal</td>
				<td>{{ $data->agama }}</td>
			</tr>
		</table>
		<div class="">
			<p>{{ isset(\Auth::user()->domisiliKecamatan->nama) }}{{ date('d F Y') }}</p>
		</div>
	</div>
</body>
</html>