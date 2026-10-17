<?php
acf_add_local_field_group([
	'key' => 'group_how_we_work',
	'title' => 'Секция "Как мы работаем"',
	'fields' => [
		[
			'key' => 'field_how_we_work_title',
			'label' => 'Заголовок секции',
			'name' => 'how_we_work_title',
			'type' => 'text'
		],
		[
			'key' => 'field_how_we_work_list',
			'label' => 'Список шагов',
			'name' => 'how_we_work_list',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить шаг',
			'sub_fields' => [
				[
					'key' => 'field_how_we_work_list_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text'
				],
				[
					'key' => 'field_how_we_work_list_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 3,
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