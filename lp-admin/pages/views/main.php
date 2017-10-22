<h4 class="ui horizontal divider header"><i class="sitemap icon"></i>Управление заявками</h4>
<?php if ($count_req < 1): ?>
<div class="ui center aligned icon header">
	<i class="file outline icon"></i>
	<div class="content">
		<h2 class="feedback-caption">Заявок нет</h2>
	</div>
</div>
<?php else: ?>
<!-- start modal del all -->
<div class="ui small modal" id="answerda">
	<div class="header">Удаление заявок</div>
	<div class="content">
		<div class="ui center aligned icon header feedback-size">
			<i class="trash icon"></i>
			<div class="content">
				<h2 class="feedback-caption">Удалить все заявки?</h2>
				<div class="sub header feedback-description">
					Вы собираетесь удалить все имеющиеся заявки, восстановить которые будет невозможно. Продолжить?
				</div>
			</div>
		</div>
	</div>
	<div class="actions">
		<div class="ui black deny button">Отмена</div>
		<form action="" method="post" class="answer-form">
			<button class="ui negative right labeled icon button" type="submit" name="answerda">Удалить<i class="checkmark icon"></i></button>
		</form>
	</div>
</div>
<!-- finish modal del all -->







<table class="ui celled table" id="req_table">
	<thead>
		<tr>
			<th>Дата</th>
			<th>Имя / Связь</th>
			<th>Заметка <i class="help circle outline icon link" data-content="Вы можете оставить заметку к заявке с необходимой информацией. Просто наберите текст в поле для ввода и он сохранится автоматически." data-variation="wide"></i></th>
			<th>Удалить</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($find_requests as $req): ?>
		<tr <?php if ($req->status == 1) echo 'class="positive"'; ?>>
			<td class="table-td">
				<i class="wait icon"></i> <?php echo date('H:i', $req->date); ?>
				<br>
				<i class="calendar icon"></i> <?php echo date('d.m', $req->date); ?>
			</td>
			<td class="table-td">
				<i class="user icon"></i> <?php echo $req->name; ?>
				<br>
				<i class="mail icon"></i> <?php echo $req->rapport; ?>
			</td>
			<td>
				<div class="ui form">
					<div class="field">
						<textarea rows="1" onkeyup="saveComment('<?php echo $req->id; ?>', $(this).val())" onfocus="$(this).attr('rows', '3')" onblur="$(this).attr('rows', '1')" id="<?php echo 'text_'.$req->id; ?>"><?php echo htmlspecialchars($req->comment); ?></textarea>
					</div>
				</div>
			</td>
			<td class="table-button">
				<button class="ui negative icon button" onclick="$('#answerd_<?php echo $req->id; ?>').modal('show')"><i class="remove icon"></i></button>
				<div class="ui small modal" id="answerd_<?php echo $req->id; ?>">
					<div class="header">Удаление заявки</div>
					<div class="content">
						<div class="ui center aligned icon header feedback-size">
							<i class="remove icon"></i>
							<div class="content">
								<h2 class="feedback-caption">Удалить заявку от <?php echo $req->name; ?>?</h2>
								<div class="sub header feedback-description">
									Вы собираетесь удалить заявку от <span class="answer-login"><?php echo $req->name; ?></span>, восстановить ее будет невозможно. Продолжить?
								</div>
							</div>
						</div>
					</div>
					<div class="actions">
						<div class="ui black deny button">Отмена</div>
						<form action="" method="post" class="answer-form">
							<button class="ui negative right labeled icon button" type="submit" name="answerdo" value="<?php echo $req->id; ?>">Удалить<i class="checkmark icon"></i></button>
						</form>
					</div>
				</div>
			</td>
		</tr>
<?php endforeach; ?>
		<tr class="req-total">
			<td colspan="3">
				<span class="req-total-txt"><i class="users icon"></i>  Всего <?php echo $count_req; ?> заявок</span>
			</td>
			<td class="table-button">
				<button class="ui negative icon button" onclick="$('#answerda').modal('show')"><i class="trash icon"></i></button>
			</td>
		</tr>
	</tbody>
<!-- start pagination -->
<?php if ($count_pages > 1): ?>
	<tfoot>
		<tr>
			<th colspan="4">
				<div class="ui right floated pagination menu">
<?php if ($pagi != 1): ?>
					<a class="icon item" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/?page=<?php echo $pagi-1; ?>"><i class="left chevron icon"></i></a>
<?php endif; ?>
<?php if ($pagi != 1 && $pagi != 2): ?>
					<a class="item first-last" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/?page=1">1</a>
<?php if ($pagi != 3): ?>
					<a class="item disabled">...</a>
<?php endif; ?>
<?php endif; ?>
<?php if ($pagi != 1): ?>
					<a class="item prev-next" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/?page=<?php echo $pagi-1; ?>"><?php echo $pagi-1; ?></a>
<?php endif; ?>
					<span class="item active pagi-active"><?php echo $pagi; ?></span>
<?php if ($pagi != $count_pages): ?>
					<a class="item prev-next" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/?page=<?php echo $pagi+1; ?>"><?php echo $pagi+1; ?></a>
<?php endif; ?>
<?php if ($pagi != $count_pages && $pagi != $count_pages-1): ?>
<?php if ($pagi != $count_pages - 2): ?>
					<a class="item disabled">...</a>
<?php endif; ?>
					<a class="item first-last" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/?page=<?php echo $count_pages; ?>"><?php echo $count_pages; ?></a>
<?php endif; ?>
<?php if ($pagi != $count_pages): ?>
					<a class="icon item" href="<?php echo $site['address']; ?>/<?php echo $set->admin; ?>/?page=<?php echo $pagi+1; ?>"><i class="right chevron icon"></i></a>
<?php endif; ?>
				</div>
			</th>
		</tr>
	</tfoot>
<?php endif; ?>
<!-- finish pagination -->
</table>
<?php endif; ?>