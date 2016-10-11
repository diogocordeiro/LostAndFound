<? echo $_SERVER['REMOTE_ADDR']; ?>
<html>
	<form method="POST" action="login.php">
		<input type="text" name="email" placeholder="e-mail..."/><br/>
		<input type="text" name="senha" placeholder="senha..."/><br/>
		<input type="submit" value="entrar">
	</form>
</html>