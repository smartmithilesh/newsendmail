<?php
/**
 * MASTER ADMIN EMAIL TEMPLATE
 *
 * Expected variables:
 *
 * $form_title
 * $user_name
 * $user_email
 * $job_title
 * $user_company
 * $country
 * $user_phone
 * $message
 * $postID
 * $postTitle
 * $permalink
 */

?>

<div style="margin:0;padding:0;background:#e6e7e8;">
    <div style="padding:25px;">
        <div style="background:#ffffff;border-radius:5px;">
            <table width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
                <tr>
                    <td style="font-family:Arial, Helvetica, sans-serif;font-size:14px;color:#333;">

                        <h3 style="margin-top:0;">
                            <?php echo e($form_title); ?>
                        </h3>

                        <p style="font-size:12px;color:#999;">
                            THIS IS A ONE-WAY EMAIL NOTICE (ADMIN ONLY)
                        </p>
						
                        <hr>
						
						<?php if (!empty($event_title)) : ?>
							<p><strong>Event:</strong> <?php echo e($event_title); ?></p>
						<?php endif; ?>
						
						<?php if (!empty($start_date)) : ?>
							<p><strong>Start Date:</strong> <?php echo e($start_date); ?></p>
						<?php endif; ?>
						
						<?php if (!empty($end_date)) : ?>
							<p><strong>End Date:</strong> <?php echo e($end_date); ?></p>
						<?php endif; ?>
						
						<?php if (!empty($event_location)) : ?>
							<p><strong>Event Venue:</strong> <?php echo e($event_location); ?></p>
						<?php endif; ?>
						
						<?php if (!empty($event_website)) : ?>
							<p>
								<strong>Event Website:</strong><br>
								<a href="<?php echo u($event_website); ?>" target="_blank">
									<?php echo e($event_website); ?>
								</a>
							</p>
							<hr>
						<?php endif; ?>

                        <?php if (!empty($user_name)) : ?>
                            <p><strong>Name:</strong> <?php echo e($user_name); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($user_email)) : ?>
                            <p><strong>Email:</strong> <?php echo e($user_email); ?></p>
                        <?php endif; ?>
						
						<?php if (!empty($job_title)) : ?>
                            <p><strong>Job Title:</strong> <?php echo e($job_title); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($user_company)) : ?>
                            <p><strong>Company:</strong> <?php echo e($user_company); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($user_phone)) : ?>
                            <p>
                                <strong>Phone:</strong>
                                <?php echo e(trim($country . ' - ' . $user_phone, ' -')); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($message)) : ?>
                            <p>
                                <strong>Message:</strong><br>
                                <?php echo nl2br(e($message)); ?>
                            </p>
                        <?php endif; ?>

                        <hr>

                        <?php if (!empty($postID)) : ?>
                            <p><strong>Post ID:</strong> <?php echo e($postID); ?></p>
                        <?php endif; ?>
						
						<?php if (!empty($postTitle)) : ?>
                            <p><strong>Post Title:</strong> <?php echo e($postTitle); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($permalink)) : ?>
                            <p>
                                <strong>Source URL:</strong><br>
                                <a href="<?php echo u($permalink); ?>" target="_blank">
                                    <?php echo e($permalink); ?>
                                </a>
                            </p>
                        <?php endif; ?>

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

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
