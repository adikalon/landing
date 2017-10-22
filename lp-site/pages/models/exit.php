<?php
if (isset($_COOKIE['auth'])) setcookie('auth', '');
$find_user = R::findOne("users", "login = '".$_SESSION['user']."'");
$find_user->remember = NULL;
R::store($find_user);
unset($_SESSION['user']);   
session_destroy(); 
header('Location: /');
exit;