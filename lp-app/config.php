<?php
$set = R::findOne('settings');
$txt = R::findAll('texts');

$site['address'] = 'http://'.$_SERVER["SERVER_NAME"];
$site['img'] = $site['address'].'/lp-site/img';

if ($set->mail_on) {
	require 'lp-libs/phpmailer/PHPMailerAutoload.php';
	$sendmail = new PHPMailer;
	$sendmail->isSMTP();
	$sendmail->Host = $set->mail_host;
	$sendmail->SMTPAuth = true;
	$sendmail->Username = $set->mail_login;
	$sendmail->Password = $set->mail_pass;
	$sendmail->SMTPSecure = $set->mail_smtp;
	$sendmail->Port = $set->mail_port;
	$sendmail->isHTML(true);
	$sendmail->setFrom($set->mail_address, $set->mail_name);
	$sendmail->CharSet = 'UTF-8';
}