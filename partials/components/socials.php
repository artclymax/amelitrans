<?php
$class = $args['class'] ?? '';
$socials = get_field('contacts_socials', 'option') ?? [];

if (!empty($socials)): ?>
	<div class="socials <?= esc_attr($class) ?>">
		<?php foreach ($socials as $social):
			$social_image = $social['image'] ?? null;
			$social_link = $social['link'] ?? [];

			if (empty($social_link['url']))
				continue;
			?>
			<a class="socials__link link-icon" href="<?php echo esc_attr($social_link['url']); ?>" target="_blank"
				rel="noopener noreferrer" aria-label="<?php echo esc_attr($social_link['title'] ?? 'Социальная сеть'); ?>">
				<?php if ($social_image && is_array($social_image) && !empty($social_image['ID'])): ?>
					<?php echo wp_get_attachment_image($social_image['ID'], 'thumbnail', false, [
						'class' => 'socials__icon',
						'alt' => $social_image['alt'] ?: ($social_link['title'] ?? 'Соцсеть'),
						'loading' => 'lazy'
					]); ?>
				<?php else: ?>
					<span class="socials__text"><?php echo esc_html($social_link['title']); ?></span>
				<?php endif; ?>
			</a>
		<?php endforeach; ?>
	</div>
<?php endif; ?>