<?php
session_start();
include_once("conectaBancomy.php"); 

$id = filter_input(INPUT_GET, 'idCadastro', FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "DELETE  FROM cadastro  WHERE idCadastro = '$id' ";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	header("Location: index.php");
}else{
	header("Location: cadastroErro.php");
}



?>