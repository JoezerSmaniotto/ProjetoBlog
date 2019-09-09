<!DOCTYPE html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<div id="login-background">
			<div class="user-photo">
				<img src="../icones/man.png">
			</div>
			<div id="login-screen">
				<p class="login-tittle">Login</p>
				<form method="POST" action="login.php">
					<div class="campo-form">
						<p>username:</p>
						<input type="text" name="user" placeholder="username" maxlength="18">
					</div>
					<div class="campo-form">
						<p>password:</p>
						<input type="password" name="pass" placeholder="password" maxlength="14">
					</div>
					<div class="enviar-login">
						<input type="submit" name="login" value="logar">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
