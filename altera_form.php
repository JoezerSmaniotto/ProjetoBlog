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

		<h3>ALTERA - EDIÇÃO</h3>

		
		<form method="post" action="altera.php" enctype="multipart/form-data" >
			Cod:<input type="text" name="codigo" size="3" value="<?=$codigo?>" readonly="readonly"><br>
			<br>Título<br><input type="text" name="titulo"  size="40" value="<?php echo($titulo);?>">
			<br>
			<br>Resusmo<br><textarea name="resumo" cols=80 rows=4> <?php echo($resumo);?></textarea>
			<br>
			<br>Conteúdo<br><textarea name="conteudo" cols=80 rows=25> <?php echo($texto);?></textarea>
			<br>
			Posição Imagem:
			<?	
			//include("altera.php");
			//include("funcoes.php");
			if($posicao=='right'){

					echo"<br>Direita";  //<input type="radio" name="pos_img" value="right" checked="checked" >	
					abreTag("input",array("type"=>"radio",
									  "name"=>"pos_img",
									  "value"=>"right", 
									  "checked"=>"checked"));

					echo"Esquerda";//<input type="radio" name="pos_img" value="left">
					abreTag("input",array("type"=>"radio",
									  "name"=>"pos_img",
									  "value"=>"left"));

					echo "<br>";

			}else if($posicao=='left'){
					echo"<br>Direita";  //<input type="radio" name="pos_img" value="right">	
					abreTag("input",array("type"=>"radio",
									  "name"=>"pos_img",
									  "value"=>"right"));

					echo"Esquerda"; //<input type="radio" name="pos_img" value="left" checked="checked" >
					abreTag("input",array("type"=>"radio",
									  "name"=>"pos_img",
									  "value"=>"left",
									"checked"=>"checked"));

					echo"<br>";
				}

			?>

			<br>
			Data de Postagem: <br>
			<input type="text" name="dia" size="2" maxlength="2" value="<?=$dia?>" disabled ="disabled">
			<input type="text" name="mes" size="2" maxlength="2" value="<?=$mes?>" disabled ="disabled">
			<input type="text" name="ano" size="4" maxlength="4" value="<?=$ano?>" disabled ="disabled">
			<br><br>
			Imagem Para Upload:
			<br><img src="<?php echo "uploads/$imagem";?>" height="300px" width="300px" align="center"><br><br>
			<input type="file" name="img">
			<input type="submit" name="enviar" value="SALVAR">	
			<button><a href="crud.php">Voltar</a></button>
			
		</form>

	</body>
</html>