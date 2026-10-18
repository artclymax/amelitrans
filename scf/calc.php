<?php
acf_add_local_field_group([
	'key' => 'group_calc',
	'title' => 'Секция "Рассчитать стоимость"',
	'fields' => [
		[
			'key' => 'field_calc_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_calc_title',
			'label' => 'Заголовок секции',
			'name' => 'calc_title',
			'type' => 'text'
		],
		[
			'key' => 'field_calc_descr',
			'label' => 'Описание / формула',
			'name' => 'calc_descr',
			'type' => 'textarea',
			'rows' => 2,
			'new_lines' => 'wpautop',
			'instructions' => 'Например: Стоимость без НДС рассчитывается по формуле: расстояние (км) × вес груза (т) × тариф'
		],
		[
			'key' => 'field_calc_btn',
			'label' => 'Кнопка',
			'name' => 'calc_btn',
			'type' => 'link'
		],

		[
			'key' => 'field_calc_tab_media',
			'label' => 'Медиа',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_calc_bg',
			'label' => 'Фоновое изображение',
			'name' => 'calc_bg',
			'type' => 'image',
			'instructions' => 'Рекомендуемый размер: 1920×800px'
		],

		[
			'key' => 'field_calc_tab_tariffs',
			'label' => 'Тарифы для расчёта',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_calc_tariffs',
			'label' => 'Список тарифов',
			'name' => 'calc_tariffs',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить тариф',
			'instructions' => 'Правила проверяются сверху вниз. Первое совпадение — используется.',
			'sub_fields' => [
				[
					'key' => 'field_calc_tariffs_condition',
					'label' => 'Условие',
					'name' => 'condition',
					'type' => 'select',
					'choices' => [
						'less' => 'Меньше (<)',
						'less_or_equal' => 'Меньше или равно (≤)',
						'equal' => 'Равно (=)',
						'greater_or_equal' => 'Больше или равно (≥)',
						'greater' => 'Больше (>)',
						'between' => 'Между (от и до)',
					],
					'default_value' => 'between'
				],
				[
					'key' => 'field_calc_tariffs_distance_from',
					'label' => 'Расстояние от, км',
					'name' => 'distance_from',
					'type' => 'number',
					'min' => 0,
					'step' => 1
				],
				[
					'key' => 'field_calc_tariffs_distance_to',
					'label' => 'Расстояние до, км',
					'name' => 'distance_to',
					'type' => 'number',
					'min' => 0,
					'step' => 1,
					'instructions' => 'Только для условия "Между"'
				],
				[
					'key' => 'field_calc_tariffs_price',
					'label' => 'Цена без НДС за 1 т/км, бел.руб',
					'name' => 'price',
					'type' => 'number',
					'min' => 0,
					'step' => 0.01
				],
			]
		],
	],
	'location' => [
		[
			[
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'front-page.php'
			]
		]
	],
]);
?>