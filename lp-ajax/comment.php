<?php
require($_SERVER['DOCUMENT_ROOT'].'/lp-app/database.php');

if (isset($_POST['id']) && isset($_POST['text'])) {
	$id = $_POST['id'];
	$text = $_POST['text'];
	$find_req = R::findOne("requests", "id = '".$id."'");
	if ($find_req !== NULL) {
		$find_req->comment = $text;
		R::store($find_req);
	}
}