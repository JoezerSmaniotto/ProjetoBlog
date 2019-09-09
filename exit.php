<?php


// Nâo se anulam ??? Cria e já destroy.
session_start();

session_destroy();
//redireciona para o index
header("Location: index.php");



?>