<?php
   session_start();
   include_once 'conectaBanco.php';

   $clicaCadastro = filter_input (INPUT_POST, 'ClicaAlterarDados', FILTER_SANITIZE_STRING);

    if($clicaCadastro){
        //Pega os dados do form
        $id = filter_input(INPUT_POST, 'idFilme', FILTER_SANITIZE_NUMBER_INT);
        $filme = filter_input (INPUT_POST, 'filme', FILTER_SANITIZE_STRING);
        $descricao = filter_input (INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $genero = filter_input (INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $anoLancamento = filter_input (INPUT_POST, 'anoLancamento', FILTER_SANITIZE_STRING);
        $faixaEtaria = filter_input (INPUT_POST, 'faixaEtaria', FILTER_SANITIZE_STRING);
        $trailer = filter_input (INPUT_POST, 'trailer', FILTER_SANITIZE_STRING);

        $envia = "UPDATE filmes set filme =:filme, descricao=:descricao, genero=:genero, anoLancamento=:anoLancamento, faixaEtaria=:faixaEtaria, trailer=:trailer where idFilme = '$id' ";

        $insere_bd = $conecta->prepare($envia);
        $insere_bd ->bindParam(':filme', $filme);
        $insere_bd ->bindParam(':descricao', $descricao);
        $insere_bd ->bindParam(':genero', $genero);
        $insere_bd ->bindParam(':anoLancamento', $anoLancamento);
        $insere_bd ->bindParam(':faixaEtaria', $faixaEtaria);
        $insere_bd ->bindParam(':trailer', $trailer);

        if($insere_bd->execute()){
            header("Location: painel_adm_alterfilmes.php");
        }else{
            header("Location: cadastroErro.php");
        }

        
    }else{
        $_SESSION ['erro'] = "<p style='color:red;'>Cadastro nao efetuado</p>";
        echo "erro ao cadastrar";
        
    }
   
?>



