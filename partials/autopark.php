<?php
$page = get_queried_object();
$title = get_field('autopark_title', $page) ?? '';
$descr = get_field('autopark_descr', $page) ?? '';
$list = get_field('autopark_list', $page) ?? [];

$list = array_merge($list, $list);
?>

<?php if ($title || $descr || !empty($list)): ?>
	<section class="section-full autopark section-gap" id="autopark">
		<div class="container autopark__container">
			<?php if ($title || $descr): ?>
				<div class="autopark__header">
					<div class="autopark__info">
						<?php if ($title): ?>
							<h2 class="autopark__title title-2">
								<?php echo esc_html($title); ?>
							</h2>
						<?php endif; ?>

						<?php if ($descr): ?>
							<div class="autopark__descr descr">
								<?php echo wp_kses_post($descr); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="autopark__nav swiper-btn-box hidden-mobile">
						<button class="swiper-btn swiper-btn__prev" data-swiper-btn-prev=".autopark .swiper" type="button"
							aria-label="Назад"></button>
						<button class="swiper-btn swiper-btn__next" data-swiper-btn-next=".autopark .swiper" type="button"
							aria-label="Вперёд"></button>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php if (!empty($list)): ?>
			<div class="swiper autopark__swiper"
				data-swiper='{ "slidesPerView": 1, "spaceBetween": 16, "loop": true,  "initialSlide": 1, "slidesOffsetBefore": 0, "breakpoints": { "768": { "slidesPerView": 2, "slidesOffsetBefore": 10 }, "1024": { "slidesPerView": 2.3, "spaceBetween": 24, "slidesOffsetBefore": 10 }, "1400": { "slidesPerView": 3.1, "spaceBetween": 32, "slidesOffsetBefore": 10 } } }'>
				<div class="swiper-wrapper">
					<?php foreach ($list as $item):
						$item_image = $item['image'] ?? $item ?? null;
						if (!($item_image && is_array($item_image) && !empty($item_image['ID'])))
							continue;
						?>
						<div class="swiper-slide autopark__slide autopark-slide">
							<a class="autopark-slide__wrapper image-box" href="<?php echo esc_url($item_image['url']); ?>"
								data-fancybox="fancybox-autopark">
								<?php echo wp_get_attachment_image($item_image['ID'], 'large', false, [
									'class' => 'img',
									'alt' => $item_image['alt'] ?: $title,
									'loading' => 'lazy'
								]); ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="container autopark__nav-container visible-mobile">
			<div class="autopark__nav swiper-btn-box">
				<button class="swiper-btn swiper-btn__prev" data-swiper-btn-prev=".autopark .swiper" type="button"
					aria-label="Назад"></button>
				<button class="swiper-btn swiper-btn__next" data-swiper-btn-next=".autopark .swiper" type="button"
					aria-label="Вперёд"></button>
			</div>
		</div>
	</section>
<?php endif; ?>