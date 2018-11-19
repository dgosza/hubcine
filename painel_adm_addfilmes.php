<?php    
session_start();  

if(isset($_SESSION["email"]) && isset($_SESSION["nome"]) && isset($_SESSION["sobrenome"]) && isset($_SESSION["genero"]) && isset($_SESSION["admin"]))  
{  
}  
else  
{  
    header("location:index.php");  
}  
?>  