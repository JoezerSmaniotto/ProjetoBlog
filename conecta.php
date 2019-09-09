<?php
setlocale(LC_ALL, 'pt_BR','pt_BR.utf-8','pt_BR.utf-8','portuguese');
date_default_timezone_set('America/Sao_Paulo');

//conexao via PDO
try{
    $aux = 'mysql:host=localhost;dbname=blog;';
    $link = new PDO($aux,'root','',
                array(
                    PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false
                )
            );
    //echo("Conexão realizada com sucesso!<br>");
    }
catch(PDOException $ex){
    echo(/*"Deu erro! <br>".*/ $ex->getMessage());
}

?>