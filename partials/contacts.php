<?php
$page = get_queried_object();

$bg = get_field('contacts_bg', $page) ?? null;
$title = get_field('contacts_title', $page) ?? '';
$form_title = get_field('contacts_form_title', $page) ?? '';
$form_descr = get_field('contacts_form_descr', $page) ?? '';
$form_shortcode = get_field('contacts_form_shortcode', $page) ?? '';

$company_name = get_field('contacts_company_name', 'option') ?? '';
$company_unp = get_field('contacts_company_unp', 'option') ?? '';
$address = get_field('contacts_address', 'option') ?? '';
$time = get_field('contacts_time', 'option') ?? '';
?>

<?php if ($title || $address || $time || $form_shortcode): ?>
	<section class="section-full section-contacts jarallax" id="contacts">
		<div class="container section-contacts__container">
			<div class="section-contacts__wrapper section-gap">
				<?php if ($title): ?>
					<h2 class="section-contacts__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<div class="section-contacts__grid">
					<!-- Левая колонка: контактная информация -->
					<div class="section-contacts__info">
						<div class="section-contacts__info-box">
							<h3 class="section-contacts__info-title title-3">Контактная информация</h3>
							<div class="section-contacts__info-list contacts-info-list">

								<?php if ($company_name): ?>
									<div class="contacts-info-list__item">
										<span class="contacts-info-list__icon icon icon--building"></span>
										<div class="contacts-info-list__content">
											<span class="contacts-info-list__label">Компания</span>
											<span class="contacts-info-list__value">
												<?php echo esc_html($company_name); ?>
												<?php if ($company_unp): ?>
													<br>УНП <?php echo esc_html($company_unp); ?>
												<?php endif; ?>
											</span>
										</div>
									</div>
								<?php endif; ?>
								<div class="contacts-info-list__item">
									<span class="contacts-info-list__icon icon icon--phone"></span>
									<div class="contacts-info-list__content">
										<span class="contacts-info-list__label">Телефон</span>
										<?php get_template_part('partials/components/phones', null, ['class' => 'contacts-info-list__phones']); ?>
									</div>
								</div>
								<div class="contacts-info-list__item">
									<span class="contacts-info-list__icon icon icon--email"></span>
									<div class="contacts-info-list__content">
										<span class="contacts-info-list__label">Электронная почта</span>
										<?php get_template_part('partials/components/emails', null, ['class' => 'contacts-info-list__emails']); ?>
									</div>

								</div>
								<?php if ($address): ?>
									<div class="contacts-info-list__item">
										<span class="contacts-info-list__icon icon icon--location"></span>
										<div class="contacts-info-list__content">
											<span class="contacts-info-list__label">Юридический адрес</span>
											<?php get_template_part('partials/components/address', null, [
												'class' => 'contacts-info-list__address',
												'is_address' => true,
												'descr' => $address
											]); ?>
										</div>
									</div>
								<?php endif; ?>

								<?php if ($time): ?>
									<div class="contacts-info-list__item">
										<span class="contacts-info-list__icon icon icon--clock"></span>
										<div class="contacts-info-list__content">
											<span class="contacts-info-list__label">Режим работы</span>
											<span class="contacts-info-list__value descr">
												<?php echo wp_kses_post($time); ?>
											</span>
										</div>
									</div>
								<?php endif; ?>

							</div>
						</div>
						<div class="section-contacts__info-box">
							<h3 class="section-contacts__info-title title-3">Мессенджеры и соцсети</h3>
							<?php get_template_part('partials/components/socials', null, ['class' => 'contacts-socials']); ?>
						</div>
					</div>

					<!-- Правая колонка: форма -->
					<div class="section-contacts__form-wrap">
						<?php if ($form_title): ?>
							<h3 class="section-contacts__form-title title-3">
								<?php echo esc_html($form_title); ?>
							</h3>
						<?php endif; ?>

						<?php if ($form_descr): ?>
							<div class="section-contacts__form-descr descr">
								<?php echo wp_kses_post($form_descr); ?>
							</div>
						<?php endif; ?>

						<?php if ($form_shortcode): ?>
							<div class="section-contacts__form">
								<?php echo do_shortcode($form_shortcode); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php if ($bg && is_array($bg) && !empty($bg['ID'])): ?>
			<div class="section-contacts__bg image-box jarallax-img">
				<?php echo wp_get_attachment_image($bg['ID'], 'full', false, [
					'class' => 'img',
					'alt' => $bg['alt'] ?: $title,
					'loading' => 'lazy'
				]); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>