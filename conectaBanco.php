<?php

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'hubcine');

$conecta = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);


?>