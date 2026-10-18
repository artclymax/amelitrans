<?php
$page = get_queried_object();
$title = get_field('services_title', $page) ?? '';
$list = get_field('services_list', $page) ?? [];
?>

<?php if ($title || !empty($list)): ?>
	<section class="section-full services" id="services">
		<div class="container services__container section-gap">
			<?php if ($title): ?>
				<h2 class="services__title title-2">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if (!empty($list)): ?>
				<div class="services__grid grid">
					<?php foreach ($list as $item):
						$item_image = $item['image'] ?? null;
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';
						$item_btn = $item['btn'] ?? [];

						if (!$item_title && !$item_descr && !($item_image && !empty($item_image['ID'])))
							continue;
						?>
						<a class="services__item service-card" href="<?php echo esc_url($item_btn['url']); ?>" <?php if (!empty($item_btn['target'])): ?> target="
				<?php echo esc_attr($item_btn['target']); ?>"
							<?php endif; ?>>
							<?php if ($item_image && is_array($item_image) && !empty($item_image['ID'])): ?>
								<div class="service-card__image image-box">
									<?php echo wp_get_attachment_image($item_image['ID'], 'large', false, [
										'class' => 'img',
										'alt' => $item_image['alt'] ?: $item_title,
										'loading' => 'lazy'
									]); ?>
								</div>
							<?php endif; ?>

							<div class="service-card__content">
								<?php if ($item_title): ?>
									<h3 class="service-card__title title-3">
										<?php echo esc_html($item_title); ?>
									</h3>
								<?php endif; ?>

								<?php if ($item_descr): ?>
									<div class="service-card__descr descr">
										<?php echo wp_kses_post($item_descr); ?>
									</div>
								<?php endif; ?>

								<?php if (!empty($item_btn['url'])): ?>
									<span class="service-card__btn btn">
										<?php echo esc_html($item_btn['title'] ?? 'Узнать подробнее'); ?>
									</span>
								<?php endif; ?>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>