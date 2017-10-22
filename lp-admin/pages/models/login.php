<?php
if (!userStatus() && isset($_POST['auth_login']) && isset($_POST['auth_pass'])) {
	$login = $_POST['auth_login'];
	$pass = $_POST['auth_pass'];
	if (passValid($login, $pass)) {
		setAuth($login);
		if (!isset($_POST['auth_remember'])) {
			$ident = getRandString(200);
			setcookie('auth', $ident, time()+3600*24*30);
			$find_ident = R::findOne("users", "login = '".$login."'");
			$find_ident->remember = $ident;
			R::store($find_ident);
			if ($backpage == 'login' || $backpage == 'main') {
				header ('Location: '.$site['address'].'/'.$set->admin);
			} else {
				header ('Location: '.$site['address'].'/'.$set->admin.'/'.$backpage);
			}
			exit();
		}
	} else {
		$info = 'Логин или пароль введен не верно';
	}
}