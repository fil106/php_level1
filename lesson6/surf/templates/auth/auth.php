<div class="content_blk">

	<?php if ( $isAuth ): ?>

		<h2>Добро Пожаловать, <b><?= $_SESSION['login'] ?></b></h2>
		<a class="btn btn-danger" href="?logout">Выйти</a>

	<?php else: ?>

		<h3>Страница авторизации пользователя</h3>

		<div style="color: red"><?= array_shift($ERRORS) ?></div>

		<form id="auth_form" action="/" method="POST">

			<label for="auth_login">Ваш логин</label>
			<input id="auth_login" name="auth_login" type="text" value="<?= $_POST['auth_login'] ?>">
			<label for="auth_pass">Ваш пароль</label>
			<input id="auth_pass" name="auth_pass" type="password">
			<input id="auth_remember" name="auth_remember" type="checkbox" value="true"><span> - запомнить меня</span>

			<p class="error"></p>

			<input name="auth" type="submit" value="Войти">

		</form>

	<?php endif; ?>

</div>