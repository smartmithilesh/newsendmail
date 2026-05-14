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
	<p>
		Thank you for considering <strong><?php echo e(COMPANY_NAME); ?></strong> as your platform to showcase your brand. 
		We are excited about the opportunity to collaborate with you and create a long-lasting business relationship. 
		Our goal is to deliver high-quality advertising solutions tailored to meet your objectives.
	</p>

	<p>
		Our team is reviewing your inquiry and will reach out within 24–48 hours to discuss your specific advertising needs. 
		In the meantime, we invite you to explore our website to learn more about our services and see how we can help elevate your brand's visibility. 
		You can also download our <strong>Media Kit</strong> to gain a deeper understanding of our advertising options and how we can support your goals.
	</p>

	<p><strong><a href='<?php echo e(MEDIAPACKS_FORM_URL); ?>' style='color:#0073aa;'>Download Media Kit</a></strong></p>

	<p>
		While the media pack outlines our standard services, we pride ourselves on being flexible and can offer customized 
		solutions tailored to meet your specific objectives.
	</p>

	<p>
		Thank you once again for your interest in partnering with us. 
		We’re looking forward to discussing exciting advertising opportunities with you soon. 
		If you have any questions or need assistance, feel free to reply to this email or contact us directly at 
		<a href='mailto:<?php echo e(COMPANY_MANAGER_EMAIL); ?>' style='color:#0073aa;'><?php echo e(COMPANY_MANAGER_EMAIL); ?></a>.
	</p>
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
