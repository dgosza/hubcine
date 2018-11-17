<?php

session_start();
include_once 'conectaBanco.php';


$id = filter_input(INPUT_POST, 'idCadastro', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


$conectaBanco = "UPDATE cadastro set nome = :nome, sobrenome = :sobrenome, email=:email where email = '$email' ";

$insere_bd = $conecta->prepare($conectaBanco);
$insere_bd ->bindParam(":nome", $nome);
$insere_bd ->bindParam(":sobrenome", $sobrenome);
$insere_bd ->bindParam(":email", $email);

if($insere_bd->execute()){
	header("Location: dadosAlterados.php");
}else{
	header("Location: cadastroErro.php");
}
?>