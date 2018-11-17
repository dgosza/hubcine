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
	<title>hubcine :: Bem vindo </title>
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
		
			
			<?php
				$sexo = $_SESSION['genero'];
				if($sexo == 'masc'){
					echo "<div class='textoBemvindo'>Bem vindo <b>".$_SESSION['nome']."</b></div>";
				}else{
					if($sexo == 'fem'){
						echo "<div class='textoBemvindo'>Bem vinda <b>".$_SESSION['nome']."</b></div>";
					}else{
						echo "<div class='textoBemvindo'>Bem vindx <b>".$_SESSION['nome']."</b></div>";
					}
				}
			
			
			?>

			<br><br>
			<h4>Você sera redirecionado após 3 segundos</h4>
		
		</div>
		
		
		<?php
			header("Refresh: 3; url=hubcine.php");
		?>
	</div>
</body>
</html>