<html>
<body>
	<h1>Добро пожаловать </h1>
    <p>Ваш email для авторизации на сайте:<?php echo $identity ?><p>
    <p>Ваш пароль для авторизации на сайте:<?php echo $password ?><p>
    <br>
    <p>Для активации аккаунта перейдите по ссылке:</p>
	<p><?php echo anchor('auth/activate/'. $id .'/'. $activation, "Активизация аккаунта");?></p>
</body>
</html>