
<?php
//index.php
session_start();

include ("upload.php");
include ("funcoes.php");
include ("conecta.php");
	if(isset($_SESSION['usuario'])){		
		include("topo_sair.php");
		/*include("topo_sair.php");*/
		
	} 
	else 
	{
		include("topo.php");
	}
	abreTag("div", array("class"=>"conteudo"));
	
		if(isset($_SESSION['sucesso']) && @(!$_REQUEST['busca'])){	
			
			$sql="select titulo,resumo,cdpost from posts order by cdpost desc";
			
			try{
				$consulta = $link->prepare($sql);
				$consulta->execute();

				while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
					$titulo=utf8_encode($registro['titulo']);
					$resumo= utf8_encode($registro['resumo']);
					$codigo = $registro['cdpost'];
								
						abreTag("section");
							abreTag("h2");
								echo "$titulo";
							fechaTag("h2");
							
							abreTag("p");
								echo "$resumo";
							fechaTag("p");
							abreTag("form", array("method"=>"POST", "action"=>"resultado.php"));
								abreTag("button", array("class"=>"leia-mais", "type"=>"submit", "name"=>"leia-mais", "value"=>"$codigo"));
									echo ("leia mais");
								fechaTag("button");	
							fechaTag("form");	
						fechaTag("section");

					
				}
			}catch(PDOException $ex){
				echo ($ex->getMessage());

			}
	
		}
		else 
		{

			$busca_result = $_REQUEST['busca'];
			$sql = "select titulo,resumo,cdpost from posts where titulo like '%$busca_result%'";		

			try{
				$consulta = $link->prepare($sql);
				$consulta->execute();
				$flag = 0;
				while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
					$flag = 1;
					$titulo= $registro['titulo'];
					$resumo= $registro['resumo']; // utf8_encode
					$codigo = $registro['cdpost'];

					abreTag("section");
						abreTag("h2");
							echo "$titulo";
						fechaTag("h2");
						
						abreTag("p");
							echo "$resumo";
						fechaTag("p");
						abreTag("form", array("method"=>"POST", "action"=>"resultado.php"));
							abreTag("button", array("class"=>"leia-mais", "type"=>"submit", "name"=>"leia-mais", "value"=>"$codigo"));
								echo ("Leia mais");
							fechaTag("button");	
						fechaTag("form");	
					fechaTag("section");
						
				}
				if($flag == 0)
				{
					abreTag("section");
						abreTag("p");
							echo ("Desculpe, essa noticia não existe. Tente novamente");
						fechaTag("p");
					fechaTag("section");
				}		
			}
			catch(PDOException $ex){
				echo ($ex->getMessage());
			}
		}	
	fechaTag("div");
	

include("rodape.php");
?>
