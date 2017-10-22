<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'landing';
require($_SERVER['DOCUMENT_ROOT'].'/lp-libs/redbeanphp/rb.php');
R::setup("mysql:host=$db_host;dbname=$db_name", $db_username, $db_pass);