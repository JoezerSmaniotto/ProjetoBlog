<?php
//index.php
session_start();
$titulo = 0;

include ("funcoes.php");
include ("conecta.php");
if(isset($_SESSION['usuario'])){		
	include("topo_sair.php");
	/*include("topo_sair.php");*/
	
} else {
	include("topo.php");
}
	abreTag("div", array("class"=>"conteudo"));
	
		if(isset($_REQUEST['leia-mais'])){	
			
			$codigopost = $_REQUEST['leia-mais'];
			$sql= "select titulo,texto,data,imagem,posicao from posts where cdpost = $codigopost";	
			
			try{
				$consulta = $link->prepare($sql);
				$consulta->execute();

				$registro=$consulta->fetch(PDO::FETCH_ASSOC);
					$titulo = $registro['titulo'];
					$texto = $registro['texto']; // utf8_encode
					$imagem = $registro['imagem'];
					$posicao_img = $registro['posicao'];
					/*
					$dia = substr($registro['data'],8,2);
					$mes = substr($registro['data'],5,2);
					$ano = substr($registro['data'],0,4);
					*/
					$data =  strftime("%d/%m/%Y",strtotime($registro['data']));	
					$dia = substr($data, 0, 2);
					$mes = substr($data, 3, 2);
					$ano = substr($data, 6, 4);
					switch ($mes) {
						case '01':
							$mes = "janeiro";
							break;
						case '02':
							$mes = "fevereiro";
							break;
						case '03':
							$mes = "março";
							break;
						case '04':
							$mes = "abril";
							break;
						case '05':
							$mes = "maio";
							break;
						case '06':
							$mes = "junho";
							break;				
						case '07':
							$mes = "julho";
							break;
						case '08':
							$mes = "agosto";
							break;
						case '09':
							$mes = "setembro";
							break;
						case '10':
							$mes = "outubro";
							break;
						case '11':
							$mes = "novembro";
							break;
						case '12':
							$mes = "dezembro";
							break;					
					}
					abreTag("section");
						abreTag("h1");
							echo("$titulo");
						fechaTag("h1");
						abreTag("p", array("class"=>"post"));
							echo("$texto");
						fechaTag("p");
						abreTag("div",array("class"=>"div-img", "style"=>"float: $posicao_img;"));	
							abreTag("img", array("src"=>"uploads/$imagem"));
						fechaTag("div");
						abreTag("p" ,array("class"=>"data"));
							//echo "Publicado em $dia de $mes de $ano";
							echo ("Publicado em $dia de $mes de $ano");
						fechaTag("p");	
					fechaTag("section");
		
			}
			catch(PDOException $ex){
				echo ($ex->getMessage());
			}
		}
 	
	fechaTag("div");	

include("rodape.php");
?>