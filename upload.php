
<?php
include('conecta.php');

$_SESSION['sucesso'] =0;
//testa se botão enviar foi pressionado
if(isset($_POST["enviar"])) {
   
    $diretorio = "uploads/";
                                                // userfile nome do campo  VEM $_FILE name nome do arqivo  
    $arquivo_pasta = $diretorio . basename($_FILES["userfile"]["name"]);

        if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $arquivo_pasta)) {
            echo "O arquivo foi enviado com sucesso<br>";

             $titulo = $_REQUEST['titulo'];
			 $resumo = $_REQUEST['resumo'];
			 $conteudo = $_REQUEST['conteudo'];
			 $pos_imag = $_REQUEST['pos_img'];
			 $img = $_FILES["userfile"]["name"];

			 $data= $_REQUEST['ano'] . "-" . $_REQUEST['mes'] . "-" . $_REQUEST['dia'];
			 $sql= "insert into posts (data,imagem,posicao,resumo,texto,titulo)
			 values('$data','$img','$pos_imag','$resumo','$conteudo','$titulo')";

             try {
                //$link foi criado no conecta.php
                //cria $consulta que é o objeto de consulta ao banco
                $consulta = $link->prepare($sql);
                //executa a consulta ao banco
                $consulta->execute();
                echo ("Incluido com sucesso!");
                $_SESSION['sucesso'] = 1;
                header("location: index.php");
            }
            catch(PDOException $ex){
                echo($ex->getMessage());
            }
        } 
        else{

            echo "Ocorreu um erro ao enviar o arquivo<br>";
        }

}
?>



