<h4 class="ui horizontal divider header" id="ctrl"><i class="edit icon"></i>Правки</h4>
<div class="ui top attached header secondary segment">
	Редактор текстов сайта
</div>
<div class="ui attached segment block-background">
	<div class="ui message">
		<p>Вы можете изменить любой фрагмент текста на страницах Вашего сайта.</p>
	</div>
	<form action="" method="post" class="ui form">
		<?php foreach($txt as $t): ?>
		<div class="field">
			<label><?php echo $t->name; ?></label>
			<textarea name="texts[<?php echo $t->id; ?>]" rows="1" onfocus="$(this).attr('rows', '3')" onblur="$(this).attr('rows', '1')"><?php echo htmlspecialchars($t->text); ?></textarea>
		</div>
		<?php endforeach; ?>
		<div class="fields">
			<div class="sixteen wide field">
			<label>&nbsp;</label>
				<button type="submit" class="ui blue labeled icon button right floated">Сохранить<i class="checkmark icon"></i></button>
			</div>
		</div>
	</form>
</div>