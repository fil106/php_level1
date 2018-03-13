<? if (!$_SESSION['user']): ?>
<form method="post" action="?">
<label for="login">Логин: </label><input type="text" name="login" id="login"/><br>
<label for="password">Пароль: </label><input type="password" name="password" id="password" /> <br>
<label for="rememberme">Запомнить: </label><input type="checkbox" name="rememberme" id="rememberme" />
<input type="submit" name="SubmitLogin" value="Войти" /> <a href="/register/">Зарегистрироваться</a>
</form>

<? else: ?>

<form action="/" method="post">
<p>Вы авторизованы: <?= $_SESSION['user_name'] ?> <br>
Ваш логин: <?= $_SESSION['user'] ?></p>
<p><input type="submit" value="Выйти" name="exit"/></p>
</form>
<? endif; ?>	