<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $pages[$router['section']][$router['page']]['description']; ?>">
	<meta name="keywords" content="<?php echo $pages[$router['section']][$router['page']]['keywords']; ?>">
	<title><?php echo $pages[$router['section']][$router['page']]['title']; ?></title>
	<link rel="shortcut icon" href="<?php echo $site['address']; ?>/favicon.ico" type="image/x-icon">
	<link rel="canonical" href="<?php echo $pages[$router['section']][$router['page']]['canonical']; ?>">
	<link rel="stylesheet" href="<?php echo $site['address']; ?>/lp-site/styles.css">
	<link rel="stylesheet" href="<?php echo $site['address']; ?>/lp-libs/fontawesome/css/font-awesome.min.css">
</head>
<body>
<?php if (userStatus() && $set->panel): ?>
	<div class="lp-panel">
		<ul class="lp-panel-left">
			<li class="lp-panel-li">
				<a href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>">
					<i class="fa fa-user-plus lp-panel-icon"></i>
					<span class="lp-panel-hide"> Заявки</span>
					<?php if (isset($count_new_req) && $count_new_req > 0): ?>
					<span class="lp-panel-neo"><?php echo $count_new_req; ?></span>
					<?php endif; ?>
				</a>
			</li>
			<li class="lp-panel-li">
				<a href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/texts"><i class="fa fa-pencil lp-panel-icon"></i><span class="lp-panel-hide"> Править тексты</span></a>
			</li>
		</ul>
		<ul class="lp-panel-right">
			<li class="lp-panel-li">
				<a href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/settings"><i class="fa fa-wrench lp-panel-icon"></i><span class="lp-panel-hide"> Настройки</span></a>
			</li>
			<li class="lp-panel-li">
				<a href="<?php echo $site['address']; ?>/exit"><i class="fa fa-sign-out lp-panel-icon"></i><span class="lp-panel-hide"> Выйти</span></a>
			</li>
		</ul>
	</div>
<?php endif; ?>
	<?php include ($router['section'].'/pages/views/'.$router['page'].'.php'); ?>

</body>
</html>