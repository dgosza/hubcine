
<?php    
 session_start();  

 if(isset($_SESSION["email"]) && isset($_SESSION["nome"]) && isset($_SESSION["sobrenome"]) && isset($_SESSION["genero"]) && isset($_SESSION["idCadastro"]) && isset($_SESSION["admin"]))  
 {
    $verificaAdmin = $_SESSION['admin'];
    if($verificaAdmin == 0){
        header("Location: hubcine.php");
    }  
 }  
 else  
 {  
      header("location:index.php");  
 }

$id = filter_input(INPUT_GET, 'idCadastro', FILTER_SANITIZE_NUMBER_INT);

 ?>  

<!DOCTYPE html>
<html>
<head>
    <title>hubcine.</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" sizes="96x96" href="imgs/favicon-96x96.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <style type="text/css">
        .all{
            width: 1250px;
            margin: 0 auto;
            padding: 10px;
        }
    
        #formulario{
            width: 500px;

        }
    </style>
    
</head>
<body>

    <div class="row-fluid">
        <div class="all">
            <div id="logo"><img src="imgs/logo.png" width="250"></div>

            <h4>Alterar Dados do filme <?php   ?></h4><br>

            <form id="formulario" action="alteraDadosFilme.php" method="POST">

                <?php 

                    include_once 'conectaBanco.php';
                    
                    $id = filter_input(INPUT_GET, 'idFilme', FILTER_VALIDATE_INT);

                    $select = $conecta->prepare("SELECT * FROM filmes where idFilme =".$id."");
                    $select->execute();
                    $fetchAll = $select->fetchAll();
                    foreach($fetchAll as $dados){
                        echo ' <input type="hidden" name="idFilme" value="'.$dados['idFilme'].'" "> ';

                        echo '<input type="text" class="form-control" name="filme" value="'.$dados['filme'].'"><br> ';
                        echo '<textarea class="form-control" name="descricao" rows="4">'.$dados['descricao'].'</textarea><br>';

                        echo
                        
                        '<select class="form-control" name="genero" id"genero">
                            <option value="'.$dados['genero'].'" selected>'.$dados['genero'].'</option>
                            <option value="Suspense" >Suspense</option>
                            <option value="Terror" >Terror</option>   
                            <option value="Drama" >Drama</option>  
                            <option value="Aventura" >Aventura</option>
                            <option value="Ficção Científica" >Ficção Científica</option>   
                            <option value="Romance" >Romance</option>
                            <option value="Guerra" >Guerra</option>
                            <option value="Fantasia" >Fantasia</option>         
                        </select><br> ';

                        echo '<input type="text" class="form-control" name="anoLancamento" value="'.$dados['anoLancamento'].'"><br> ';
                        echo '<input type="text" class="form-control" name="faixaEtaria" value="'.$dados['faixaEtaria'].'"><br> ';
                        echo '<input type="text" class="form-control" name="trailer" value="'.$dados['trailer'].'"><br> ';

                    }
                    
                    



                ?>



                <br><br><input class="btn btn-primary" type="submit" value="Alterar Dados" name="ClicaAlterarDados">
            
            </form>
        </div>
    </div>
    

















    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>