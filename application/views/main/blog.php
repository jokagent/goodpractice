<?php
	echo('<div class="records">');
	foreach ($records as $key => $value) {
		print("<div class='blog_entry' id='entry_".$value['id']."'><a href='".$URL.$value['id']."''><span>".$value['title']."</span></a><div class='blog_entry_content'>".$value['description']."</div></div>");
	}
	echo('</div>');
?>

