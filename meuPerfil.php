
<?php    
session_start();  
 if(isset($_SESSION["email"]) && isset($_SESSION["nome"]) && isset($_SESSION["sobrenome"]) && isset($_SESSION["genero"]))  
 {  
 }  
 else  
 {  
      header("location:index.php");  
 }
 
?> 
 
  

<!DOCTYPE html>
<html>
<head>
    <title>hubcine.</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="css/hubcine.css" />
    <link rel="icon" type="image/png" sizes="96x96" href="imgs/favicon-96x96.png">

    <!-- FONTE !-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>

    <div class="row-fluid">
        <div class="all">

            <div class="topo">
                <div id="logo"><img src="imgs/logo.png" width="250"></div>

                <div class="nomeUser">

                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#fff;color:#950000;border:#fff;">
                    <?php echo  $_SESSION['nome'];?>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="meuPerfil.php">Meu perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="sair.php">Sair</a>
                    </div>

                </div>

            </div>

            <div id="meio">
               <div id="titulos">
                    <h2>Dados cadastrais</h2><br><br>

                    <p>Seu Nome: <b><?php echo $_SESSION['nome'] ?> <?php echo $_SESSION['sobrenome'] ?></b></p>
                    <p>Seu e-mail: <b><?php echo $_SESSION['email']  ?></b></p>
                    <p>
                        Seu Plano:
                        <?php 
                            $conecta = new PDO("mysql:host=localhost;dbname=hubcine","root","");
                            $conecta -> exec ('SET CHARACTER SET utf8');

                            $idUser = $_SESSION['idCadastro'];
                            $select = $conecta->prepare("SELECT b.nomePlano FROM cadastro as a INNER JOIN planos as b ON a.plano = b.plano where idCadastro = $idUser");
                            $select->execute();
                                                          //Retorna o primeiro resultado do array
                            $fetchAll = $select->fetchAll(PDO::FETCH_ORI_FIRST);
                            foreach($fetchAll as $dados){
                                //Converte array em string
                                $resultado = implode('', $dados);
                                echo '<b>'.$resultado.'</b>';
                            }

                        ?>
                    </p>


                    <p>
                        Seu Gênero:
                        <?php
                        $sexo = $_SESSION['genero'];
                        if($sexo == 'masc'){
                            echo "<div class='sexo'><b>Masculino</b></div>";
                        }else{
                            if($sexo == 'fem'){
                                echo "<div class='sexo'><b>Feminino</b></div>";
                            }else{
                                echo "<div class='sexo'><b>Indefinido</b></div>";
                            }
                        }
                    ?>
                    
                    </p>
                    
                    <?php 
                        echo "<div id='mudar'><a href='mudarDados.php?idCadastro=" . $_SESSION['idCadastro'] . "'>Alterar Dados</a></div>";
                    ?><br>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="button" style="">
                    Excluir Conta
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir sua conta ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Não</button>
                            <?php  echo "<a href='excluirConta.php?idCadastro=" . $_SESSION['idCadastro'] . "'><button type'button' class='btn btn-danger'>Sim</button></a>"; ?>
                        </div>
                        </div>
                    </div>
                    </div>    
               </div>
            </div>


            <div class="rodape">
                <div id="logo"><img src="imgs/logo.png" width="250" align="center"></div>
                <div class="menu" align="center">
                    <ul>
                        <li><a href="hubcine.php">Home</a></li>
                        <li><a href="filmes.php">Filmes</a></li>
                        <li><a href="sobre.php">Sobre</a></li>
                        <li><a href="contato.php">Contato</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>