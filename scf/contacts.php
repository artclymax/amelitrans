<?php
acf_add_local_field_group([
	'key' => 'group_contacts_section',
	'title' => 'Секция "Связаться с нами"',
	'fields' => [
		[
			'key' => 'field_contacts_sec_tab_main',
			'label' => 'Контент секции',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_contacts_title',
			'label' => 'Заголовок секции',
			'name' => 'contacts_title',
			'type' => 'text'
		],
		[
			'key' => 'field_contacts_form_title',
			'label' => 'Заголовок формы',
			'name' => 'contacts_form_title',
			'type' => 'text'
		],
		[
			'key' => 'field_contacts_form_descr',
			'label' => 'Описание формы',
			'name' => 'contacts_form_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_contacts_form_shortcode',
			'label' => 'Шорткод формы',
			'name' => 'contacts_form_shortcode',
			'type' => 'text',
			'instructions' => 'Например: [contact-form-7 id="123"]'
		],

		[
			'key' => 'field_contacts_sec_tab_media',
			'label' => 'Медиа',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_contacts_bg',
			'label' => 'Фоновое изображение',
			'name' => 'contacts_bg',
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