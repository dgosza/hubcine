<?php
   session_start();
   include_once 'conectaBanco.php';

   $clicaCadastro = filter_input (INPUT_POST, 'clicaCadastro', FILTER_SANITIZE_STRING);

    if($clicaCadastro){
        //Pega os dados do form
        $filme = filter_input (INPUT_POST, 'filme', FILTER_SANITIZE_STRING);
        $descri = filter_input (INPUT_POST, 'descri', FILTER_SANITIZE_STRING);
        $genero = filter_input (INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $ano = filter_input (INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $faixa = filter_input (INPUT_POST, 'faixa', FILTER_SANITIZE_STRING);
        $link = filter_input (INPUT_POST, 'link', FILTER_SANITIZE_STRING);


        //insere no banco de dados
        $envia = "INSERT INTO filmes (filme, descricao, genero, anoLancamento, faixaEtaria, trailer) VALUES (:filme, :descri, :genero, :ano, :faixa, :link)";

        $insere_bd = $conecta->prepare($envia);
        $insere_bd ->bindParam(':filme', $filme);
        $insere_bd ->bindParam(':descri', $descri);
        $insere_bd ->bindParam(':genero', $genero);
        $insere_bd ->bindParam(':ano', $ano);
        $insere_bd ->bindParam(':faixa', $faixa);
        $insere_bd ->bindParam(':link', $link);

        if($insere_bd->execute()){
            header("Location: filmes.php");
        }else{
            header("Location: cadastroErro.php");
        }

        
    }else{
        $_SESSION ['erro'] = "<p style='color:red;'>Cadastro nao efetuado</p>";
        echo "erro ao cadastrar";
        
    }
   
?>



