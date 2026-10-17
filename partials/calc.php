<?php
$page = get_queried_object();
$bg = get_field('calc_bg', $page) ?? null;
$title = get_field('calc_title', $page) ?? '';
$descr = get_field('calc_descr', $page) ?? '';
$tariffs = get_field('calc_tariffs', $page) ?? [];
$btn = get_field('calc_btn', $page) ?? [];
?>

<?php if ($title || $descr || !empty($tariffs) || !empty($btn['url'])): ?>
	<section class="section-full section-calc jarallax" id="section-calc">

		<div class="container section-calc__container">
			<div class="section-calc__wrapper section-gap">
			<div class="section-calc__header">

			<?php if ($title): ?>
				<h2 class="section-calc__title title-2">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if ($descr): ?>
				<div class="section-calc__descr descr">
					<?php echo wp_kses_post($descr); ?>
				</div>
			<?php endif; ?>
			</div>

			<?php if (!empty($tariffs)): ?>
				<div class="section-calc__calculator calc" id="calc-calculator"
					data-tariffs="<?php echo esc_attr(wp_json_encode($tariffs)); ?>">
					<div class="calc__grid">
						<div class="form-field calc__field">
							<p>
								<label class="form-field__label calc__label" for="calc-distance">
								<?php esc_html_e('Расстояние, км', 'textdomain'); ?>
							</label>
							<input class="form-input calc__input" type="number" id="calc-distance" min="0" step="1" placeholder="0"
								autocomplete="off">
							</p>
						</div>

						<div class="form-field calc__field">
							<p>
							<label class="form-field__label calc__label" for="calc-weight">
								<?php esc_html_e('Вес, т', 'textdomain'); ?>
							</label>
							<input class="form-input calc__input" type="number" id="calc-weight" min="0" step="0.1" placeholder="0"
								autocomplete="off">
							</p>
							
						</div>

						<div class="form-field calc__field form-field calc__field--result">
						<p>
							<label class="form-field__label calc__label" for="calc-result">
								<?php esc_html_e('Стоимость без НДС, бел.руб (считается автоматически)', 'textdomain'); ?>
							</label>
							<input class="form-input calc__input form-input calc__input--result" type="text" id="calc-result" readonly placeholder="0">
							</p>
						</div>

						<div class="form-field calc__field form-field calc__field--action">
							<?php if (!empty($btn['url'])): ?>
								<a class="calc__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?>
										target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?> data-calc-distance=""
									data-calc-weight="" data-calc-result="">
									<?php echo esc_html($btn['title'] ?? ''); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
		</div>
		<?php if ($bg && is_array($bg) && !empty($bg['ID'])): ?>
			<div class="section-calc__bg image-box jarallax-img">
				<?php echo wp_get_attachment_image($bg['ID'], 'full', false, [
					'class' => 'img',
					'alt' => $bg['alt'] ?: $title,
					'loading' => 'lazy'
				]); ?>
			</div>
		<?php endif; ?>

	</section>
<?php endif; ?>