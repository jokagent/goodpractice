<?php
class AdminPanel extends Controller {
	function index() {
		echo ('<div class="add_form">
	Добавить пост!
	<form action=".php" id="add_blog">
		<div>Введите название статьи</div>
		<div><input type="text" name="add_blog_title"></div>
		<div>Введите описание статьи(не больше 255 симв.)</div>
		<div><textarea rows="5" cols="45" name="add_blog_description"></textarea></div>
		<div>Введите текст статьи</div>
		<div><textarea rows="10" cols="45" name="add_blog_text"></textarea></div>
		<div><input type="submit" value="Сохранить"></div>

	</form>
</div>
<div class="add_form">
	Добавить продукт!
	<form action=".php" id="add_product">
		<div>Введите название статьи</div>
		<div><input type="text" name="add_product_title"></div>
		<div>Введите текст статьи</div>
		<div><textarea rows="10" cols="45" name="add_product_text"></textarea></div>
		<div><input type="submit" value="Сохранить"></div>

	</form>
</div>
');
	}

}
?>
