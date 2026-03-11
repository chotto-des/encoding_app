<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:Arial,Helvetica,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f3f4f6;padding:40px 0;">
        <tr>
            <td align="center">
                <table width="480" cellpadding="0" cellspacing="0" border="0" style="max-width:480px;width:100%;background-color:#ffffff;border-radius:12px;overflow:hidden;">

                    {{-- Header --}}
                    <tr>
                        <td align="center" style="background-color:#F5A800;padding:32px 40px;">
                            <h1 style="margin:0;color:#1a1a2e;font-size:22px;font-weight:700;font-family:Arial,Helvetica,sans-serif;">
                                Pampanga High School
                            </h1>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td align="center" style="padding:36px 40px;">
                            <p style="margin:0 0 24px 0;color:#4b5563;font-size:15px;line-height:1.6;font-family:Arial,Helvetica,sans-serif;">
                                Use the verification code below to complete your registration.<br>
                                This code expires in <strong style="color:#1a1a2e;">10 minutes</strong>.
                            </p>

                            {{-- OTP Box --}}
                            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 24px auto;">
                                <tr>
                                    <td align="center" style="background-color:#f9fafb;border:2px dashed #F5A800;border-radius:10px;padding:16px 40px;">
                                        <span style="font-size:36px;font-weight:700;letter-spacing:12px;color:#1a1a2e;font-family:'Courier New',Courier,monospace;">{{ $otp }}</span>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0;font-size:13px;color:#d97706;font-family:Arial,Helvetica,sans-serif;">
                                If you did not request this, please ignore this email.
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="background-color:#f9fafb;padding:20px 40px;border-top:1px solid #e5e7eb;">
                            <p style="margin:0;font-size:12px;color:#9ca3af;font-family:Arial,Helvetica,sans-serif;">
                                &copy; {{ date('Y') }} Pampanga High School &mdash; Student Management System
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
