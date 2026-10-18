<?php
acf_add_local_field_group([
	'key' => 'group_services',
	'title' => 'Секция "Наши услуги"',
	'fields' => [
		[
			'key' => 'field_services_title',
			'label' => 'Заголовок секции',
			'name' => 'services_title',
			'type' => 'text'
		],
		[
			'key' => 'field_services_list',
			'label' => 'Услуги',
			'name' => 'services_list',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить услугу',
			'sub_fields' => [
				[
					'key' => 'field_services_list_image',
					'label' => 'Изображение',
					'name' => 'image',
					'type' => 'image'
				],
				[
					'key' => 'field_services_list_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text'
				],
				[
					'key' => 'field_services_list_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 2,
					'new_lines' => 'wpautop'
				],
				[
					'key' => 'field_services_list_btn',
					'label' => 'Кнопка',
					'name' => 'btn',
					'type' => 'link'
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