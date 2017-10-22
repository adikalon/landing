<?php

// site pages
$pages['lp-site']['main'] = [
	'title' => $set->name,
	'description' => $set->description,
	'keywords' => $set->keywords,
	'canonical' => $site['address'],
	'access' => true
];

$pages['lp-site']['404'] = [
	'title' => 'Страница не найдена',
	'description' => 'Ошибка 404. Страница не найдена',
	'keywords' => '404',
	'canonical' => $site['address'].'/404',
	'access' => true
];

$pages['lp-site']['exit'] = [
	'title' => 'Выход',
	'description' => 'Выход',
	'keywords' => 'Выход',
	'canonical' => $site['address'].'/exit',
	'access' => false
];

// admin pages
$pages['lp-admin']['main'] = [
	'title' => 'Управление: Заявки'
];

$pages['lp-admin']['404'] = [
	'title' => 'Управление: Страница не найдена'
];

$pages['lp-admin']['login'] = [
	'title' => 'Управление: Авторизация'
];

$pages['lp-admin']['settings'] = [
	'title' => 'Управление: Настройки'
];

$pages['lp-admin']['texts'] = [
	'title' => 'Управление: Правки'
];