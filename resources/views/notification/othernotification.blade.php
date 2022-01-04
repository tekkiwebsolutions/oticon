<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1; margin: 0 auto !important;padding: 0 !important;height: 100% !important;width: 100% !important;background: #dcdcdc;font-family: " Poppins", sans-serif; font-weight: 400; font-size: 15px; line-height: 1.8; color: rgba(0,0,0,.4);">
    <center style="width: 100%; margin-top:35px;background-color: #dcdcdc;">
        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
        @foreach($value as $value)

        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                <tr>
                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;background: #bdbcbc;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="logo" style="text-align: center;">
                                    <h1><a href="#" style="color: #3b5681;font-size: 24px;font-weight: 700;font-family: " Poppins", sans-serif;"><img style="width:70px;" src="https://thoughtmedia.org/oticon/public/images/logo.png"></a></h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" class="hero bg_white" style="background: #ffffff;padding: 2em 0 4em 0;position: relative;z-index: 0;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
                                    <div class="text">
                                        <h2 style="color: #000;font-size: 34px;margin-bottom: 0;font-weight: 200;line-height: 1.4;">{{$value->title}}</h2>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <div class="text-author"><span class="position">{{$value->subject}}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <div class="text-author"><span class="position">{{$value->message}}</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;background: #bdbcbc;padding-bottom: 20px;">
                <tr>
                    <td valign="middle" st yle="border-top: 1px solid rgba(0,0,0,.05);color: rgba(0,0,0,.5);" class="bg_light footer email-section" style="padding:1.5em;"></td>
                </tr>
                <tr>
                    <td class="bg_light" style="text-align:center;background: #bdbcbc;">
                        <p>Regards,<br>
                            {{$value->footer}}</p>
                    </td>
                </tr>
            </table>
        </div>
        @endforeach
    </center>
</body>