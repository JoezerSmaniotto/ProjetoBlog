<?php
session_start();
if(isset($_REQUEST['login'])){
//login
	if($_REQUEST['login'] == 'logar') {

		@$senha = $_REQUEST['pass'];
		@$usuario = $_REQUEST['user'];

		if (($usuario == "admin") && ($senha == '1234') ){
			//cria campo usuario na sessao
			$_SESSION['usuario'] = $usuario;

			//redireciona para o index
			header("Location:../index.php");

		}
		else {
			echo("Usuário ou senha inválido(s)");
			include("loginform.php");
		}
	}

}

?>