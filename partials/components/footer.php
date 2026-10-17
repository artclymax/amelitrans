<?php
$logo = get_field('header_logo', 'option') ?? [];
$descr = get_field('footer_descr', 'option') ?? '';
$footer_company = get_field('footer_company', 'option') ?? '';
$footer_copy = get_field('footer_copy', 'option') ?? '';
$footer_links = get_field('footer_links', 'option') ?? [];
?>

<?php if ($descr || $footer_company || !empty($footer_links)): ?>
	<footer class="footer" id="footer">
		<div class="container footer__container">
			<div class="footer__logo logo">
				<?php mx_logo($logo); ?>
			</div>

			<div class="footer__middle">
				<div class="footer__menu">
					<?php
					wp_nav_menu([
						'theme_location' => 'footer-menu',
						'container' => false,
						'menu_class' => 'footer-menu',
						'depth' => 1,
						'fallback_cb' => false,
					]);
					?>
				</div>

				<?php if ($descr): ?>
					<div class="footer__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="footer__bottom">
				<div class="footer__copy">
					&copy; <?php echo date('Y'); ?> 	<?php echo esc_html($footer_company); ?>.
					<?php if ($footer_copy): ?>
						<?php echo esc_html($footer_copy); ?>
					<?php endif; ?>
				</div>

				<?php if (!empty($footer_links)): ?>
					<div class="footer__bottom-links">
						<?php foreach ($footer_links as $item):
							$link = $item['footer_links_link'] ?? [];
							if (empty($link['url']))
								continue;
							?>
							<a class="footer__bottom-link link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
								<?php echo esc_html($link['title']); ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</footer>
<?php endif; ?>

