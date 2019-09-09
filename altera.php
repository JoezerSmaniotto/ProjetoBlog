<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Altera</title>
    <style type="text/css">
    body{
        text-align: center;
   		width: 100%;
	    height: 100%;
	    color: white;
	    background: url("icones/img_exclui1.jpg") no-repeat;
	    background-size: cover;
}

    a{
        text-decoration:none;
        color: black;
    }       

    #altera_form{
    	background-color: rgba(0,0,0,0.7); 	

    }
    .altera{
    	
    	border-radius: 0.5; 
    	width: 600px;
    	height: auto;
    	margin: 0;	
    	margin: 0 auto;
    	text-align: left;

   		  	
    }

    form {

    	padding-bottom: 50px;
    	padding-top: 3px; 

    }

    em{
    	color: red;

    }

    </style>
</head>
<body>
    


<?php 
include("conecta.php");
include_once("funcoes.php");

//alteracao
if(isset($_REQUEST['enviar'])){
	$codigo = $_REQUEST['codigo'];
	//carrega dados da pessoa
	if($_REQUEST['enviar']=='Alterar'){
		//consultar o banco
		
		
		try {
			$sql = "select * from posts where cdpost = $codigo";
			$consulta = $link->prepare($sql);
			$consulta->execute();
			$registro = $consulta->fetch(PDO::FETCH_ASSOC);
			$titulo = utf8_encode($registro['titulo']);
			$resumo = utf8_encode($registro['resumo']);
			$texto = utf8_encode($registro['texto']);
			$posicao = ($registro['posicao']);
			$imagem=($registro['imagem']);
			//separa o campo data em 3 partes 
			//.substr($texto,inicio,comprimento);
			$dia = substr($registro['data'],8,2); // 8,2
			$mes = substr($registro['data'],5,2); // 5,2
			$ano = substr($registro['data'],0,4); // 0,4
			//inclui formulario com dados
			include("altera_form.php");

			

		}
		catch(PDOException $ex){
		echo($ex->getMessage());
		}	
	}



	//faz a gravacao dos dados alterados Pega a 
	if($_REQUEST['enviar']=='SALVAR'){
		//consultar o banco
			$img = $_FILES['img']['name'];
			// var_dump($img);
			// exit;
		if($img == ""){
			$codigo = $_REQUEST['codigo'];
			$titulo = $_REQUEST['titulo'];
			$resumo = $_REQUEST['resumo'];
			$texto = $_REQUEST['conteudo'];
			$posicao = $_REQUEST['pos_img'];

			//$data = $_REQUEST['ano'] . "-" . $_REQUEST['mes'] . "-" . $_REQUEST['dia']; data='$data'

			$sql = "update posts set titulo='$titulo', resumo='$resumo' ,texto='$texto', posicao='$posicao'  where cdpost=$codigo";
			// echo "$sql";
			
			$consulta = $link->prepare($sql);
			$consulta->execute();
		
		} else {
		
		
			$foto_nome = $_FILES['img']['name'];
			$foto_tmp = $_FILES['img']['tmp_name'];
			

			$codigo = $_REQUEST['codigo'];
			$titulo = $_REQUEST['titulo'];
			$resumo = $_REQUEST['resumo'];
			$texto = $_REQUEST['conteudo'];
			$posicao = $_REQUEST['pos_img'];
		

	        if (move_uploaded_file($foto_tmp, "uploads/$foto_nome")) {
	            echo "O arquivo foi enviado com sucesso<br>";

				//colocar a data do post no update data='$data'
				$sql = "update posts set titulo='$titulo', resumo='$resumo' ,texto='$texto', posicao='$posicao', imagem='$foto_nome' where cdpost=$codigo";
				// echo "$sql";
				
				$consulta = $link->prepare($sql);
				$consulta->execute();

	        }else{

	            echo "Ocorreu um erro ao enviar o arquivo<br>";
	        }

		}
	}
} //fim alteracao

//listagem 
try {
	//$link foi criado no conecta.php
	$sql = "select cdpost,titulo,texto,resumo,posicao,imagem,data from posts order by cdpost";
	$consulta = $link->prepare($sql);
	$consulta->execute();
	//enquanto tem registros disponíveis 
	//na consulta, copia cada um deles 
	//para o vetor associativo $registro 
	//abreTag("form");
	
	abreTag("form",array("id"=>"altera_form"));			
		abreTag("h3");
		echo "ALTERA";
		fechaTag("h3");

	
		abreTag("div",array("class"=>"altera"));
		
			while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
				$cdpost = $registro['cdpost'];
				$titulo = $registro['titulo'];
				$resumo = $registro['resumo'];
				$texto = $registro['texto'];
				$imagem = $registro['imagem'];
				$posicao = $registro['posicao'];
				//acerta acentuação para UTF8
				//$nome = $registro['nome'];
				//%B nome do mes extenso, %m mes com 2 digitos
				//%Y ano com quatro dígitos ,%A dia da semana extenso
			
				$data =  strftime("%d/%m/%Y",strtotime($registro['data']));	
				abreTag("input",array("name"=>"codigo",
									  "value"=>"$cdpost",
									  "type"=>"radio"));

				
				echo("Cd: $cdpost - Data: $data - Título: $titulo <br> Resumo: $resumo<br>Texto: $texto<br> Imagem: $imagem -  Posição: $posicao");
				echo"<br>";
				echo"<br>";
			}
			echo "<br>";
		fechaTag("div");
		echo "<br>";
		abreTag("input",array("name"=>"enviar",
								  "value"=>"Alterar",
								  "type"=>"submit"));
		

		abreTag("button");
			abreTag("a",array("href"=>"crud.php"));
			echo "Voltar";	
			fechaTag("a");
		fechaTag("button");
		
	fechaTag("form");
}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>


</body>
</html>