<?php

// Сверка пароля с хэшем пароля
function passValid($login, $pass) {
	$find_pass = R::findOne("users", "login = '".$login."'");
	if ($find_pass === NULL) {
		return false;
	}
	$hash = $find_pass->pass;
	if (password_verify($pass, $hash)) {
		return $find_pass;
	} else {
		return false;
	}
}

// Авторизация
function setAuth($login) {
	$_SESSION['user'] = $login;
}

// Если авторизован вернет true, если нет - false
function userStatus() {
	if (isset($_SESSION['user'])) {
		return true;
	} else {
		return false;
	}
}

// Генерация рандомных строк
function getRandString($length) {
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$numChars = strlen($chars);
	$string = '';
	for ($i = 0; $i < $length; $i++) {
		$string .= substr($chars, rand(1, $numChars) - 1, 1);
	}
	return $string;
}

// Текущее время с часовым поясом
function getTime() {
	global $set;
	return time()+$set->time*3600;
}

// Отправка письма
function sendMail($mail, $name, $date, $rap) {
	global $sendmail, $set, $site;
	$sendmail->addAddress($set->mail_address, $name);
	$sendmail->Subject = 'новая заявка';
	
	$sendmail->Body = '
	<table align="center" cellpadding="0" cellspacing="0" style="border: 1px solid #d4d4d5; border-radius: 3px; font-family: arial;">
		<tr>
			<td style="background-color: #f3f4f5; border-top-left-radius: 5px; border-top-right-radius: 3px; color: #626363; border-bottom: 1px solid #d4d4d5; padding: 15px; font-size: 16px; font-weight: bold;">'.$set->name.': новая заявка</td>
		</tr>
		<tr>
			<td style="background-color: #fcfcfc; color: #505050; padding: 20px 15px 15px 15px; font-size: 14px; line-height: 20px;">
				На сайте «<a style="color: #4183c4; cursor: pointer; text-decoration: none;" href="'.$site['address'].'">'.$set->name.'</a>» новая заявка от <span style="text-decoration: underline;">'.$name.'</span>.<br>
				Свяжитесь по: <a style="color: #4183c4; cursor: pointer; text-decoration: none;" href="mailto:'.$rap.'">'.$rap.'</a>.<br>
				Отправлено: <span style="text-decoration: underline;">'.date("d.m.Y в H:i", $date).'</span>.
			</td>
		</tr>
		<tr>
			<td style="background-color: #fcfcfc; color: #505050; padding: 10px 15px 15px 15px; font-size: 12px; text-align: center;">Войдите в <a style="color: #4183c4; cursor: pointer; text-decoration: none;" href="'.$site['address'].'/'.$set->admin.'">раздел администратора</a> чтобы управлять заявками или отключить данные уведомления.</td>
		</tr>
	</table>';
	
	$sendmail->AltBody = 'Новая заявка от'.$name.'. Свяжитесь по:'.$rap.'. Отправлено:'.date("d.m.Y в H:i", $date).'.';
	return $sendmail->send();
}

// Дерево массива
function wtf($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}