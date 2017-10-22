<?php
/* start change status */
$find_old = R::findAll("requests", "WHERE status = 1");
if ($find_old !== NULL) {
	foreach ($find_old as $old) {
		$old->status = 0;
		R::store($old);
	}
}
$find_neo = R::findAll("requests", "WHERE status = 2");
if ($find_neo !== NULL) {
	foreach ($find_neo as $neo) {
		$neo->status = 1;
		R::store($neo);
	}
}
/* finish change status */




/* start answer trash all */
if (isset($_POST['answerda'])) {
	R::wipe('requests');
}
/* finish answer trash all */

/* start answer trash one */
if (isset($_POST['answerdo'])) {
	$delid = $_POST['answerdo'];
	$find_req = R::load('requests', $delid);
	if ($find_req !== NULL) {
		R::trash($find_req);
	}
}
/* finish answer trash one */


/* start pagination and quantity */
$find_all_req = R::findAll('requests');
$count_req = count($find_all_req);

$count_pages = ceil($count_req / $set->pagi);
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
	$pagi = $_GET['page'];
} else {
	$pagi = 1;
}
if ($pagi > $count_pages && $count_pages > 0) {
	$router['page'] = '404';
} else {
	$pag = ($pagi - 1) * $set->pagi;
	$count_entry = $set->pagi;
	$find_requests = R::findAll("requests", "ORDER BY date DESC LIMIT $pag,$count_entry");
}
/* finish pagination and quantity */