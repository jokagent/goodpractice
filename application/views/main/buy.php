<?php
	echo('<div class="buy">');
	foreach ($buy as $key => $value) {
		print("<div class='buy_entry' id='entry_".$value['id']."'><a href='".$URL.$value['id']."''><span>".$value['title']."</span></a><div class='buy_entry_content'>".$value['text']."</div></div>");
	}
	echo('</div>');
?>

