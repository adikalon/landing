<?php

// Страница по умолчанию
$router['section'] = 'lp-site';
$router['page'] = 'main';

// Отлавливаем GET роутера
if(isset($_GET['route']) && $_GET['route'] != '') {
	$route = $_GET['route'];
	$lines = explode('/', $route);
	if ($lines[0] == $set->admin) {
		$router['section'] = 'lp-admin';
		if (isset($lines[1]) && $lines[1] != '') {
			if (count($lines) < 3 || $lines[2] == '') {
				$router['page'] = $lines[1];
			} else {
				$router['page'] = '404';
			}
		}
	} else {
		if (count($lines) < 2 || $lines[1] == '') {
			$router['page'] = $lines[0];
		} else {
			$router['page'] = '404';
		}
	}
	
// Проверяем физическое наличие файлов модели и вида
	if ($router['section'] == 'lp-admin') {
		if (!file_exists('lp-admin/pages/models/'.$router['page'].'.php') || !file_exists('lp-admin/pages/views/'.$router['page'].'.php')) {
			$router['page'] = '404';
		}
	} else {
		if (!file_exists('lp-site/pages/models/'.$router['page'].'.php') || !file_exists('lp-site/pages/views/'.$router['page'].'.php')) {
			$router['page'] = '404';
		}
	}

// Проверяем наличие в массиве зарегистрированных страниц
	if ($router['section'] == 'lp-admin') {
		if(!array_key_exists($router['page'], $pages['lp-admin'])) {
			$router['page'] = '404';
		}
	} else {
		if(!array_key_exists($router['page'], $pages['lp-site'])) {
			$router['page'] = '404';
		}
	}
}