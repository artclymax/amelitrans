<?php
add_action('acf/init', function () {
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => 'Контактные данные',
			'menu_title' => 'Контактные данные',
			'menu_slug' => 'opt-contacts',
			'position' => 20,
		]);
	}

	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	acf_add_local_field_group([
		'key' => 'group_contacts_page',
		'title' => 'Контактные данные',
		'fields' => [
			[
				'key' => 'field_contacts_tab_phones',
				'label' => 'Телефон',
				'name' => '',
				'type' => 'tab',
			],
			[
				'key' => 'field_contacts_phones',
				'label' => 'Телефоны',
				'name' => 'contacts_phones',
				'type' => 'repeater',
				'layout' => 'table',
				'collapsed' => 'field_contact_phone_number',
				'button_label' => 'Добавить телефон',
				'sub_fields' => [
					[
						'key' => 'field_contact_phone_number',
						'label' => 'Номер телефона',
						'name' => 'phone',
						'type' => 'text',
					],
				],
			],
			[
				'key' => 'field_contacts_tab_email',
				'label' => 'Email',
				'name' => '',
				'type' => 'tab',
			],
			[
				'key' => 'field_contacts_emails',
				'label' => 'Email адреса',
				'name' => 'contacts_emails',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_contact_email_link',
				'button_label' => 'Добавить email',
				'sub_fields' => [
					[
						'key' => 'field_contact_email_link',
						'label' => 'Email',
						'name' => 'email',
						'type' => 'email',
					],
				],
			],
			[
				'key' => 'field_contacts_tab_address_time',
				'label' => 'Адрес и время работы',
				'name' => '',
				'type' => 'tab',
			],
			[
				'key' => 'field_contacts_address',
				'label' => 'Адрес',
				'name' => 'contacts_address',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_contacts_time',
				'label' => 'Время работы',
				'name' => 'contacts_time',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_contacts_tab_socials',
				'label' => 'Соцсети',
				'name' => '',
				'type' => 'tab',
			],
			[
				'key' => 'field_contacts_socials',
				'label' => 'Социальные сети',
				'name' => 'contacts_socials',
				'type' => 'repeater',
				'layout' => 'table',
				'collapsed' => 'field_contacts_social_link',
				'button_label' => 'Добавить соцсеть',
				'sub_fields' => [
					[
						'key' => 'field_contacts_social_image',
						'label' => 'Иконка',
						'name' => 'image',
						'type' => 'image',
					],
					[
						'key' => 'field_contacts_social_link',
						'label' => 'Ссылка на соцсеть',
						'name' => 'link',
						'type' => 'link',
					],

				],
			],
			[
				'key' => 'field_pg_contacts_tab_legal',
				'label' => 'Компания',
				'name' => '',
				'type' => 'tab',
			],
			[
				'key' => 'field_contacts_company_name',
				'label' => 'Название компании',
				'name' => 'contacts_company_name',
				'type' => 'text',
			],
			[
				'key' => 'field_contacts_company_unp',
				'label' => 'УНП',
				'name' => 'contacts_company_unp',
				'type' => 'text',
			],
		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-contacts',
				],
			],
		],
	]);
});
?>