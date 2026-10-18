<?php
$page = get_queried_object();
$bg = get_field('geo_bg', $page) ?? null;
$title = get_field('geo_title', $page) ?? '';
$list = get_field('geo_list', $page) ?? [];
?>

<?php if ($title || !empty($list) || ($bg && !empty($bg['ID']))): ?>
	<section class="section-full geo jarallax" id="geo">
		<div class="container geo__container">
			<div class="geo__wrapper section-gap">
				<?php if ($title): ?>
					<h2 class="geo__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<?php if (!empty($list)): ?>
					<div class="geo__grid grid">
						<?php foreach ($list as $item):
							$item_image = $item['image'] ?? null;
							$item_title = $item['title'] ?? '';
							$item_descr = $item['descr'] ?? '';
							$item_link = $item['link'] ?? [];

							if (!$item_title && !$item_descr)
								continue;
							?>
							<?php if (!empty($item_link['url'])): ?>
								<a class="geo__item geo-item" href="<?php echo esc_url($item_link['url']); ?>" <?php if (!empty($item_link['target'])): ?> target="<?php echo esc_attr($item_link['target']); ?>" <?php endif; ?>>
								<?php else: ?>
									<div class="geo__item geo-item">
									<?php endif; ?>
									<?php if ($item_image && is_array($item_image) && !empty($item_image['ID'])): ?>
										<div class="geo-item__image">
											<?php echo wp_get_attachment_image($item_image['ID'], 'medium', false, [
												'class' => 'img',
												'alt' => $item_image['alt'] ?: $item_title,
												'loading' => 'lazy'
											]); ?>
										</div>
									<?php endif; ?>

									<?php if ($item_title): ?>
										<h3 class="geo-item__title title-3">
											<?php echo esc_html($item_title); ?>
										</h3>
									<?php endif; ?>

									<?php if ($item_descr): ?>
										<div class="geo-item__descr descr">
											<?php echo wp_kses_post($item_descr); ?>
										</div>
									<?php endif; ?>
									<?php if (!empty($item_link['url'])): ?>
								</a>
							<?php else: ?>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if ($bg && is_array($bg) && !empty($bg['ID'])): ?>
			<div class="geo__image image-box jarallax-img">
				<?php echo wp_get_attachment_image($bg['ID'], 'full', false, [
					'class' => 'img',
					'alt' => $bg['alt'] ?: $title,
					'loading' => 'lazy'
				]); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>