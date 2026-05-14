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
	<p style="display: none;"><?php echo e(COMPANY_NAME); ?> Will Reach Out Shortly - We Appreciate Your Inquiry</p>
	
	<h3><?php echo e(COMPANY_NAME); ?></h3>
	| THIS IS A ONE-WAY EMAIL NOTICE.<br>
	| PLEASE DO NOT REPLY TO THIS EMAIL.<br>
	| PLEASE COMMUNICATE WITH THE ASSIGNED MANAGER.<br>
	***********************************************<br>

	<p>Dear <?php echo e($first_name); ?>,<p>
	<p style="margin:0;padding-bottom:10px;">Thank you for submitting your Event on <?php echo e(COMPANY_NAME); ?>. Our event team will review and publish it or will get back to you for any further requirements.</p>
	<p>We respect your privacy and assure you that we will never share any of your details filled on our website or any of our IT platforms with anyone.</p>
	<p>Though we or our associates may run promotions time and again which you may find of interest as it will come with new information and knowledge about the happenings, products, services, etc. from within the Industry.</p>
	<p>Please feel free to contact us for any further queries that you may have.</p>
	<br>
	
	<p>
    Thanking you<br>
    Regards<br>
		<?php if(!empty(COMPANY_MANAGER_NAME)): ?>
			<strong><?php echo e(COMPANY_MANAGER_NAME); ?></strong><br>
		<?php endif; ?>
	
		<?php if(!empty(COMPANY_NAME)): ?>
			Manager | <?php echo e(COMPANY_NAME); ?><br>
		<?php endif; ?>
	
		<?php if(!empty(COMPANY_PHONE) || !empty(COMPANY_MOBILE)): ?>
			<?php if(!empty(COMPANY_PHONE)): ?>
				T: <?php echo e(COMPANY_PHONE); ?>
			<?php endif; ?>
	
			<?php if(!empty(COMPANY_PHONE) && !empty(COMPANY_MOBILE)): ?>
				|
			<?php endif; ?>
	
			<?php if(!empty(COMPANY_MOBILE)): ?>
				M: <?php echo e(COMPANY_MOBILE); ?>
			<?php endif; ?>
			<br>
		<?php endif; ?>
	
		<?php if(!empty(COMPANY_MANAGER_EMAIL)): ?>
			E:
			<a href="mailto:<?php echo e(COMPANY_MANAGER_EMAIL); ?>">
				<?php echo e(COMPANY_MANAGER_EMAIL); ?>
			</a><br>
		<?php endif; ?>
	
		<?php if(!empty(COMPANY_WEBSITE)): ?>
			W:
			<a href="<?php echo e(COMPANY_WEBSITE); ?>" target="_blank">
				<?php echo e(COMPANY_WEBSITE); ?>
			</a>
		<?php endif; ?>
	</p>
</div>
