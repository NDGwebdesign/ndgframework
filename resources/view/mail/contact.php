<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f7;">
    <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #f4f4f7;" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 40px 20px;" align="center">
                <table role="presentation" style="max-width: 600px; width: 100%; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);" cellpadding="0" cellspacing="0">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 30px 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 8px 8px 0 0;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 600; text-align: center;">📬 New Contact Message</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px;">
                            <p style="margin: 0 0 24px; color: #4a5568; font-size: 16px; line-height: 1.5;">
                                You have received a new message from your website contact form.
                            </p>
                            
                            <!-- Contact Info Card -->
                            <table role="presentation" style="width: 100%; border-collapse: collapse; margin-bottom: 24px; background-color: #f7fafc; border-radius: 6px;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 20px;">
                                        <table role="presentation" style="width: 100%; border-collapse: collapse;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <strong style="color: #2d3748; font-size: 14px; display: inline-block; width: 80px;">Name:</strong>
                                                    <span style="color: #4a5568; font-size: 14px;"><?= e($name) ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <strong style="color: #2d3748; font-size: 14px; display: inline-block; width: 80px;">Email:</strong>
                                                    <a href="mailto:<?= e($email) ?>" style="color: #667eea; font-size: 14px; text-decoration: none;"><?= e($email) ?></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Message Content -->
                            <div style="margin-bottom: 24px;">
                                <h3 style="margin: 0 0 12px; color: #2d3748; font-size: 16px; font-weight: 600;">Message:</h3>
                                <div style="padding: 16px; background-color: #ffffff; border-left: 4px solid #667eea; border-radius: 4px; color: #4a5568; font-size: 14px; line-height: 1.6;">
                                    <?= nl2br(e($message)) ?>
                                </div>
                            </div>
                            
                            <!-- Action Button -->
                            <table role="presentation" style="width: 100%; border-collapse: collapse; margin-top: 32px;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <a href="mailto:<?= e($email) ?>" style="display: inline-block; padding: 14px 32px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px;">Reply to Message</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 30px 40px; background-color: #f7fafc; border-radius: 0 0 8px 8px; text-align: center;">
                            <p style="margin: 0; color: #a0aec0; font-size: 12px; line-height: 1.5;">
                                This message was sent via your website contact form.<br>
                                Received on <?= date('F j, Y \a\t g:i A') ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
