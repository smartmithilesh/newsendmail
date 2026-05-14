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
	<p>Thank you for your interest in our platform and willingness to contribute the content. It has been forwarded to the editorial department and will be dealt with as soon as possible.</p>

	<p>
	We respect your privacy and assure you that we will never share any of your details filled on our website or any of our IT platforms with anyone.</p>
	
	<p>
	Though we or our associates may run promotions time and again which you may find of interest as it will come with new information and knowledge about the happenings, products, services, etc. from within the Industry.</p>
	
	<p>
	Please feel free to contact us for any further queries that you may have.</p>
	<br>
	
	<p>
    Thanking you<br>
    Regards<br>	
		<?php if(!empty(COMPANY_NAME)): ?>
			Editorial Department |  <?php echo e(COMPANY_NAME); ?><br>
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
