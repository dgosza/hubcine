<?php    
 session_start();  

 if(isset($_SESSION["email"]) && isset($_SESSION["nome"]) && isset($_SESSION["genero"]))  
 {  
 }  
 else  
 {  
      header("location:index.php");  
 }  
 ?>  

<html>
<head>
	<title>hubcine </title>
	<style type="text/css">
		.bemvindo{
			width: 650px;
			margin: 0 auto;
			padding: 10px;
		}
		.textoBemvindo{
			font-size:25px;
		}
		.logo{
			position:relative;
			left:-90px;
		}
	
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

</head>
<body>

	<div class="tudo">
		<div class="bemvindo">
		
		
			<img src="imgs/logo.png" alt="hubcine_logo" width="400" class="logo">
		
            <h4>Dados Alterados</h4>
            <h4>Relogue no sistema para aplicar as alterações.</h4>
			<br><br>
			<h4>Você sera redirecionado após 3 segundos</h4>
		
		</div>
		
		
		<?php
			header("Refresh: 3; url=sair.php");
		?>
	</div>
</body>
</html>