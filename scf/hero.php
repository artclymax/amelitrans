<?php
acf_add_local_field_group([
	'key' => 'group_hero',
	'title' => 'Секция "Hero"',
	'fields' => [
		[
			'key' => 'field_hero_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_hero_title',
			'label' => 'Заголовок',
			'name' => 'hero_title',
			'type' => 'text'
		],
		[
			'key' => 'field_hero_descr',
			'label' => 'Описание',
			'name' => 'hero_descr',
			'type' => 'wysiwyg'
		],
		[
			'key' => 'field_hero_btn',
			'label' => 'Кнопка',
			'name' => 'hero_btn',
			'type' => 'link'
		],

		[
			'key' => 'field_hero_tab_list',
			'label' => 'Список преимуществ',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_hero_list',
			'label' => 'Преимущества',
			'name' => 'hero_list',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить преимущество',
			'sub_fields' => [
				[
					'key' => 'field_hero_list_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text'
				],
				[
					'key' => 'field_hero_list_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 2,
					'new_lines' => 'wpautop'
				],
			]
		],
		[
			'key' => 'field_hero_tab_image',
			'label' => 'Картинка',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_hero_image',
			'label' => 'Фоновая картинка',
			'name' => 'hero_image',
			'type' => 'image',
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