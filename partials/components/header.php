<?php
$header_class = $args['class'] ?? '';
$props = $args['props'] ?? '';

$logo = get_field('header_logo', 'option') ?? [];
$btn = get_field('header_btn', 'option') ?? [];

$header_phone = get_field('header_phone', 'option') ?? '';
$contacts_phone = get_field('contacts_phone', 'option') ?? [];
$phone = $header_phone ?: ($contacts_phone[0]['phone'] ?? '');
?>

<header class="header <?php echo esc_attr($header_class); ?>" data-auto-calc="header, height">
	<div class="header__container container">
		<div class="header__wrapper">
			<!-- logo -->
			<div class="header__logo logo">
				<?php mx_logo($logo); ?>
			</div>

			<!-- menu -->
			<nav class="header__menu header-menu">
				<div class="header-menu__wrapper">
					<div class="header-menu__main-menu">
						<?php
						wp_nav_menu([
							'theme_location' => 'header-menu',
							'container' => false,
							'menu_class' => 'header-menu__list',
							'fallback_cb' => false,
							'depth' => 1,
						]);
						?>
					</div>
					<div class="header-menu__box">
						<?php if ($phone): ?>
							<a class="header-menu__phone icon icon--phone"
								href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>"
								aria-label="Телефон: <?php echo esc_attr($phone); ?>">
								<span class="link">
									<?php echo esc_html($phone); ?>
								</span>
							</a>
						<?php endif; ?>

						<?php if (!empty($btn['url'])): ?>
							<a class="header-menu__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
								<?php echo esc_html($btn['title'] ?? ''); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</nav>

			<!-- phone -->
			<?php if ($phone): ?>
				<a class="header__mobile-phone visible-tablet" href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>"
					aria-label="Телефон: <?php echo esc_attr($phone); ?>">
					<span class="icon icon--phone"></span>
				</a>
			<?php endif; ?>

			<button class="header__burger-btn burger-btn visible-tablet" type="button" aria-label="Открыть меню">
				<span></span>
			</button>
		</div>
	</div>
</header>