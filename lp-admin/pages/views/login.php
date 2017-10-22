<div class="auth-form">
	<div class="ui top attached header secondary segment">
		Авторизация
	</div>
	<div class="ui attached segment">
<?php if (isset($info)): ?>
		<div class="ui error message">
			<p><?php echo $info; ?></p>
		</div>
<?php endif; ?>
		<form action="" method="post" class="ui form">
			<div class="field">
				<input type="text" name="auth_login" placeholder="Логин" value="<?php if (isset($login)) echo htmlspecialchars($login); ?>">
			</div>
			<div class="field">
				<input type="password" name="auth_pass" placeholder="Пароль" value="<?php if (isset($pass)) echo htmlspecialchars($pass); ?>">
			</div>
			<div class="field auth-enter">
				<div class="ui checkbox">
					<input type="checkbox" tabindex="0" class="hidden" name="auth_remember">
					<label>Чужой компьютер</label>
				</div>
				<button class="positive ui button auth-button" type="submit">Войти</button>
			</div>
		</form>
	</div>
</div>