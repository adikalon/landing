<?php
if (isset($_POST['texts'])) {
	foreach ($_POST['texts'] as $i => $t) {
		$txt[$i]->text = $t;
		R::store($txt[$i]);
	}
}