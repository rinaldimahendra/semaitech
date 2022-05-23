<html>
<head>
    <style type='text/css'>
        body {font-family: Roboto}
    </style>
</head>
<body>
    <table style="margin-left:auto;margin-right:auto;width:100%;max-width:700px;background:#ffffff">
    <thead width="100%">
        <tr width="100%">
            <th width="5%">&nbsp;</th>
            <th colspan="2" width="90%" style="padding-top:30px">
                <p style="text-align:right">
                    <a style="text-decoration:none">
                        <img style="height:50px" src="" alt="" class="CToWUd">
                    </a>
                    <br>
                </p>
            </th>
            <th width="5%">&nbsp;</th>
        </tr>
    </thead>
    <tbody width="100%">
        <tr width="100%">
            <td width="5%">&nbsp;</td>
            <td colspan="2" width="90%">
                <p style="font-size:14px">Untuk <span style="color:#15b1e4"><a href="mailto:<?= $email; ?>" target="_blank"><?= $email; ?></a>,</span></p>
                <p style="font-size:14px">
                    Anda baru saja didaftarkan menjadi member di                     <a href="<?= base_url()?>" style="color:#15b1e4" target="_blank">
                        Semaitech,
                    </a>
                    dengan email                     <span style="color:#15b1e4"><?= $email; ?></span>.
                </p>
                <p style="font-size:14px">Untuk mengkonfirmasi bahwa email ini adalah email Anda, silahkan klik pada link berikut :</p>

                <hr style="border-color:#357641">

                <div style="display:block;text-decoration:none;font-family:arial,helvetica,sans-serif;width:100%;padding-top:17px;padding-bottom:17px;text-align:center;margin-top:10px;margin-bottom:10px">
                    <b style="border:5px solid #41be54;padding:10px;font-size:20px;display:inline-block">
                        <a href="<?=base_url('auth/verivikasi?email=')  . $email . '&token=' . $token?>"><?=base_url('auth/verivikasi?email=')  . $email . '&token=' . $token?></a>
                    </b>
                </div>

                <hr style="border-color:#357641">

                <p style="font-size:12px;opacity:0.7">
                    Jika Anda merasa tidak pernah meminta untuk menghubungkan akun tersebut, mohon abaikan email ini.                </p>
                <p style="font-size:12px;font-style:italic;opacity:0.7;margin-bottom:40px">
                    Harap tidak menginformasikan nomor kontak, alamat e-mail, atau password Anda kepada siapapun, termasuk pihak yang mengatasnamakan  
                    <b style="opacity:0.9">Semaitech</b>.
                </p>

            </td>
            <td width="5%">&nbsp;</td>
        </tr>
    </tbody>
    <tfoot width="100%">
        <tr>
            <td>&nbsp;</td>
            <td colspan="2" style="padding-bottom:40px">
                <address style="font-style:normal;float:right;width:240px;margin-right:0;margin-left:auto;font-size:14px">
                    <h4 style="color:#1daee5;margin-bottom:5px">PT. SEMAI AGRO TEKNOLOGI</h4>
                    <p style="margin-top:0;margin-bottom:5px">
                        Bogor, Jawa Barat,<br>
                        Phone 08xxxxxx<br>
                        Email : support@semaitech                  </p>
                </address>
            </td>
            <td>&nbsp;</td>
        </tr>
    </tfoot>
</table>
</body>
</html>