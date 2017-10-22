<?php
if (isset($_POST['name']) && isset($_POST['rapport'])) {
	$name = $_POST['name'];
	$rapport = $_POST['rapport'];
	if (iconv_strlen($name) < 2) {
		$info['name'] = 'Имя не менее 2 символов';
	}
	if (!preg_match($set->rapport, $rapport)) {
		$info['rapport'] = 'E-mail введен некорректно';
	}
	if (!isset($info)) {
		$find_user = R::findOne("requests", "rapport = '".$rapport."'");
		if ($find_user !== NULL) {
			$info['error'] = 'Вы уже отправляли заявку';
		}
	}
	if (!isset($info)) {
		$curTime = getTime();
		$add_user = R::dispense('requests');
		$add_user->name = $name;
		$add_user->rapport = $rapport;
		$add_user->status = 2;
		$add_user->comment = NULL;
		$add_user->date = $curTime;
		R::store($add_user);
		
		if ($set->mail_on) {
			sendMail($set->mail_address, $name, $curTime, $rapport);
		}
		$success = 'Ваша заявка отправлена. Мы обязательно свяжемся с вами!';
		unset($name);
		unset($rapport);
	}
}