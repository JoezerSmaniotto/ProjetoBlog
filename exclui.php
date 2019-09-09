<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Excluir</title>
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

    </style>
</head>
<body>
    


<?php
include("conecta.php");
include("funcoes.php");
//faz exclusao!!!!!!
if(isset($_REQUEST['enviar'])){  // Esse enviar vem de onde ??? É de baixo do input ?
	$codigo = $_REQUEST['codigo'];
	//verifica se quer mesmo excluir
	if ($_REQUEST['enviar'] == 'Deletar'){

		include("exclui_confirma_form.php");
	}
	else if ($_REQUEST['enviar'] == "SIM") {
		
		try {
			$sql = "delete from posts where cdpost=$codigo";
			$consulta = $link->prepare($sql);
			$consulta->execute();

		}
		catch(PDOException $ex){
		echo($ex->getMessage());
		}	
	}
		
}// fim exclusao

//listagem 
try {
	//$link foi criado no conecta.php
	$sql = "select cdpost,titulo,resumo from posts order by cdpost";
	$consulta = $link->prepare($sql);
	$consulta->execute();
	//enquanto tem registros disponíveis 
	//na consulta, copia cada um deles 
	//para o vetor associativo $registro 
	abreTag("form",array("id"=>"altera_form"));
		abreTag("h3");
		echo "EXCLUIR";
		fechaTag("h3");
		echo "<br>";
		while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) { // é Consulta mesmo o nossa ??
			$cdpost = $registro['cdpost'];
			//acerta acentuação para UTF8
			$titulo = utf8_encode( $registro['titulo']); // Alterei
			$resumo = utf8_encode( $registro['resumo']); // Alterei
			//%B nome do mes extenso, %m mes com 2 digitos
			//%Y ano com quatro dígitos ,%A dia da semana extenso
			//$data =  strftime("%d/%m/%Y",strtotime($registro['data']));	

			abreTag("div",array("class"=>"altera"));	 //,array("class"=>"altera")
				abreTag("input",array("name"=>"codigo",
										  "value"=>"$cdpost",
										  "type"=>"radio"));
					echo("Cod: $cdpost   -   Titulo: $titulo <br> Resumo: $resumo <br>");
				fechaTag("input");	
			fechaTag("div");
			echo "<br>";	
		}
				
			echo "<br>";	
			abreTag("input",array("name"=>"enviar",
										  "value"=>"Deletar",
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