<?php
//index.php
session_start();

include ("funcoes.php");
include ("conecta.php");
if(isset($_SESSION['usuario'])){
		
	include("topo_sair.php");
	/*include("topo_sair.php");*/
	
} else {
	include("topo.php");
}

include ("contato_form.php");

include("rodape.php");


?>