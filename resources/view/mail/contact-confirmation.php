<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Received</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f7;">
    <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #f4f4f7;" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 40px 20px;" align="center">
                <table role="presentation" style="max-width: 600px; width: 100%; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);" cellpadding="0" cellspacing="0">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 30px 40px; background: linear-gradient(135deg, #38bdf8 0%, #a78bfa 100%); border-radius: 8px 8px 0 0;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 600; text-align: center;">✅ Message Received!</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px;">
                            <p style="margin: 0 0 20px; color: #2d3748; font-size: 18px; font-weight: 600;">
                                Hi <?= e($name) ?>,
                            </p>
                            
                            <p style="margin: 0 0 16px; color: #4a5568; font-size: 16px; line-height: 1.6;">
                                Thank you for reaching out to us. We've received your message and will get back to you within one business day.
                            </p>
                            
                            <p style="margin: 0 0 24px; color: #4a5568; font-size: 16px; line-height: 1.6;">
                                For your records, here's a copy of your message:
                            </p>
                            
                            <!-- Message Summary -->
                            <table role="presentation" style="width: 100%; border-collapse: collapse; margin-bottom: 24px; background-color: #f7fafc; border-radius: 6px;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 20px;">
                                        <div style="margin-bottom: 12px;">
                                            <strong style="color: #2d3748; font-size: 14px;">Your Email:</strong><br>
                                            <span style="color: #4a5568; font-size: 14px;"><?= e($email) ?></span>
                                        </div>
                                        <div>
                                            <strong style="color: #2d3748; font-size: 14px;">Message:</strong><br>
                                            <div style="margin-top: 8px; padding-left: 12px; border-left: 3px solid #38bdf8; color: #4a5568; font-size: 14px; line-height: 1.6;">
                                                <?= nl2br(e($message)) ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Info Box -->
                            <table role="presentation" style="width: 100%; border-collapse: collapse; margin-top: 24px;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 16px; background-color: #eff6ff; border-left: 4px solid #38bdf8; border-radius: 4px;">
                                        <p style="margin: 0; color: #1e40af; font-size: 14px; line-height: 1.5;">
                                            <strong>💡 Need urgent assistance?</strong><br>
                                            You can reach us directly at <a href="mailto:info@ndg-webdesign.net" style="color: #1e40af; text-decoration: underline;">info@ndg-webdesign.net</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 30px 40px; background-color: #f7fafc; border-radius: 0 0 8px 8px; text-align: center;">
                            <p style="margin: 0 0 8px; color: #2d3748; font-size: 14px; font-weight: 600;">
                                NDG Web Design
                            </p>
                            <p style="margin: 0; color: #a0aec0; font-size: 12px; line-height: 1.5;">
                                This is an automated confirmation message.<br>
                                Please do not reply directly to this email.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>