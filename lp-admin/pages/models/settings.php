<?php
$user = R::findOne("users", "login = '".$_SESSION['user']."'");

if (isset($_POST['name'])) {
	$p_name = $_POST['name'];
	if (iconv_strlen($p_name) < 1) {
		$error['name'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_name) > 255) {
		$error['name'] = 'Не более 255 символов';
	} else {
		$set->name = $p_name;
		R::store($set);
	}
}

if (isset($_POST['description'])) {
	$p_description = $_POST['description'];
	if (iconv_strlen($p_description) < 1) {
		$error['description'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_description) > 500) {
		$error['description'] = 'Не более 500 символов';
	} else {
		$set->description = $p_description;
		R::store($set);
	}
}

if (isset($_POST['keywords'])) {
	$p_keywords = $_POST['keywords'];
	if (iconv_strlen($p_keywords) < 1) {
		$error['keywords'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_keywords) > 500) {
		$error['keywords'] = 'Не более 500 символов';
	} else {
		$set->keywords = $p_keywords;
		R::store($set);
	}
}

if (isset($_POST['login'])) {
	$p_login = $_POST['login'];
	if (iconv_strlen($p_login) < 1) {
		$error['login'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_login) > 255) {
		$error['login'] = 'Не более 255 символов';
	} else {
		$user->login = $p_login;
		R::store($user);
		$_SESSION['user'] = $p_login;
	}
}

if (isset($_POST['admin'])) {
	$p_admin = $_POST['admin'];
	if (iconv_strlen($p_admin) < 1) {
		$error['admin'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_admin) > 255) {
		$error['admin'] = 'Не более 255 символов';
	} elseif (array_key_exists($p_admin, $pages['lp-site'])) {
		$error['admin'] = 'Адрес уже занят';
	} else {
		$set->admin = $p_admin;
		R::store($set);
	}
}

if (isset($_POST['time'])) {
	$p_time = str_replace(',', '.', $_POST['time']);
	if (!preg_match('/^\-?\d+(\.\d{0,})?$/', $p_time)) {
		$error['time'] = 'Только число';
	} elseif ($p_time < -24) {
		$error['time'] = 'Не менее -24';
	} elseif ($p_time > 24) {
		$error['time'] = 'Не более 24';
	} else {
		$set->time = $p_time;
		R::store($set);
	}
}

if (isset($_POST['pagi'])) {
	$p_pagi = $_POST['pagi'];
	if (!preg_match('/^\+?\d+$/', $p_pagi)) {
		$error['pagi'] = 'Только положительное число';
	} elseif ($p_pagi < 1) {
		$error['pagi'] = 'Не менее 1';
	} elseif ($p_pagi > 100) {
		$error['pagi'] = 'Не более 100';
	} else {
		$set->pagi = $p_pagi;
		R::store($set);
	}
}

if (isset($_POST['rapport'])) {
	$p_rapport = $_POST['rapport'];
	if (iconv_strlen($p_rapport) < 1) {
		$error['rapport'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_rapport) > 1000) {
		$error['rapport'] = 'Не более 1000 символов';
	} else {
		$set->rapport = $p_rapport;
		R::store($set);
	}
}

if (isset($_POST['control_block'])) {
	if (isset($_POST['panel'])) {
		$set->panel = 1;
	} else {
		$set->panel = 0;
	}
	R::store($set);
}

if (isset($_POST['newpass']) && isset($_POST['renewpass']) && isset($_POST['oldpass'])) {
	if ($_POST['newpass'] == $_POST['renewpass']) {
		$p_newpass = $_POST['newpass'];
		$p_oldpass = $_POST['oldpass'];
		if (passValid($user->login, $p_oldpass)) {
			if (iconv_strlen($p_newpass) < 1) {
				$error['newpass'] = 'Не менее 1 символа';
			} elseif (iconv_strlen($p_newpass) > 255) {
				$error['newpass'] = 'Не более 255 символов';
			} else {
				$user->pass = password_hash($p_newpass, PASSWORD_DEFAULT);
				R::store($user);
				$_POST['ok_pass'] = true;
				unset($_POST['newpass']);
				unset($_POST['renewpass']);
				unset($_POST['oldpass']);
			}
		} else {
			$error['oldpass'] = 'Введенный пароль не соответствует текущему';
		}
	} else {
		$error['newpass'] = 'Пароли не совпадают';
	}
}

if (isset($_POST['mail_block'])) {
	if (isset($_POST['mail_on'])) {
		$set->mail_on = 1;
	} else {
		$set->mail_on = 0;
	}
	R::store($set);
}

if (isset($_POST['mail_address'])) {
	$p_mail_address = $_POST['mail_address'];
	if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i', $p_mail_address)) {
		$error['mail_address'] = 'Неверный формат';
	} else {
		$set->mail_address = $p_mail_address;
		R::store($set);
	}
}

if (isset($_POST['mail_login'])) {
	$p_mail_login = $_POST['mail_login'];
	if (iconv_strlen($p_mail_login) < 1) {
		$error['mail_login'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_mail_login) > 255) {
		$error['mail_login'] = 'Не более 255 символов';
	} else {
		$set->mail_login = $p_mail_login;
		R::store($set);
	}
}

if (isset($_POST['mail_pass'])) {
	$p_mail_pass = $_POST['mail_pass'];
	if (iconv_strlen($p_mail_pass) < 1) {
		$error['mail_pass'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_mail_pass) > 255) {
		$error['mail_pass'] = 'Не более 255 символов';
	} else {
		$set->mail_pass = $p_mail_pass;
		R::store($set);
	}
}

if (isset($_POST['mail_host'])) {
	$p_mail_host = $_POST['mail_host'];
	if (iconv_strlen($p_mail_host) < 1) {
		$error['mail_host'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_mail_host) > 255) {
		$error['mail_host'] = 'Не более 255 символов';
	} else {
		$set->mail_host = $p_mail_host;
		R::store($set);
	}
}

if (isset($_POST['mail_port'])) {
	$p_mail_port = $_POST['mail_port'];
	if (!preg_match('/^\+?\d+$/', $p_mail_port)) {
		$error['mail_port'] = 'Только положительное число';
	} elseif (iconv_strlen($p_mail_host) < 1) {
		$error['mail_port'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_mail_host) > 5) {
		$error['mail_port'] = 'Не более 5 символов';
	} else {
		$set->mail_port = $p_mail_port;
		R::store($set);
	}
}

if (isset($_POST['mail_smtp'])) {
	$p_mail_smtp = $_POST['mail_smtp'];
	if (iconv_strlen($p_mail_smtp) < 1) {
		$error['mail_smtp'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_mail_smtp) > 255) {
		$error['mail_smtp'] = 'Не более 255 символов';
	} else {
		$set->mail_smtp = $p_mail_smtp;
		R::store($set);
	}
}

if (isset($_POST['mail_name'])) {
	$p_mail_name = $_POST['mail_name'];
	if (iconv_strlen($p_mail_name) < 1) {
		$error['mail_name'] = 'Не менее 1 символа';
	} elseif (iconv_strlen($p_mail_name) > 255) {
		$error['mail_name'] = 'Не более 255 символов';
	} else {
		$set->mail_name = $p_mail_name;
		R::store($set);
	}
}