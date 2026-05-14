<?php
/**
 * USER AUTO-REPLY EMAIL TEMPLATE
 *
 * Expected variables:
 * $form_title
 * $first_name
 */

?>

<div style="margin:0;padding:0;">
		<p style="font-size:12px;color:#777;">
			THIS IS A ONE-WAY EMAIL NOTICE. PLEASE DO NOT REPLY.
		</p>

		<hr>

		<p>Hi <?php echo e($first_name); ?>,</p>

		<p>
			Thank you for contacting <strong><?php echo e(COMPANY_NAME); ?></strong>.
			We have successfully received your enquiry.
		</p>

		<p>
			Your details have been forwarded to the relevant team and one of our
			representatives will get in touch with you shortly regarding the
			next steps.
		</p>

		<p>
			We respect your privacy and assure you that your information will not
			be shared with third parties.
		</p>

		<p>
			From time to time, we or our associates may share relevant industry
			updates, news, or event information that may be of interest to you.
		</p>

		<p>
			If you have any urgent queries, please feel free to reach out to us.
		</p>

		<br>
</div>
