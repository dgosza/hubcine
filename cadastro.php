<!DOCTYPE html>
<?php    
 session_start();  

 if(isset($_SESSION["email"]))  
 {  
     header("location: hubcine.php");
 }  

 ?>  

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hubcine :: Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/cadastro.css" />

    <link rel="icon" type="image/png" sizes="96x96" href="imgs/favicon-96x96.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>

    <div class="all">

        <div class="logo" align="center">
            <img src="imgs/logo.png" align="center">
        </div>
        <?php

        if(isset($_SESSION['erro'])){
            echo $_SESSION['erro'];
            unset($_SESSION['erro']);
        }

        ?>
        <div class="formCadastro" align="center">
            <form action="enviaCadastro.php" method="POST" class="needs-validation" novalidate>
                <div class="pessoal">
                    <div class="left">

                        <div class="col-md mb-3">
                            <input type="text" placeholder="Nome" id="nome" name="nome" class="form-control" maxlength="20" required>
                            <div class="invalid-feedback">Preencha com um nome</div><br>
                        </div>

                        <div class="col-md mb-3">
                            <input type="text" placeholder="Sobrenome" id="sobrenome" name="sobrenome" class="form-control" maxlength="20" required>
                            <div class="invalid-feedback">Preencha com um sobrenome</div><br>
                        </div>

                        <div class="col-md mb-3">
                            <input type="text" placeholder="Data de nascimento" name="datanasc" id="data" class="form-control" OnKeyUp="mascaraData(this);" onkeypress='return SomenteNumero(event)' maxlength="10" required>
                            <div class="invalid-feedback">Preencha com sua data de nascimento</div><br>

                            <!-- FORMATAÇÂO DA MASCARA PARA DATA !-->
                            <script language="JavaScript" type="text/javascript">
                                function mascaraData(campoData){
                                var data = campoData.value;
                                if (data.length == 2){
                                    data = data + '/';
                                    document.forms[0].data.value = data;
                                    return true;              
                                    }
                                    if (data.length == 5){
                                    data = data + '/';
                                     document.forms[0].data.value = data;
                                    return true;
                                    }
                                }
                            </script>
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
                        </div>

                        <div class="col-md mb-3">
                            <select class="form-control" name="genero" required>
                                <option value="-" disabled selected>Gênero</option>
                                <option value="masc">Masculino</option>
                                <option value="fem">Feminino</option>
                                <option value="indef">Indefinido</option>
                            </select>
                            <div class="invalid-feedback">Preencha com o seu gênero</div>
                            <br>
                        </div>

                        <div class="col-md mb-3">    
                            <select name="estado" id="estados" class="form-control" required>
                                <option value="-" selected disabled>Estado</option>
                                <?php

                                    include_once 'conectaBanco.php';

                                    $select = $conecta->prepare("SELECT * FROM estados ORDER BY nome ASC");
                                    $select->execute();
                                    $fetchAll = $select->fetchAll();
                                    foreach($fetchAll as $estados){
                                        echo '<option value ="'.$estados['id'].'">'.$estados['nome'].'</option>';
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">Preencha com o seu estado!</div>
                        </div>

                        <div class="col-md mb-3">   
                            <select id="cidades" name="cidade" class="form-control" required>
                            </select>
                        </div>
                        <div class="col-md mb-3">    
                            <input type="email" placeholder="E-mail" id="email" name="email" class="form-control" maxlength="30" required>
                            <div class="invalid-feedback">Preencha com um e-mail</div><br>
                        </div>

                        <div class="col-md mb-3">
                            <input type="password" placeholder="Senha" id="senha" name="senha" class="form-control" maxlength="15"  required>
                            <div class="invalid-feedback">Preencha com uma senha</div><br>
                        </div>

                        <div class="container" id="teste">

                            <div class="row">
                                <div class="col-sm" id="um">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <h4 for="plano1">plano Basic</h4>
                                        <ul>
                                            <li>Uma tela compartilhada</li>
                                            <li>Acesso ilimitado aos filmes</li>
                                        </ul>
                                        <input class="form-check-input" type="radio" name="tipoPlano" id="1" value="plano1" required>
                                    </div>
                                </div>
                                
                                <div id="dois" class="col-sm">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <h4 for="plano2">plano Medium</h4>
                                        <ul>
                                            <li>Duas telas compartilhadas</li>
                                            <li>Acesso ilimitado aos filmes</li>
                                        </ul>
                                        <input class="form-check-input" type="radio" name="tipoPlano" id="plano2" value="plano2" required>
                                    </div>
                                </div>
                                
                                <div id="tres" class="col-sm">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <h4 for="plano3">plano Advanced</h4>
                                        <ul>
                                            <li>Três ou mais telas compartilhadas</li>
                                            <li>Acesso ilimitado aos filmes</li>
                                        </ul>
                                        <input class="form-check-input" type="radio" name="tipoPlano" id="plano3" value="plano3" required>
                                        <div class="invalid-feedback" id="validaCheck">Selecione pelo menos um dos planos!</div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <br><br><input class="btn btn-primary" name="clicaCadastro" type="submit" value="Cadastrar"></input><br><br>
                    
                </div>
            </form>

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









<!--
    QUANDO ESCOLHER
    OS ESTADOS MOSTRA AS 
    CIDADES DO ESTADO ESCOLHIDO!
-->
<script>
$("#estados").on("change",function(){
    var idEstado = $("#estados").val();
    $.ajax({
        url: 'pega_cidades.php',
        type: 'POST',
        data: {id:idEstado},
        beforeSend: function(){
            $("#cidades").css({'display':'block','margin-top':'1em'});
            $("#cidades").html("Carregando...");
        },
        success: function(data){
            $("#cidades").css({'display':'block','margin-top':'1em' });
            $("#cidades").html(data);
        },
        error: function(data){
            $("#cidades").css({'display':'block','margin-top':'1em'});
            $("#cidades").html("Houve um erro ao carregar");
        }
    })
});
</script>
