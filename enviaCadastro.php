<?php
   session_start();
   include_once 'conectaBanco.php';

   $clicaCadastro = filter_input (INPUT_POST, 'clicaCadastro', FILTER_SANITIZE_STRING);

    if($clicaCadastro){
        //Pega os dados do form
        $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input (INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
        $datanasc = filter_input (INPUT_POST, 'datanasc', FILTER_SANITIZE_STRING);
        $genero = filter_input (INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $estado = filter_input (INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
        $cidade = filter_input (INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
        $email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $plano = filter_input (INPUT_POST, 'tipoPlano', FILTER_SANITIZE_STRING);
        $admin = "false";

        //insere no banco de dados
        $envia = "INSERT INTO cadastro (nome, sobrenome, nasc, genero, estado, cidade, email, senha, plano, admin) VALUES (:nome, :sobrenome, :datanasc, :genero, :estado, :cidade, :email, :senha, :tipoPlano, :false)";

        $insere_bd = $conecta->prepare($envia);
        $insere_bd ->bindParam(':nome', $nome);
        $insere_bd ->bindParam(':sobrenome', $sobrenome);
        $insere_bd ->bindParam(':datanasc', $datanasc);
        $insere_bd ->bindParam(':genero', $genero);
        $insere_bd ->bindParam(':estado', $estado);
        $insere_bd ->bindParam(':cidade', $cidade);
        $insere_bd ->bindParam(':email', $email);
        $insere_bd ->bindParam(':senha', $senha);
        $insere_bd ->bindParam(':tipoPlano', $plano);
        $insere_bd ->bindParam(':false', $admin);

        if($insere_bd->execute()){
            header("Location: cadastroRealizado.php");
        }else{
            header("Location: cadastroErro.php");
        }

        
    }else{
        $_SESSION ['erro'] = "<p style='color:red;'>Cadastro nao efetuado</p>";
        echo "erro ao cadastrar";
        
    }
   
?>



