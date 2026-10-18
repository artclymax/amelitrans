<?php
acf_add_local_field_group([
	'key' => 'group_tariffs',
	'title' => 'Секция "Тарифы на услуги перевозки"',
	'fields' => [
		[
			'key' => 'field_tariffs_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_tariffs_title',
			'label' => 'Заголовок секции',
			'name' => 'tariffs_title',
			'type' => 'text'
		],
		[
			'key' => 'field_tariffs_note',
			'label' => 'Примечание',
			'name' => 'tariffs_note',
			'type' => 'wysiwyg',
		],

		[
			'key' => 'field_tariffs_tab_table',
			'label' => 'Таблица',
			'name' => '',
			'type' => 'tab'
		],
		[
			'key' => 'field_tariffs_table',
			'label' => 'Таблица тарифов',
			'name' => 'tariffs_table',
			'type' => 'wysiwyg',
			'instructions' => 'Используй кнопку «Таблица» в редакторе. Для объединения ячеек — правый клик по ячейке → «Объединить»'
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