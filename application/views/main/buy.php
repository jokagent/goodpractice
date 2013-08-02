<?php
	echo('<div class="buy">');
	foreach ($buy as $key => $value) {?>
			<div class='buy_entry' id="entry_<?=$value['id']?>"><a href="<?=$URL.$value['id']?>"><span><?=$value['title']?></span></a><div class='buy_entry_content'><?=$value['text']?></div>
			<div>
			<!-- <form action='https://merchant.intellectmoney.ru/ru/' name='pay' method='POST'>
				<input type="hidden" name="eshopId" value="451343">
				<input type="hidden" name="orderId" value="<?=$value['id']?>"> 
				<input type="hidden" name="serviceName" value="<?=$value['serviceName']?>"> 
				<input type="hidden" name="recipientAmount" value="<?=$value['price']?>"> 
				<input type="hidden" name="recipientCurrency" value="TST"> 
				<input type="hidden" name="successUrl" value="http://miloslavskiy.com/main/success"> 
				<input type="hidden" name="failUrl" value="http://miloslavskiy.com/main/fail">
				<input type="submit" name="button" value="КУПИТЬ"  class="buy_button">
 -->
				<form method="POST" action="https://Merchant.IntellectMoney.ru/" name='pay'>
					<input type="hidden" name="LMI_PAYEE_PURSE" value="451343">
					<input type="hidden" name="LMI_PAYMENT_AMOUNT" value="<?=$value['price']?>">
					<input type="hidden" name="LMI_PAYMENT_DESC" value="<?=$value['serviceName']?>">
					<input type="hidden" name="LMI_PAYMENT_NO" value="<?=$value['id']?>">
					<input type="hidden" name="EMAIL" value="greezzly7@gmail.com">
					<input type="hidden" name="NAME" value="NAME!!">
					<input type="submit" name="button" value="КУПИТЬ"  class="buy_button">
				</form>
	<!-- </form>  -->
	</div>
	</div>
	<?}
	echo('</div>');
?>

