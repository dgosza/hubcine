<?php
   session_start();
   include_once 'conectaBanco.php';



   $id = filter_input(INPUT_GET, 'idCadastro', FILTER_SANITIZE_NUMBER_INT);

    $envia = "DELETE from cadastro where idCadastro = '$id'";

    $insere_bd = $conecta->prepare($envia);

    if($insere_bd->execute()){
        header("Location: index.php");
    }else{
        echo 'failed';
    }
        
   
?>



    