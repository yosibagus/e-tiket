<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class OtpController extends Controller
{
    public function index($pesan, $target)
    {
        $token = 'g7r6A7asVrhMPADP+ETN';

        $curl = curl_init();
        $img = asset('konse.jpg');
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $pesan,
                'url' => $img,
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: " . $token . ""
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);

        return $data->status;
    }

    public function sendemail($tujuan, $nama, $kode, $tgl_pesan, $tipe, $url)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = false;  //Enable verbose debug output
            $mail->isSMTP();   //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //hostname/domain yang dipergunakan untuk setting smtp
            $mail->SMTPAuth   = true;  //Enable SMTP authentication
            $mail->Username   = 'bemkmunibamadura2024@gmail.com'; //SMTP username
            $mail->Password   = 'hljawxhnvrvxorhf';   //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
            $mail->Port       = 465;   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('bemkmunibamadura2024@gmail.com', 'BEM KM UNIBA MADURA 2024');
            $mail->addAddress($tujuan, $nama);     //email tujuan

            //Content
            $mail->isHTML(true);   //Set email format to HTML
            $mail->Subject = 'Pembayaran Berhasil - ' . $nama;

            $kategori = $tipe == 'mhs' ? 'Mahasiswa' : 'Reguler';

            $mail->Body    = '
            <div class="">
        <div class="aHl"></div>
        <div id=":n4" tabindex="-1"></div>
        <div id=":mu" class="ii gt"
            jslog="20277; u014N:xr6bB; 1:WyIjdGhyZWFkLWY6MTc5NTUxNzc0ODE3MjA3NjY0MSJd; 4:WyIjbXNnLWY6MTc5NTUxNzc0ODE3MjA3NjY0MSJd">
            <div id=":mt" class="a3s aiL "><u></u>
                <div style="font-family:Plus Jakarta Sans,sans-serif;padding:8px;max-width:500px;margin:auto">
                    <div>
                        <div style="height:40px">
                            <img style="width:90px" src="https://turbo-main.my.id/logo/ufest.png" alt=""
                                class="CToWUd" data-bit="iit">
                            <label
                                style="font-size:15px;letter-spacing:0.5px;font-weight:700;color:#3cd856;float:right;margin-top:18px;">SUCCESS</label>
                        </div>

                        <div>
                            <div>
                                <p style="font-family:Plus Jakarta Sans,sans-serif;font-size:16px;margin-top:30px;">Hai,
                                    <strong>'. $nama .'</strong>
                                </p>
                            </div>
                            <p
                                style="color:#181818;font-family:Plus Jakarta Sans,sans-serif;font-size:13px;font-style:normal;font-weight:500;line-height:160%;letter-spacing:-0.14px">
                                Selamat, pembayaran kamu telah <b>BERHASIL!</b> Berikut e-Tiket untuk <b
                                    style="font-size:14px">2ND UNIBA FESTIVAL 2024 </b> </p>

                            <div
                                style="margin-top:20px;background-color:rgba(235,241,255,0.5);border-radius:8px;padding:16px">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th colspan="2">
                                                <h3
                                                    style="font-family:Plus Jakarta Sans,sans-serif;margin:0 0 12px 0;text-align:left">
                                                    2ND UNIBA FESTIVAL 2024</h3>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th
                                                style="font-family:Plus Jakarta Sans,sans-serif;width:250px;text-align:left;font-size:10px;font-weight:600;color:#b0b0b0;padding-top:8px;padding-bottom:2px">
                                                Lokasi
                                            </th>
                                        </tr>

                                        <tr>
                                            <td colspan="2"
                                                style="font-family:Plus Jakarta Sans,sans-serif;font-size:14px;padding-top:6px;padding-bottom:10px">
                                                <b>Lap. Basket Universitas Bahaudin Mudhary Madura, Sumenep</b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th
                                                style="font-family:Plus Jakarta Sans,sans-serif;width:250px;text-align:left;font-size:10px;font-weight:600;color:#b0b0b0;padding-top:8px;padding-bottom:2px">
                                                Tanggal Event
                                            </th>

                                            <th
                                                style="font-family:Plus Jakarta Sans,sans-serif;width:250px;text-align:left;font-size:10px;font-weight:600;color:#b0b0b0;padding-top:8px;padding-bottom:2px">
                                                Kode Pesanan
                                            </th>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-family:Plus Jakarta Sans,sans-serif;font-size:14px;padding-top:6px;padding-bottom:10px">
                                                <b>24 Mei 2024</b>
                                            </td>
                                            <td
                                                style="font-family:Plus Jakarta Sans,sans-serif;font-size:14px;padding-top:6px;padding-bottom:10px">
                                                <b>'. $kode .'</b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th
                                                style="font-family:Plus Jakarta Sans,sans-serif;width:250px;text-align:left;font-size:10px;font-weight:600;color:#b0b0b0;padding-top:8px;padding-bottom:2px">
                                                Kategori Tiket
                                            </th>

                                            <th
                                                style="font-family:Plus Jakarta Sans,sans-serif;width:250px;text-align:left;font-size:10px;font-weight:600;color:#b0b0b0;padding-top:8px;padding-bottom:2px">
                                                Pemesanan
                                            </th>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-family:Plus Jakarta Sans,sans-serif;font-size:14px;padding-top:6px;padding-bottom:10px">
                                                <b>'. $kategori .'</b>
                                            </td>
                                            <td
                                                style="font-family:Plus Jakarta Sans,sans-serif;font-size:14px;padding-top:6px;padding-bottom:10px">
                                                <b>'. $tgl_pesan .'</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div style="margin:24px 0 0 0">
                                    <a style="font-family:Plus Jakarta Sans,sans-serif;text-decoration:none;display:block;background-color:#241ce6;color:white;text-align:center;border-radius:4px;font-size:13px;font-weight:500;letter-spacing:0.2px;padding:12px 0;border:none;width:100%"
                                        href="'. $url .'">
                                        Download e-Tiket
                                    </a>
                                </div>
                            </div>

                            <div style="margin-top:16px">
                                <label
                                    style="font-family:Plus Jakarta Sans,sans-serif;font-size:12px;font-weight:700;letter-spacing:0.1px">Informasi
                                    Penukaran</label>
                                <ul
                                    style="font-family:Plus Jakarta Sans,sans-serif;font-size:12px;letter-spacing:0.2px;font-style:italic">
                                    <li>Tunjukkan e-Tiket/QR Code yang telah diterima kepada panitia di lokasi event.
                                    </li>
                                    <li>Setelah sudah terverifikasi, Pemilik tiket dapat memasuki event.</li>
                                    <li>Pengunjung WAJIB untuk mematuhi aturan yang berlaku selama acara berlangsung.
                                    </li>
                                </ul>
                            </div>

                            <footer style="background-color:#1f1f95;margin-top:20px;padding:20px 12px">
                                <div style="display:flex;padding-bottom:10px;border-bottom:0.2px solid white">
                                    <div style="width:50%">
                                        <img style="width:90px" src="https://turbo-main.my.id/logo/ufest.png"
                                            alt="" class="CToWUd" data-bit="iit">
                                    </div>

                                    <div style="margin:auto;text-align:center">
                                        <div style="display:flex;padding:4px 0px">
                                            <img style="width:12px"
                                                src="https://ci3.googleusercontent.com/meips/ADKq_NavkOUo0h8FlhCGHnB_CreBjfPYbS_eyXH6U3QrbEgQWQFXHNFKvamwCUfjBN3GiqQJ8slR18d3QKRoVw=s0-d-e1-ft#https://i.ibb.co/PjkdPjF/instagram.png"
                                                alt="" class="CToWUd" data-bit="iit">
                                            <a style="color:white;text-decoration:none;font-size:8px;padding:0px 8px"
                                                href="https://www.instagram.com/uniba_festival/" target="_blank"
                                                data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/uniba_festival/">uniba_festival</a>
                                        </div>
                                        <div style="display:flex;padding:4px 0px">
                                            <img style="width:12px"
                                                src="https://ci3.googleusercontent.com/meips/ADKq_NYOg1G_HGHvkmDV7zZWcLN9ZaPSoi9jQBWHwkTwJFlSz5SJzBtEDLicYF8Rj2c7pF4oQ-ca1ViOeyrt=s0-d-e1-ft#https://i.ibb.co/jhM8ZVQ/whatsapp.png"
                                                alt="" class="CToWUd" data-bit="iit">
                                            <a style="color:white;text-decoration:none;font-size:8px;padding:0px 8px"
                                                href="https://web.whatsapp.com/send/?phone=6282137676220&amp;text&amp;type=phone_number&amp;app_absent=0"
                                                target="_blank"
                                                data-saferedirecturl="https://www.google.com/url?q=https://web.whatsapp.com/send/?phone%3D6282137676220%26text%26type%3Dphone_number%26app_absent%3D0&amp;source=gmail&amp;ust=1712495391586000&amp;usg=AOvVaw3fLesQsvQi_kStVqYzEgJJ">+62
                                                818-0705-8847</a>
                                        </div>
                                        <div style="display:flex;padding:4px 0px">
                                            <img style="width:12px"
                                                src="https://ci3.googleusercontent.com/meips/ADKq_NZnZcbZ9zNbNN63wF1YQeGgEX5yuqFPdvVEqpyHbMVHYyGeFJSVGbVJr-jVjirVxsvSusX6HnE=s0-d-e1-ft#https://i.ibb.co/th7mc7X/mail.png"
                                                alt="" class="CToWUd" data-bit="iit">
                                            <a style="color:white;text-decoration:none;font-size:8px;padding:0px 8px"
                                                href="mailto:bemkmunibamadura2024@gmail.com"
                                                target="_blank">bemkmunibamadura2024@gmail.com</a>
                                        </div>
                                    </div>
                                </div>

                                <div style="font-size:8px;color:white;text-align:center;margin-top:12px">
                                    <label for="m_507380816594962961">© 2024 • Powered By <a
                                            href="https://turbo-main.my.id/" style="color: white"
                                            target="_blank">Turbo.Community</a></label>
                                </div>
                            </footer>

                            <div
                                style="font-size:0.75rem;line-height:20px;border-bottom-style:solid;border-bottom-width:1px;color:#646464;border-color:#dadada;text-align:left;margin-top:10px">
                                <label for="m_507380816594962961">Email ini ditujukan untuk '. $nama .', karena sudah melakukan reservasi melalui Panitia UNIBA FESTIVAL 2024.</label>
                                <div class="yj6qo"></div>
                                <div class="adL">
                                </div>
                            </div>
                            <div class="adL">

                            </div>
                        </div>
                        <div class="adL">
                        </div>
                    </div>
                    <div class="adL">
                    </div>
                </div>
                <div class="adL">
                </div>
            </div>
        </div>
        <div class="WhmR8e" data-hash="0"></div>
    </div>
            ';

            $mail->AltBody = '';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
