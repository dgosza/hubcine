
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

            <div id="meio" style="height:500px;">
               <h4>Sobre o hubcine</h4>

                <p>Sobre a Hubcine é uma das líderes no serviço de conteúdo digital desde 2004.</p>
                <p> Hubcine é o principal serviço de entretenimento por internet do mundo. São mais de 100 milhões de assinaturas em mais de 150 países assistindo a séries, documentários e filmes de diversos gêneros e idiomas. 
                    O assinante Hubcine pode assistir a quantos filmes e séries quiser, quando e onde quiser, em praticamente qualquer tela com conexão à internet. O assinante pode assistir, pausar e voltar a assistir a um título sem comerciais e sem compromisso.</p>



            </div>

            <div id="meio2">

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