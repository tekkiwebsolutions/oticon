<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1; margin: 0 auto !important;padding: 0 !important;height: 100% !important;width: 100% !important;background: #dcdcdc; font-weight: 400; font-size: 15px; line-height: 1.8; color: rgba(0,0,0,.4);">
    <center style="width: 100%; margin-top:35px;background-color: #dcdcdc;">
        @foreach($value as $value)

        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                <tr>
                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;background: #bdbcbc;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="logo" style="text-align: center;"> 
									<img style="width:150px;" alt="Oticon" src="https://thoughtmedia.org/oticon/public/images/logo.png"></a>
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
                                        <h2 style="color: #000;font-size: 34px;margin-bottom: 0;font-weight: 200;line-height: 1.4;text-align: center;">{{$value->title}}</h2>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <div class="text-author"><p style="text-align: center; padding:10px;">{{$value->message}}</span>
                                    </div>
                                </td>
                            </tr>
							
                            <tr>
                                <td style="text-align: center;">
                                    <a href="{{$url}}">
									<button>
											@if($url_title) 
											{{$url_title}}
											@else
											Set Password
											@endif
									</button>
									</a> 
                                </td>
                            </tr>
							
                        </table>
                    </td>
                </tr>
            </table>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;background: #bdbcbc;padding-bottom: 20px;">
                <tr>
                    <td valign="middle" style="border-top: 1px solid rgba(0,0,0,.05);color: rgba(0,0,0,.5); padding:1.5em;" class="bg_light footer email-section" ></td>
                </tr>
                <tr>
					<td style="box-sizing:border-box;">
                        <p style="font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;text-align:center;background:#bdbcbc;font-weight: 400;font-size: 15px;line-height: 1.8;color: rgba(0,0,0,.4);">Regards,  {{$value->footer}}</p>
                    </td> 
                </tr>
            </table>
        </div>
        @endforeach
    </center>
</body>