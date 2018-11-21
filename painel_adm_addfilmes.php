<?php    
session_start();  

if(isset($_SESSION["email"]) && isset($_SESSION["nome"]) && isset($_SESSION["sobrenome"]) && isset($_SESSION["genero"]) && isset($_SESSION["admin"]))  
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
?>  


<!DOCTYPE html>
<html>
<head>
    <title>Painel ADM</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    
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

            <div id="meio">

            <div id="logo"><img src="imgs/logo.png" width="250"></div>

            <h4 style="position:relative;top:150px;left:-250px;">Cadastro de Filmes no hubcine.</h4>

            <form action="painel_adm_addfilmes_cadastrarfilme.php" method="POST" class="needs-validation" novalidate>

                <div class="form-group" style="position:relative;top:120px;"> 

                    <input type="text" placeholder="Nome do filme" name="filme" id="filme" class="form-control" maxlength="20" required><br>
                    <textarea class="form-control" name="descri" placeholder="Descrição do filme" rows="4" maxlength="1200" required style="resize:none;"></textarea><br>

                    <select class="form-control" name="genero" id="genero"> 
                        <option value="-" selected disabled>Gênero</option>
                        <?php 
                            $conecta = new PDO("mysql:host=localhost;dbname=hubcine","root","");
                            $conecta-> exec ('SET CHARACTER SET utf8');


                            $select = $conecta->prepare("SELECT * FROM filmegenero ORDER BY nomeGenero ASC");
                            $select->execute();
                            $fetchAll = $select->fetchAll();
                            foreach($fetchAll as $genero){
                                echo '<option value ="'.$genero['nomeGenero'].'">'.$genero['nomeGenero'].'</option>';
                            }                        
                        ?>
                    </select><br>

                    <input type="text" placeholder="Ano de Lançamento" name="ano" id="ano" maxlength="4" class="form-control" onkeypress='return SomenteNumero(event)' required><br>
                    <input type="text" placeholder="Faixa Etária" name="faixa" id="faixa" class="form-control" maxlength="2" onkeypress='return SomenteNumero(event)' required><br>

                    <!-- SOMENTE NUMERO NO CAMPO DATA !-->
                    <script language='JavaScript'>
                        function SomenteNumero(e){
                            var tecla=(window.event)?event.keyCode:e.which;   
                            if((tecla>47 && tecla<58)) return true;
                            else{
                            if (tecla==8 || tecla==0) return true;
                            else  return false;
                            }
                        }
                    </script>


                    <input type="text" placeholder="Link do trailer" name="link" id="link" class="form-control" required><br>
                    <input class="btn btn-primary" name="clicaCadastro" type="submit" value="Cadastrar"></input><br><br>
                </div>
            
            </form>
                
            </div>

        </div>
    </div>



    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>


    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>