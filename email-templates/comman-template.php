<?php
/**
 * MASTER ADMIN EMAIL TEMPLATE (PHP-SAFE)
 *
 * Expected variables (pass only what you need):
 *
 * $form_title
 * $user_name
 * $user_email
 * $user_company
 * $designation
 * $country
 * $user_phone
 * $industry
 * $message
 * $postType
 * $postID
 * $postTitle
 * $organiser
 * $permalink
 */

// -------------------------------------------------
// Demo / dynamic values (replace from real data)
// -------------------------------------------------
$subject    = $subject    ?? 'Email Subject Here';
$message    = $message    ?? '<p>This is the email body content.</p>';
$colorcode  = $colorcode  ?? '#0a5adb';
$site_title = $site_title ?? 'Your Website Name';

if (!defined('RESPONSEMAIL')) {
    define('RESPONSEMAIL', 'response@manufacturinginforms.com');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<title><?php echo htmlspecialchars($subject); ?></title>
</head>

<body style="width:100%;margin:0;padding:0;background-color:#f5f5f5;">
<div style="background-color:#f5f5f5;padding:0;margin:0;">
<table cellpadding="20" cellspacing="0" width="100%">
<tr>
<td align="center" valign="top">

<div style="width:800px;font-family:Open Sans,Arial,sans-serif;text-align:left;">

    <div style="border:1px solid #c7c7c7;background:#f5f5f5;
                border-bottom:5px solid <?php echo htmlspecialchars($colorcode); ?>;
                margin-top:14px;">

        <h1 style="font-size:17.5px;
                   background:<?php echo htmlspecialchars($colorcode); ?>;
                   color:#ffffff;
                   padding:25px;
                   margin:0;">
            <?php echo htmlspecialchars($subject); ?>
        </h1>

        <div style="border-top:3px dotted #bbb;
                    border-bottom:3px dotted #bbb;
                    margin:3px 0;"></div>

        <!-- MAIN MESSAGE -->
        <div style="padding:15px;background-color:#ffffff;line-height:1.6;">
            <?php echo $message; ?>
			
			

			<!--<p>			
				Best regards,<br>
				<strong><?php echo e(COMPANY_MANAGER_NAME); ?></strong><br>
				Manager | <?php echo e(COMPANY_NAME); ?><br>
				T: <?php echo e(COMPANY_PHONE); ?> |
				M: <?php echo e(COMPANY_MOBILE); ?><br>
				E:
				<a href="mailto:<?php echo e(COMPANY_MANAGER_EMAIL); ?>">
					<?php echo e(COMPANY_MANAGER_EMAIL); ?>
				</a><br>
				W:
				<a href="<?php echo e(COMPANY_WEBSITE); ?>" target="_blank">
					<?php echo e(COMPANY_WEBSITE); ?>
				</a>
			</p>-->
        </div>

        <!-- SIGNATURE -->
    </div>

    <!-- FOOTER -->
    <div style="font-size:12px;color:#959595;margin-top:25px;">
		<div id="footer">
			<p style="color: #222222; font-family: arial, sans-serif; font-size: 12.16px;">
			<em><span style="color: #0070c0;">Providing News Media, Marketing &amp; Communication solutions to the Healthcare, Pharma, Energy, Telecom, Mining, Construction and Transport Industries.</span></em></p>
			
			<p><small>DISCLAIMER: The information contained in the message may be privileged and confidential and protected from disclosure. If the reader of the message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this communication is strictly prohibited.</small></p>
			
			<p><small>If you have received this communication in error, please notify us immediately by sending a mail to itservices@leomarcom.com and we will be thankful to you for this help, also please delete the message from your computer. Thank you</small></p>

			<p style="font-size: 12px; text-align: center; color: #959595; margin-top: 25px; margin-bottom: 0;">
			&copy; <?php echo date('Y'); ?> <a href="home_url" style="color: #959595;text-decoration: none;"><?php echo htmlspecialchars($site_title); ?></a> | All Rights Reserved</p>
		</div>
    </div>

</div>

</td>
</tr>
</table>
</div>
</body>
</html>

