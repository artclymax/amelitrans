<?php
$page = get_queried_object();
$title = get_field('tariffs_title', $page) ?? '';
$note = get_field('tariffs_note', $page) ?? '';
$table = get_field('tariffs_table', $page) ?? '';
?>

<?php if ($title || $note || $table): ?>
	<section class="section-full tariffs" id="tariffs">
		<div class="container tariffs__container section-gap">
			<?php if (!empty($title) || !empty($note)): ?>
				<div class="tariffs__header">
					<?php if ($title): ?>
						<h2 class="tariffs__title title-2">
							<?php echo esc_html($title); ?>
						</h2>
					<?php endif; ?>

					<?php if ($note): ?>
						<div class="tariffs__note note descr">
							<?php echo wp_kses_post($note); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ($table): ?>
				<div class="tariffs__table-wrapper descr">
					<?php echo wp_kses_post($table); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>