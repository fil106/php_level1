<div class="register_blk">

	<h3>Регистрация нового пользователя</h3>

	<form id="register_form" action="/register-access/" method="POST">

		<label for="register_login">Введите Ваш логин *</label>
		<input id="register_login" name="register_login" type="text" required>
		<label for="register_pass">Введите Ваш пароль *</label>
		<input id="register_pass" name="register_pass" type="password" required>
		<label for="register_pass_2">Введите Ваш пароль еще раз *</label>
		<input id="register_pass_2" name="register_pass_2" type="password" required>

		<p class="error"></p>

		<input type="submit" name="reg" value="Отправить">

	</form>

	<p>Поля помеченные "*" являются обязательными!</p>

</div>