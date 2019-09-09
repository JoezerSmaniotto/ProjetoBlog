<?php
//funcoes.php


//---------------------------------------
//E0: nome da tag
//E1: vetor associativo de atributos
//S: nada
//exemplo de chamada desta funçao
//abreTag("textarea",array("rows"=>"80",
//						   "cols"=>"50",
//						   "name"=>"mensagem"	
//							));
function abreTag($tag,$vet=array()){
   echo("<$tag");
   if (count($vet) > 0) {

	foreach($vet as $atrib => $valor){
		echo(" $atrib='$valor'");
	}
   
	}
echo(">");
}

//---------------------------------------
//E: nome da tag
//S: nada
function fechaTag($tag){
	echo ("</$tag>");
}

?>