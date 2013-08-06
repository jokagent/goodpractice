<?php
	echo('<div class="buy">');
	foreach ($buy as $key => $value) {?>
			<div class='buy_entry' id="entry_<?=$value['id']?>"><a href="<?=$URL.$value['id']?>"><span><?=$value['title']?></span></a><div class='buy_entry_content'><?=$value['text']?></div>
			<div>
			<form action='https://merchant.intellectmoney.ru/ru/' name='pay' method='POST'>
				<input type="hidden" name="eshopId" value="451343">
				<input type="hidden" name="orderId" value="<?=$value['id']?>"> 
				<input type="hidden" name="serviceName" value="<?=$value['serviceName']?>"> 
				<input type="hidden" name="recipientAmount" value="<?=$value['price']?>"> 
				<input type="hidden" name="recipientCurrency" value="TST"> 
				<input type="hidden" name="successUrl" value="http://miloslavskiy.com/main/success"> 
				<input type="hidden" name="failUrl" value="http://miloslavskiy.com/main/fail">
			    <input type="hidden" name="expireDate" value="2013-11-30 22:55:00"> 
			    <input type="hidden" name="userName" value="<?=$username?>">
			    <input type="hidden" name="user_email" value="<?=$useremail?>">
				<input type="submit" name="button" value="КУПИТЬ"  class="buy_button">
			</form> 
	</div>
	</div>
	<?}
	echo('</div>');
?>

