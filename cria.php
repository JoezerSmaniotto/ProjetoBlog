<!DOCTYPE html>
<html>
	<head>
	<title></title>
	
	</head>

	<meta charset="utf-8">
	<style type="text/css">
		
		body{
		    width: 100%;
		    height: 100%;
		    margin: 0;
		    padding: 0;
		    background: url("icones/img_cria1.jpg") no-repeat;
		    background-size: cover;
		    /*background-image: url("img_login1.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
			background-size: cover;*/
			text-align: center;
		}

		button a {

			text-decoration:none; 
			color: black;
			/*background-color: red;*/
		}

		form{
			margin-bottom: 30px;
			opacity: 0.9;

		}

		h3{
			color: white;	

		}

	</style>
	
	<body>

		<h3>CRIAR</h3>

		<form action="upload.php" method="post" enctype="multipart/form-data">
			<br><input type="text" name="titulo" placeholder="Digite o título:" size="40" required>
			<br>
			<br><textarea name="resumo" cols=80 rows=4 required placeholder="Digite o Resumo..."></textarea>
			<br>
			<br><textarea name="conteudo" cols=80 rows=25 required placeholder="Digite o Conteúdo..."></textarea>
			<br>
			Posição Imagem
			Direita<input type="radio" name="pos_img" required value="right">	
			Esquerda<input type="radio" name="pos_img" required value="left">
			<br>
			Data de Postagem: <br>
			<input type="text" name="dia" size="2" required maxlength="2" placeholder="30">
			<input type="text" name="mes" size="2" required maxlength="2" placeholder="12">
			<input type="text" name="ano" size="4" required maxlength="4" placeholder="1999">
			<br><br>
			Imagem Para Upload:
			<input type="file" name="userfile" required>
			
			<input type="submit" value="Enviar" name="enviar">	
			<button><a href="crud.php">Voltar</a></button>
			
		</form>

	</body>
</html>




