<?php
acf_add_local_field_group([
	'key' => 'group_autopark',
	'title' => 'Секция "Наш автопарк"',
	'fields' => [
		[
			'key' => 'field_autopark_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_autopark_title',
			'label' => 'Заголовок секции',
			'name' => 'autopark_title',
			'type' => 'text'
		],
		[
			'key' => 'field_autopark_descr',
			'label' => 'Описание',
			'name' => 'autopark_descr',
			'type' => 'wysiwyg',
		],

		[
			'key' => 'field_autopark_tab_list',
			'label' => 'Слайдер',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_autopark_list',
			'label' => 'Галерея автопарка',
			'name' => 'autopark_list',
			'type' => 'gallery',
			'button_label' => 'Добавить фото',
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