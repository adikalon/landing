<h4 class="ui horizontal divider header"><i class="settings icon"></i>Настройки</h4>
<div class="ui top attached header secondary segment" id="ctrl">
	Настройки управления
</div>
<div class="ui attached segment block-background">
	<form action="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/<?php echo $router['page']; ?>#ctrl" method="post" class="ui form">
		<div class="fields">
			<div class="five wide field <?php if (isset($error['name'])) echo 'error'; ?>">
				<label>Название сайта <i class="help circle outline icon link" data-content="Отображается как название главной страницы. Влияет на результаты поисковой выдачи." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="home icon"></i>
					<input type="text" name="name" placeholder="Название сайта" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); else echo htmlspecialchars($set->name); ?>">
				</div>
				<?php if (isset($error['name'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['name']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="indentation four wide field <?php if (isset($error['login'])) echo 'error'; ?>">
				<label>Логин админа <i class="help circle outline icon link" data-content="Логин для входа в раздел управления сайтом." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="user icon"></i>
					<input type="text" name="login" placeholder="Логин" value="<?php if (isset($_POST['login'])) echo htmlspecialchars($_POST['login']); else echo htmlspecialchars($user->login); ?>">
				</div>
				<?php if (isset($error['login'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['login']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="indentation seven wide field <?php if (isset($error['admin'])) echo 'error'; ?>">
				<label>Адресс админки <i class="help circle outline icon link" data-content="Адресс по которому можно получить доступ к управлению сайтом." data-variation="wide"></i></label>
				<div class="ui labeled input">
					<div class="ui label">
						<?php echo $site['address']; ?>/
					</div>
					<input type="text" name="admin" placeholder="Адресс" value="<?php if (isset($_POST['admin'])) echo htmlspecialchars($_POST['admin']); else echo htmlspecialchars($set->admin); ?>">
				</div>
				<?php if (isset($error['admin'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['admin']; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="indentation field <?php if (isset($error['description'])) echo 'error'; ?>">
			<label>Description <span class="ui mini label" id="desc_symbols_a"><span id="desc_symbols"></span> символов</span> <i class="help circle outline icon link" data-content="Мета-описание главной страницы сайта. Влияет на результаты поисковой выдачи и иногда отображается в результатах поиска. Рекомендуемая длина не должна превышать 150-250 символов." data-variation="wide"></i></label>
			<div class="ui left icon input">
				<i class="tag icon"></i>
				<textarea class="textarea-padding" name="description" rows="1" id="description"><?php if (isset($_POST['description'])) echo htmlspecialchars($_POST['description']); else echo htmlspecialchars($set->description); ?></textarea>
			</div>
			<?php if (isset($error['description'])): ?>
			<div class="ui pointing red basic label">
				<?php echo $error['description']; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="field <?php if (isset($error['keywords'])) echo 'error'; ?>">
			<label>Keywords <span class="ui mini label" id="key_symbols_a"><span id="key_symbols"></span> символов</span> <i class="help circle outline icon link" data-content="Ключевые слова главной страницы. Необходимо указывать каждое слово через запятую. Рекомендуемая, общая длина не должна превышать 160-200 символов." data-variation="wide"></i></label>
			<div class="ui left icon input">
				<i class="tags icon"></i>
				<textarea class="textarea-padding" name="keywords" rows="1" id="keywords"><?php if (isset($_POST['keywords'])) echo htmlspecialchars($_POST['keywords']); else echo htmlspecialchars($set->keywords); ?></textarea>
			</div>
			<?php if (isset($error['keywords'])): ?>
			<div class="ui pointing red basic label">
				<?php echo $error['keywords']; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="field <?php if (isset($error['rapport'])) echo 'error'; ?>">
			<label>Регулярка для средства связи <i class="help circle outline icon link" data-content="Отправленные вам контакты для связи, должны быть проверены на предмет корректного ввода. Осуществляется это посредством регулярного выражения. Если вы не знакомы с этим языком, рекомендуется не трогать данную опцию." data-variation="wide"></i></label>
			<div class="ui left icon input">
				<i class="slack icon"></i>
				<textarea class="textarea-padding" name="rapport" rows="1"><?php if (isset($_POST['rapport'])) echo htmlspecialchars($_POST['rapport']); else echo htmlspecialchars($set->rapport); ?></textarea>
			</div>
			<?php if (isset($error['rapport'])): ?>
			<div class="ui pointing red basic label">
				<?php echo $error['rapport']; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="fields">
			<div class="three wide field <?php if (isset($error['pagi'])) echo 'error'; ?>">
				<label>Пагинация <i class="help circle outline icon link" data-content="Сколько заявок отображать на одной странице в разделе «Заявки»." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="list layout icon"></i>
					<input type="number" name="pagi" placeholder="10" value="<?php if (isset($_POST['pagi'])) echo htmlspecialchars($_POST['pagi']); else echo htmlspecialchars($set->pagi); ?>">
				</div>
				<?php if (isset($error['pagi'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['pagi']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="indentation three wide field <?php if (isset($error['time'])) echo 'error'; ?>">
				<label>Часовой пояс <i class="help circle outline icon link" data-content="Внутреннее время сервера, на котором расположен Ваш сайт может отличаться от желаемого. В таком случае можно указать +-час (например: 1 или -1. Оставить как есть: 0). Можно указывать числа с плавающей запятой, разделитель - точка (например: -1.5)." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="wait icon"></i>
					<input type="text" name="time" placeholder="0" value="<?php if (isset($_POST['time'])) echo htmlspecialchars($_POST['time']); else echo htmlspecialchars($set->time); ?>">
				</div>
				<?php if (isset($error['time'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['time']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="seven wide field checkbox-ctrl">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="panel" tabindex="0" class="hidden" <?php if ($set->panel) echo 'checked'; ?>>
					<label>Панель на главной странице <i class="help circle outline icon link" data-content="Если вы авторизировались как администратор, тогда на главной странице сайта будет доступна панель управления. Включите или отключите ее." data-variation="wide"></i></label>
				</div>
			</div>
			<div class="three wide field">
			<label>&nbsp;</label>
				<button type="submit" name="control_block" class="ui blue labeled icon button right floated">Применить<i class="checkmark icon"></i></button>
			</div>
		</div>
	</form>
</div>
<div class="ui top attached header secondary segment block-padding" id="repass">
	Смена пароля
</div>
<div class="ui attached segment block-background">
<?php if (isset($_POST['ok_pass'])): ?>
	<div class="ui success message">
		<p>Пароль успешно изменен</p>
	</div>
<?php endif; ?>
	<form action="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/<?php echo $router['page']; ?>#repass" method="post" class="ui form">
		<div class="three fields">
			<div class="field <?php if (isset($error['newpass'])) echo 'error'; ?>">
				<label>Новый пароль <i class="help circle outline icon link" data-content="Придумайте сложный пароль." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="unhide icon"></i>
					<input type="password" name="newpass" placeholder="Новый пароль" value="<?php if (isset($_POST['newpass'])) echo htmlspecialchars($_POST['newpass']); ?>">
				</div>
			</div>
			<div class="field <?php if (isset($error['newpass'])) echo 'error'; ?>">
				<label>Новый пароль еще раз <i class="help circle outline icon link" data-content="Во избежании опечатки повторите новый пароль еще раз." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="low vision icon"></i>
					<input type="password" name="renewpass" placeholder="Еще раз" value="<?php if (isset($_POST['renewpass'])) echo htmlspecialchars($_POST['renewpass']); ?>">
				</div>
				<?php if (isset($error['newpass'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['newpass']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="field <?php if (isset($error['oldpass'])) echo 'error'; ?>">
				<label>Текущий пароль <i class="help circle outline icon link" data-content="Введите текущий пароль для подтверждения изменений." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="unlock alternate icon"></i>
					<input type="password" name="oldpass" placeholder="Текущий пароль" value="<?php if (isset($_POST['oldpass'])) echo htmlspecialchars($_POST['oldpass']); ?>">
				</div>
				<?php if (isset($error['oldpass'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['oldpass']; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="fields">
			<div class="sixteen wide field">
			<label>&nbsp;</label>
				<button type="submit" class="ui blue labeled icon button right floated">Изменить<i class="undo icon"></i></button>
			</div>
		</div>
	</form>
</div>
<div class="ui top attached header secondary segment block-padding" id="subs">
	Оповещения по E-mail
</div>
<div class="ui attached segment block-background">
	<div class="ui message">
		<p>Вы можете включить отправку уведомлений о новых заявках на ваш E-Mail, для этого необходимо указать IMAP параметры почтового сервиса, который вы желаете использовать.</p>
	</div>
	<form action="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/<?php echo $router['page']; ?>#subs" method="post" class="ui form">
		<div class="fields">
			<div class="ten wide field checkbox-mail">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="mail_on" tabindex="0" <?php if ($set->mail_on) echo 'checked'; ?>>
					<label>Включить уведомления <i class="help circle outline icon link" data-content="Включите или отключите оповещения на ваш E-Mail." data-variation="wide"></i></label>
				</div>
			</div>
			<div class="indentation six wide field <?php if (isset($error['pagi'])) echo 'error'; ?>">
				<label>Ваш E-Mail <i class="help circle outline icon link" data-content="Полный адрес почтового ящика, на который будут приходить оповещения." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="mail icon"></i>
					<input type="email" name="mail_address" placeholder="E-Mail" value="<?php if (isset($_POST['mail_address'])) echo htmlspecialchars($_POST['mail_address']); else echo htmlspecialchars($set->mail_address); ?>">
				</div>
				<?php if (isset($error['mail_address'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['mail_address']; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="indentation three fields">
			<div class="field <?php if (isset($error['name'])) echo 'error'; ?>">
				<label>Логин E-Mail <i class="help circle outline icon link" data-content="Логин Вашего почтового ящика." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="user icon"></i>
					<input type="text" name="mail_login" placeholder="Логин" value="<?php if (isset($_POST['mail_login'])) echo htmlspecialchars($_POST['mail_login']); else echo htmlspecialchars($set->mail_login); ?>">
				</div>
				<?php if (isset($error['mail_login'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['mail_login']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="field <?php if (isset($error['login'])) echo 'error'; ?>">
				<label>Пароль E-Mail <i class="help circle outline icon link" data-content="Пароль Вашего почтового ящика." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="unlock alternate icon"></i>
					<input type="password" name="mail_pass" placeholder="Пароль" value="<?php if (isset($_POST['mail_pass'])) echo htmlspecialchars($_POST['mail_pass']); else echo htmlspecialchars($set->mail_pass); ?>">
				</div>
				<?php if (isset($error['mail_pass'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['mail_pass']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="field <?php if (isset($error['login'])) echo 'error'; ?>">
				<label>Адрес сервера <i class="help circle outline icon link" data-content="Адрес сервера." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="world icon"></i>
					<input type="text" name="mail_host" placeholder="Адрес сервера" value="<?php if (isset($_POST['mail_host'])) echo htmlspecialchars($_POST['mail_host']); else echo htmlspecialchars($set->mail_host); ?>">
				</div>
				<?php if (isset($error['mail_host'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['mail_host']; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="fields">
			<div class="three wide field <?php if (isset($error['pagi'])) echo 'error'; ?>">
				<label>Порт <i class="help circle outline icon link" data-content="Порт." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="sitemap icon"></i>
					<input type="number" name="mail_port" placeholder="Порт" value="<?php if (isset($_POST['mail_port'])) echo htmlspecialchars($_POST['mail_port']); else echo htmlspecialchars($set->mail_port); ?>">
				</div>
				<?php if (isset($error['mail_port'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['mail_port']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="indentation three wide field <?php if (isset($error['time'])) echo 'error'; ?>">
				<label>Соединение <i class="help circle outline icon link" data-content="Тип соединения." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="plug icon"></i>
					<input type="text" name="mail_smtp" placeholder="Соединение" value="<?php if (isset($_POST['mail_smtp'])) echo htmlspecialchars($_POST['mail_smtp']); else echo htmlspecialchars($set->mail_smtp); ?>">
				</div>
				<?php if (isset($error['mail_smtp'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['mail_smtp']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="indentation five wide field <?php if (isset($error['login'])) echo 'error'; ?>">
				<label>От кого <i class="help circle outline icon link" data-content="Этот текст будет отображаться в списке входящих писем." data-variation="wide"></i></label>
				<div class="ui left icon input">
					<i class="write icon"></i>
					<input type="text" name="mail_name" placeholder="Имя" value="<?php if (isset($_POST['mail_name'])) echo htmlspecialchars($_POST['mail_name']); else echo htmlspecialchars($set->mail_name); ?>">
				</div>
				<?php if (isset($error['mail_name'])): ?>
				<div class="ui pointing red basic label">
					<?php echo $error['mail_name']; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="five wide field">
			<label>&nbsp;</label>
				<button type="submit" name="mail_block" class="ui blue labeled icon button right floated">Применить<i class="checkmark icon"></i></button>
			</div>
		</div>
	</form>
</div>