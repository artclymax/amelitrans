<?php
$page = get_queried_object();
$title = get_field('faq_title', $page) ?? '';
$list = get_field('faq_list', $page) ?? [];
?>

<?php if ($title || !empty($list)): ?>
	<section class="section-full section-faq" id="faq">
		<div class="container section-faq__container section-gap">
			<?php if ($title): ?>
				<h2 class="section-faq__title title-2">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if (!empty($list)): ?>
				<ul class="section-faq__list faq-list">
					<?php foreach ($list as $index => $item):
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';
						if (!$item_title && !$item_descr)
							continue;

						$number = $index + 1 > 9 ? $index + 1 : '0' . ($index + 1);
						$is_active = $index === 0 ? ' spoiler-active' : '';
						?>
						<li class="faq-item<?php echo esc_attr($is_active); ?>" data-spoiler>
							<button class="faq-item__btn" data-spoiler-title>
								<span class="faq-item__number title-3"><?php echo esc_html($number); ?></span>
								<h3 class="faq-item__title title-3">
									<?php echo esc_html($item_title); ?>
								</h3>
								<span class="faq-item__icon"></span>
							</button>
							<div class="faq-item__content" data-spoiler-content>
								<?php if ($item_descr): ?>
									<div class="faq-item__descr descr">
										<?php echo wp_kses_post($item_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>