<?php
acf_add_local_field_group([
	'key' => 'group_about',
	'title' => 'Секция "О компании"',
	'fields' => [
		[
			'key' => 'field_about_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_about_title',
			'label' => 'Заголовок секции',
			'name' => 'about_title',
			'type' => 'text'
		],

		[
			'key' => 'field_about_tab_left',
			'label' => 'Левая колонка',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_about_left_image',
			'label' => 'Изображение',
			'name' => 'about_left_image',
			'type' => 'image',
		],

		[
			'key' => 'field_about_tab_right',
			'label' => 'Правая колонка',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_about_right_title',
			'label' => 'Заголовок',
			'name' => 'about_right_title',
			'type' => 'text'
		],
		[
			'key' => 'field_about_right_descr',
			'label' => 'Описание',
			'name' => 'about_right_descr',
			'type' => 'wysiwyg',
		],

		[
			'key' => 'field_about_tab_license',
			'label' => 'Лицензия',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_about_license_image',
			'label' => 'Изображение лицензии',
			'name' => 'about_license_image',
			'type' => 'image',
		],
		[
			'key' => 'field_about_license_title',
			'label' => 'Заголовок',
			'name' => 'about_license_title',
			'type' => 'text'
		],
		[
			'key' => 'field_about_license_descr',
			'label' => 'Описание',
			'name' => 'about_license_descr',
			'type' => 'textarea',
			'rows' => 2,
			'new_lines' => 'wpautop'
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