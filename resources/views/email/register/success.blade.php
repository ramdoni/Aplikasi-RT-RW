<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registrasi  - Kodami Pocket System</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
          <td style="vertical-align: top; padding-bottom:30px;">
            <a href="http://www.kodami.co.id" target="_blank" style="text-decoration: none;color: #484848;"><img src="{{ asset('kodami-co-id.png') }}" alt="Admin Responsive web app kit" style="border:none; width: 270px; "><br/>
            <h2 style="margin-top: 5px; padding-top: 5px;">Koperasi Daya Masyarakat</h2>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td><b>Dear, {{ $user->name }}</b>
              <p>Terima kasih kepada anda yang sudah bergabung di Koperasi Daya Masyarakat Indonesia ( KODAMI ), berikut data pendaftaran anda.</p>
              <table style="width: 100%;max-width: 100%;margin-bottom: 20px;">
                <tr>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">NIK</td>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">{{ $user->nik }}</td>
                </tr>
                <tr>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">Nama</td>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">{{ $user->name }}</td>
                </tr>
                <tr>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">Email</td>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">{{ $user->email }}</td>
                </tr>
                <tr>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">Telepon</td>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">{{ $user->telepon }}</td>
                </tr>
                <tr>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">Password</td>
                  <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">{{ $user->password }}</td>
                </tr>
              </table>
              <p>Informasi Keanggotaan:</p>
              <ol>
                <li>Data Keanggotaan anda belum aktif, sebelum anda membayar biaya keanggotaan sebesar Rp. 100.000, anda bisa melakukan pembayaran dengan cara login ke sistem keanggotaan anda dengan akun yang sudah anda daftarkan dan lihat di menu profile anda ada tombol "Bayar Keanggotaan" dan ikuti proses selanjutnya.</li>

                <li>Anda diwajibkan membayar iuran bulanan yaitu sebesar Rp. 10.000, untuk iuran bulanan, anda bisa melihat di menu "Iuran Bulanan" apakah anda sudah melakukan pembayaran atau belum, jika anda sudah melakukan pembayaran maka anda bisa menekan tombol "Konfirmasi Pembayaran" maka kami akan mengecek pembayaran anda.
                </li>
              </ol>

              <p>Email ini otomatis terkirim otomatis oleh sistem anda tidak bisa membalas pesan ini, silahkan login ke akun profile anda untuk info lebih lanjut</p>
              <a href="javascript: void(0);" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #1e88e5; border-radius: 60px; text-decoration:none;"> Login Anggota</a><br />
              <b>Thanks,<br /> Kodami Pocket System</b> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p> Powered by Kodami Pocket System <br>
        <a href="http:://www.kodami.co.id/unsubscribe?email={{ $user->email }}" style="color: #b2b2b5; text-decoration: underline;">Unsubscribe</a> </p>
    </div>
  </div>
</div>
</body>
</html>
