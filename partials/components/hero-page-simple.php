<?php
$page = get_queried_object();
$class = $args['class'] ?? '';

$title = '';
$image = null;


if (!$title || !$descr || !$image) {
	if (is_tax()) {
		$term = get_queried_object();
		$title = $title ?: (get_field('hero_title', $term) ?? '');
		$image = $image ?: (get_field('hero_image', $term) ?? '');

		if (!$title) {
			$title = single_term_title('', false);
		}
	} else {
		if (is_archive()) {
			$archive_name = '';
			$queried = get_queried_object();
			$archive_name = is_string($queried->has_archive ?? null) ? $queried->has_archive : ($queried->name ?? '');
			$archive_page = $archive_name ? get_page_by_path($archive_name, OBJECT, 'page') : null;
			if ($archive_page) {
				$page = $archive_page;
			}
		}
		$title = $title ?: (get_field('hero_title', $page) ?? '');
		$image = $image ?: (get_field('hero_image', $page) ?? '');

		if (!$title) {
			if (is_post_type_archive()) {
				$title = post_type_archive_title('', false);
			} else {
				$title = get_the_title();
			}
		}
	}
}

if ($title):
	?>
	<section class="hero-page hero-page-simple <?php echo esc_attr($class); ?>" id="hero-page-simple">
		<div class="container hero-page__container">
			<div class="hero-page__breadcrumbs page-breadcrumbs">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				} ?>
			</div>
			<?php if ($title): ?>
				<h1 class="hero-page__title title-1 descr">
					<?php echo esc_html($title); ?>
				</h1>
			<?php endif; ?>
		</div>
		<?php if (!empty($image)): ?>
			<div class="hero-page__image image-box">
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