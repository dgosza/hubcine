
<?php    
 session_start();  

 if(isset($_SESSION["email"]) && isset($_SESSION["nome"]) && isset($_SESSION["sobrenome"]) && isset($_SESSION["genero"]) && isset($_SESSION["idCadastro"]))  
 {  
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

            <h4>Alterar Dados</h4><br>

            <form id="formulario" action="alteraCadastro.php" method="POST">
                

                <input type=text class="form form-control" id="nome" name="nome"            value="<?php echo $_SESSION['nome'];?>" ><br>

                <input type=text class="form form-control" id="sobrenome" name="sobrenome"  value="<?php echo $_SESSION['sobrenome'];?>" ><br>

                <input type=text class="form form-control" id="email" name="email"          value="<?php echo $_SESSION['email'];?>" ><br>

                <input class="btn btn-primary" type="submit" value="Alterar Dados">
            
            </form>
        </div>
    </div>
    

















   <!-- 
       
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

    !-->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>