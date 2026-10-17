<?php
$page = get_queried_object();
$title = get_field('about_title', $page) ?? '';
$left_image = get_field('about_left_image', $page) ?? null;
$right_title = get_field('about_right_title', $page) ?? '';
$right_descr = get_field('about_right_descr', $page) ?? '';
$license_image = get_field('about_license_image', $page) ?? null;
$license_title = get_field('about_license_title', $page) ?? '';
$license_descr = get_field('about_license_descr', $page) ?? '';
?>

<?php if ($title || ($left_image && !empty($left_image['ID'])) || $right_title || $right_descr || ($license_image && !empty($license_image['ID']))): ?>
	<section class="section-full about" id="about">
		<div class="container about__container section-gap">
			<?php if ($title): ?>
				<h2 class="about__title title-2">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<div class="about__grid">
				<?php if ($left_image && is_array($left_image) && !empty($left_image['ID'])): ?>
					<div class="about__image image-box">
						<?php echo wp_get_attachment_image($left_image['ID'], 'large', false, [
							'class' => 'img',
							'alt' => $left_image['alt'] ?: $title,
							'loading' => 'lazy'
						]); ?>
					</div>
				<?php endif; ?>

				<div class="about__right">
					<?php if ($right_title): ?>
						<h3 class="about__right-title title-3">
							<?php echo esc_html($right_title); ?>
						</h3>
					<?php endif; ?>

					<?php if ($right_descr): ?>
						<div class="about__right-descr descr">
							<?php echo wp_kses_post($right_descr); ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if (($license_image && !empty($license_image['ID'])) || $license_title || $license_descr): ?>
					<div class="about__license">
						<div class="about__license-content">
							<?php if ($license_title): ?>
								<h4 class="about__license-title title-3">
									<?php echo esc_html($license_title); ?>
								</h4>
							<?php endif; ?>

							<?php if ($license_descr): ?>
								<div class="about__license-descr descr">
									<?php echo wp_kses_post($license_descr); ?>
								</div>
							<?php endif; ?>
						</div>
						<?php if ($license_image && is_array($license_image) && !empty($license_image['ID'])): ?>
							<a class="about__license-image image-box" href="<?php echo esc_url($license_image['url']); ?>"
								data-fancybox="fancybox-license">
								<?php echo wp_get_attachment_image($license_image['ID'], 'medium', false, [
									'class' => 'img',
									'alt' => $license_image['alt'] ?: $license_title,
									'loading' => 'lazy'
								]); ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>