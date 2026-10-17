<?php
$page = get_page_by_path('home', OBJECT, 'page');

$title = get_field('hero_title', $page) ?? '';
$descr = get_field('hero_descr', $page) ?? '';
$btn = get_field('hero_btn', $page) ?? [];
$list = get_field('hero_list', $page) ?? [];
$image = get_field('hero_image', $page) ?? [];
?>

<?php if ($title || $descr || !empty($btn['url']) || !empty($list)): ?>
	<section class="hero jarallax" id="hero">
		<div class="container hero__container">
			<?php if ($title || $descr || !empty($btn['url'])): ?>
				<div class="hero__top">
					<?php if ($title): ?>
						<h1 class="hero__title title-1">
							<?php echo esc_html($title); ?>
						</h1>
					<?php endif; ?>

					<?php if ($descr): ?>
						<div class="hero__descr descr">
							<?php echo wp_kses_post($descr); ?>
						</div>
					<?php endif; ?>

					<?php if (!empty($btn['url'])): ?>
						<a class="hero__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?>
								target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($btn['title'] ?? ''); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($list)): ?>
				<ul class="hero__benefits grid">
					<?php foreach ($list as $item):
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';
						if (!$item_title && !$item_descr)
							continue;
						?>
						<li class="hero__item hero-item">
							<?php if ($item_title): ?>
								<h3 class="hero-item__title title-3">
									<?php echo esc_html($item_title); ?>
								</h3>
							<?php endif; ?>

							<?php if ($item_descr): ?>
								<div class="hero-item__descr descr">
									<?php echo wp_kses_post($item_descr); ?>
								</div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<?php if (!empty($image)): ?>
			<div class="hero__image image-box jarallax-img">
				<?php echo wp_get_attachment_image(
					$image['ID'],
					'full',
					false,
					array(
						'class' => 'img',
						'alt' => $image['alt'] ?: ''
					)
				); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>