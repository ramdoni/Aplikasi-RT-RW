<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paper.css') }}?v={{ date('YmdHis') }}">
    <style>@page { size: A7 }</style>
</head>
<body class="A7">
    <section class="sheet padding-5mm">
        <article>
            <p class="img"><img src="{{ asset('logo-biru.png')}}" /></p>
            <hr />
            <p class="text-center">KWITANSI PEMBAYARAN {{ strtoupper(type_deposit($data->type)) }}</p>
            <table class="table">
                <thead>
                    <tr>
                        <td>NO KWITANSI</td>
                        <td> : {{ $data->no_invoice }}</td>
                    </tr>
                    <tr>
                        <td>TANGGAL</td>
                        <td> : {{ date('d F Y H:i:s') }}</td>
                    </tr>
                        <td>NOMINAL</td>
                        <td> : {{ number_format($data->nominal) }}</td>
                    </tr>
                    <tr>
                        <td>STATUS</td>
                        <td> : BERHASIL</td>
                    </tr>
                </thead>
            </table>
            <p class="text-center">SIMPAN KWITANSI INI SEBAGAI BUKTI TRANSAKSI TERIMAKASIH</p>
            <hr />
            <p class="text-center">Koperasi Produsen Daya Masyarakat Indonesia</p>
            <p class="text-center">
               Jalan Raya Maospati - Gorang Gareng Ds Belot<br /> RT 34 / 12 - Kabupaten Magetan 63384 <br />
               Telpon : (0351) 4360 167 / 4360 661<br />
               Email : services@kodami.co.id<br />
               http://kodami.co.id
            </p>
        </article>
    </section>
</body>
</html> 