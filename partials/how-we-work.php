<?php
$page = get_queried_object();
$title = get_field('how_we_work_title', $page) ?? '';
$list = get_field('how_we_work_list', $page) ?? [];
?>

<?php if ($title || !empty($list)): ?>
	<section class="how-we-work" id="how-we-work">
		<div class="container how-we-work__container section-gap">
			<?php if ($title): ?>
				<h2 class="how-we-work__title title-2">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if (!empty($list)): ?>
				<div class="how-we-work__grid grid">
					<?php foreach ($list as $index => $item):
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';
						if (!$item_title && !$item_descr)
							continue;

						$number = $index + 1 > 9 ? $index + 1 : '0' . ($index + 1);
						?>
						<div class="how-we-work__item how-we-work-item">
							<div class="how-we-work-item__number title-3">
								<?php echo esc_html($number); ?>
							</div>

							<?php if ($item_title): ?>
								<h3 class="how-we-work-item__title title-3">
									<?php echo esc_html($item_title); ?>
								</h3>
							<?php endif; ?>

							<?php if ($item_descr): ?>
								<div class="how-we-work-item__descr descr">
									<?php echo wp_kses_post($item_descr); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>