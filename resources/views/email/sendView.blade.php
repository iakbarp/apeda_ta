
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title>You have a new support message</title>
    <style type="text/css">
        @media (min-width: 550px) {
            .hero-image {
                top: 0 !important;
            }

            table[class="body"] {
                padding-bottom: 50px !important;
                padding-top: 50px !important;
            }

            .email-logo-masthead {
                display: inline !important;
                height: 100px !important;
                margin-left: -30px !important;
                margin-right: 0 !important;
                margin-bottom: -20px !important;
            }

            .email-content {
                border-left: 1px solid #dadfe1 !important;
                border-right: 1px solid #dadfe1 !important;
            }

            .email-content-block {
                padding-left: 50px !important;
                padding-right: 50px !important;
            }
        }

        .email-social-bar-copy p, .email-social-bar-copy a, .email-social-bar-copy .ios-no-link {
            color: white !important;
            text-decoration: none !important;
        }

    </style>
</head>

<body style="background-color: #f6f8f8; height: 100%; margin: 0; padding: 0;">
<div style="display:none;font-size:1px;color:#f6f8f8;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
    Pesan spesial terkait akun APEDA.
</div>
<table class="body" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
       style="background-color: #f6f8f8; height: 100%; padding-bottom: 25px; padding-left: 0; padding-right: 0; padding-top: 25px;">
    <tbody>
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td width="550">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                            <tr>
                                <td>
                                    <table class="" align="center" border="0" cellpadding="0" cellspacing="0"
                                           width="100%" style="height: 80px">
                                        <tbody>
                                        <a href="">S<span>.</span>S<span>.</span>W<span>.</span>S<span>.</span></a>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="email-content-border" style="border-top: 1px solid #dadfe1;"></td>
                            </tr>
                            <tr>
                                <td class="email-content" style="background-color: #FFFFFF;">
                                    <table class="" align="center" border="0" cellpadding="0" cellspacing="0"
                                           width="100%">
                                        <tbody>
                                        <tr>
                                            <td class="email-content-block copy"
                                                style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; padding-left: 25px; padding-right: 25px; padding-top: 50px;'>
                                                {{--<h2 style='margin: 0 0 0.5rem 0; line-height: 1.25; font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; color: #3e474c; font-size: 2rem; font-weight: 500; font-style: normal;'>--}}
                                                    {{--Hi {{substr($name,0,$kurva)}},</h2>--}}

                                                <p style='margin-bottom: 15px; font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; font-weight: 400; font-size: 16px; line-height: 1.5;'>
                                                    Anda telah terdaftar pada akun APEDA. Berikut detail Akun:</p>
                                                {{--<table>--}}
                                                    {{--<tr>--}}
                                                        {{--<td>NIK</td><td> :</td><td>{{$nik}}</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr>--}}
                                                        {{--<td>Nama</td><td> :</td><td>{{$name}}</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr>--}}
                                                        {{--<td>Email</td><td> :</td><td>{{$email}}</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr>--}}
                                                        {{--<td>Password</td><td> :</td><td>{{$password}}</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr>--}}
                                                        {{--<td>Jobdesk</td><td> :</td><td>{{$posisition_id}} di {{$job_id}}</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr>--}}
                                                        {{--<td>Hak Akses</td><td> :</td><td>{{$role_id}}</td>--}}
                                                    {{--</tr>--}}

                                                {{--</table>--}}
                                                <p style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; font-weight: 400; font-size: 16px;  ;'>
                                                    Untuk login gunakan email dan password yang terterah.</p>
                                                <center style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important;'>

                                                    <div class="section"
                                                         style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; padding: 50px 0;'>
                                                        <a class="button" href="{{route('sendEmailDone', ["email" => $user->email, "verifyToken"=>$user->verifyToken])}}"
                                                           target="_blank"
                                                           style='-moz-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); -o-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); -webkit-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); color: white; font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; background-color: #3fbced; border-radius: 3px; padding: 15px 17px; text-decoration: none;'>
                                                            Verifikasi Sekarang</a>
                                                    </div>
                                                </center>
                                                <p style='margin-bottom: 15px; font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; font-weight: 400; font-size: 16px; line-height: 1.5;'>
                                                    Terima Kasih!</p>
                                                <p class="signout light-type"
                                                   style='margin-bottom: 15px; font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; font-weight: 400; font-size: 16px; line-height: 1.5; color: #788991;'>
                                                    — APEDA Team</p>
                                                <div class="padding-break"
                                                     style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; margin-top: 50px;'></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="email-social-bar" align="center" border="0" cellpadding="0"
                                           cellspacing="0" width="100%"
                                           style="padding-left: 50px; padding-right: 50px; background: #3fbced; padding-bottom: 25px; padding-top: 25px;">
                                        <tbody>
                                        <tr>
                                            <td class="email-social-bar-copy copy"
                                                style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important;'>
                                                <p class="ios-no-link"
                                                   style='margin-bottom: 15px; font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; font-weight: 400; font-size: 11px; line-height: 1.5; color: white;'>
                                                    Jl. Jagir Wonokromo No.104, Jagir, Wonokromo,
                                                    <br style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important;'>
                                                    Surabaya, Jawa Timur, 60244.

                                                    <br style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important;'>
                                                    Telp. : <a href="tel://+62318439473">+6231-8497200</a></p>
                                            </td>
                                            <td class="email-social-bar-icons">
                                                <table class="" align="center" border="0" cellpadding="0"
                                                       cellspacing="0" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td align="right">
                                                            <a class="email-social-bar-social-icon"
                                                               href="https://twitter.com/Madya631"
                                                               style="-moz-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); -o-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); -webkit-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); color: #4EAACC; padding: 0 5px; text-decoration: none;">
                                                                <img class="auto-width"
                                                                     src="https://simple.com/email-images/icons/social-twitter.png"
                                                                     style="width: auto; max-width: 100% !important; border: 0;">
                                                            </a>
                                                            <a class="email-social-bar-social-icon"
                                                               href="https://www.facebook.com/KPPMadyasurabaya/"
                                                               style="-moz-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); -o-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); -webkit-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); color: #4EAACC; padding: 0 5px; text-decoration: none;">
                                                                <img class="auto-width"
                                                                     src="https://simple.com/email-images/icons/social-facebook.png"
                                                                     style="width: auto; max-width: 100% !important; border: 0;">
                                                            </a>
                                                            <a class="email-social-bar-social-icon"
                                                               href="https://www.instagram.com/kppmadyasurabaya/"
                                                               style="-moz-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); -o-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); -webkit-transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); transition: color 0.175s cubic-bezier(0.215, 0.61, 0.355, 1); color: #4EAACC; padding: 0 5px; text-decoration: none;">
                                                                <img class="auto-width"
                                                                     src="https://simple.com/email-images/icons/social-instagram.png"
                                                                     style="width: auto; max-width: 100% !important; border: 0;">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                            <tr>
                                <td align="center" class="email-disclaimer copy"
                                    style='font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; padding-left: 50px; padding-right: 50px; padding-top: 15px; padding-bottom: 15px;'>
                                    <p style='margin-bottom: 15px; font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; font-weight: 400; font-size: 11px; line-height: 1.5; color: #788991; margin-top: 0;'>
                                        This email was sent to <strong
                                                style='font-weight: 500; font-family: "Avenir Next", "Avenir", "Helvetica", sans-serif !important; font-size: 11px; color: #788991; margin-top: 0;'>xxxxxx@xxxxx.com</strong>.
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
