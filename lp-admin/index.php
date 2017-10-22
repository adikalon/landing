<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $pages[$router['section']][$router['page']]['title']; ?></title>
	<link rel="shortcut icon" href="<?php echo $site['address']; ?>/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo $site['address']; ?>/lp-libs/semanticui/semantic.min.css">
	<link rel="stylesheet" href="<?php echo $site['address']; ?>/lp-admin/styles.css">
</head>
<body>
	<div class="main-block">
<?php if (userStatus()): ?>
		<div class="ui labeled icon small menu">
			<a class="<?php if ($router['page'] == 'main') echo 'active '; ?>item" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>">
				<?php if ($count_new_req > 0): ?><div class="ui top right attached red circular tiny label label-neo"><?php echo $count_new_req; ?></div><?php endif; ?>
				<i class="add user icon"></i>
				<span class="menu-text">Заявки</span>
			</a>
			<a class="<?php if ($router['page'] == 'texts') echo 'active '; ?>item" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/texts"><i class="write icon"></i><span class="menu-text">Правки</span></a>
			<div class="right menu">
				<a class="<?php if ($router['page'] == 'settings') echo 'active '; ?>item" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/settings"><i class="setting icon"></i><span class="menu-text">Настройки</span></a>
				<a class="item" href="<?php echo $site['address']; ?>/exit"><i class="sign out icon"></i><span class="menu-text">Выход</span></a>
			</div>
		</div>
<?php endif; ?>
	<?php include ($router['section'].'/pages/views/'.$router['page'].'.php'); ?>
	</div>
	<script src="<?php echo $site['address']; ?>/lp-libs/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo $site['address']; ?>/lp-libs/semanticui/semantic.min.js"></script>
	<script src="<?php echo $site['address']; ?>/lp-admin/scripts.js"></script>
</body>
</html>