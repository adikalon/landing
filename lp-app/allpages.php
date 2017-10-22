<?php

// Авторизация по кукам
if (!userStatus()) {
	if (isset($_COOKIE['auth'])) {
		$cookAuth = $_COOKIE['auth'];
		$find_cookid = R::findOne("users", "remember = '".$cookAuth."'");
		if ($find_cookid !== NULL) {
			setAuth($find_cookid->login);
		}
	}
}

// Проверка на доступ к странице
if (!userStatus() && $router['section'] != 'lp-admin') {
	if (!$pages[$router['section']][$router['page']]['access']) $router['page'] = '404';
}

// Страница аторизации, если не авторизован
if (!userStatus() && $router['section'] == 'lp-admin') {
	$backpage = $router['page'];
	$router['page'] = 'login';
}

// 404 на странице авторизации, если уже авторизован
if (userStatus() && $router['page'] == 'login') {
	$router['page'] = '404';
}

// Количество новых заявок
if (userStatus()) {
	$find_new_req = R::findAll('requests', 'status = 2');
	$count_new_req = count($find_new_req);
}