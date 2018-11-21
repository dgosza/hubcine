<?php
   session_start();
   include_once 'conectaBanco.php';



   $id = filter_input(INPUT_GET, 'idFilme', FILTER_SANITIZE_NUMBER_INT);

    $envia = "UPDATE filmes set mostrar = 0 where idFilme = '$id'";

    $insere_bd = $conecta->prepare($envia);

    if($insere_bd->execute()){
        header("Location: filmeExcluido.php");
    }else{
        echo 'failed';
    }
        
   
?>



    