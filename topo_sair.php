<!--topo.php-->
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link rel="shortcut icon " type="text/css" href="icones/icon_nav.png">
		<meta charset="utf-8">
		<title>Home</title>
	</head>
	<body>

		<header>
			<div class="icone-menu">
				<img src="icones/log.png" class="logo-marca">
			</div>

			<form method="post" action="index.php">
				<div class="pesquisa">			
					<input type="text" name="busca" placeholder="Buscar noticias aqui..." class="caixa-pesq">
				</div>	
				<button id="botao-search" type="submit" name="botao-pesquisa" value="pesquisar">
					<img src="icones/search.png">
				</button>
			</form>
				
			<nav>
				<ul class="menu_ul">
					<li><a href="index.php">Home</a></li>
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="contato.php">Contato</a></li>
					<li><a href="crud.php" style="padding: 10px 20px; background-color: #E83F33;">Crud</a></li>
					<li><a href="exit.php"style="padding: 10px 20px; background-color: #E83F33;">Sair</a></li>
				</ul>
			</nav>
		</header>
		<div class="banner">
			
		</div>