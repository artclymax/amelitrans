<?php
acf_add_local_field_group([
	'key' => 'group_faq',
	'title' => 'Секция "Часто задаваемые вопросы"',
	'fields' => [
		[
			'key' => 'field_faq_title',
			'label' => 'Заголовок секции',
			'name' => 'faq_title',
			'type' => 'text'
		],
		[
			'key' => 'field_faq_list',
			'label' => 'Список вопросов',
			'name' => 'faq_list',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить вопрос',
			'sub_fields' => [
				[
					'key' => 'field_faq_list_title',
					'label' => 'Вопрос',
					'name' => 'title',
					'type' => 'text'
				],
				[
					'key' => 'field_faq_list_descr',
					'label' => 'Ответ',
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