<?php
acf_add_local_field_group([
	'key' => 'group_geo',
	'title' => 'Секция "Маршруты перевозок"',
	'fields' => [
		[
			'key' => 'field_geo_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_geo_title',
			'label' => 'Заголовок секции',
			'name' => 'geo_title',
			'type' => 'text'
		],
		
		[
			'key' => 'field_geo_bg',
			'label' => 'Фоновое изображение',
			'name' => 'geo_bg',
			'type' => 'image',
		],

		[
			'key' => 'field_geo_tab_list',
			'label' => 'Маршруты',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_geo_list',
			'label' => 'Список маршрутов',
			'name' => 'geo_list',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить маршрут',
			'sub_fields' => [
				[
					'key' => 'field_geo_list_image',
					'label' => 'Изображение (флаги)',
					'name' => 'image',
					'type' => 'image'
				],
				[
					'key' => 'field_geo_list_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text'
				],
				[
					'key' => 'field_geo_list_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 2,
					'new_lines' => 'wpautop'
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