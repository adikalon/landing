<?php if (isset($info['name'])): ?>
<?php echo $info['name']; ?>
<?php endif; ?>
<?php if (isset($info['rapport'])): ?>
<?php echo $info['rapport']; ?>
<?php endif; ?>
<?php if (isset($info['error'])): ?>
<?php echo $info['error']; ?>
<?php endif; ?>
<form action="" method="post">
	<input type="text" name="name" placeholder="Имя" value="<?php if (isset($name)) echo $name; ?>">
	<input type="text" name="rapport" placeholder="E-mail" value="<?php if (isset($rapport)) echo $rapport; ?>">
	<button type="submit">Отправить</button>
</form>
<?php if (isset($success)): ?>
<?php echo $success; ?>
<?php endif; ?>

<?php echo $txt[1]->text; ?>