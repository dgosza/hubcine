<?php 
session_start(); 
	$host = "localhost";  
	$username = "root";  
	$password = "";  
	$database = "hubcine";  
    $message = ""; 
     
	try{  
	  $conecta = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {   
        $query = "SELECT * FROM cadastro WHERE email = :email AND senha = :senha";
        $statement = $conecta->prepare($query);  
        $statement->execute(  
            array(  
                'email'     =>     $_POST["email"],  
                'senha'     =>     $_POST["senha"],
                )  
            );  
            $count = $statement->rowCount();
            $dados = $statement->fetch(PDO::FETCH_OBJ);  
            if($count > 0)  
            {  
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["nome"] = $dados->nome;
                $_SESSION["genero"] = $dados->genero;
                $_SESSION["sobrenome"] = $dados->sobrenome;
                $_SESSION["idCadastro"] = $dados->idCadastro;
                $_SESSION["admin"] = $dados->admin;
                
                header("location:cadastroRealizado.php");  
            }  
            else  
            {  
                $message = '<label>Dados inserios erroneamente</label>';
                echo '<div class="alert alert-danger" align="center">Nenhum cadastro encontrado!</div>';    
            }  
              
        }  
    }  
catch(PDOException $error)  
{  
   $message = $error->getMessage();  
}

?>
<html>
<head>
    <title>hubcine</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="96x96" href="imgs/favicon-96x96.png">

    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    
</head>
<body>

    <div class="all">
    
        <div align="center">
            <img src="imgs/logo.png" align="center">
        </div>  

        <div id="formLogin">
            <form method="POST" class="needs-validation" novalidate>
                <input type="email" placeholder="E-mail" class="form-control" name="email" required>
                <div class="invalid-feedback">Preencha com o seu e-mail</div><br>

                <input type="password" placeholder="Senha" class="form-control" name="senha" required>
                <div class="invalid-feedback">Preencha com a senha</div><br>
                <input class="btn btn-primary" type="submit" value="Logar" name="login"></input>
            </form><br>
            
            <i>Primeira vez no site ? <a href="cadastro.php">clique aqui</a></i><br><br><br>
            
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
</body>
</html>