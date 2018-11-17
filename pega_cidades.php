<?php
        $conecta = new PDO("mysql:host=localhost;dbname=hubcine","root","");
        $conecta -> exec ('SET CHARACTER SET utf8');
    
    
        $pegaCidades = $conecta->prepare("SELECT * FROM cidades WHERE estados_id = '".$_POST['id']."'") ;
        $pegaCidades->execute();

        $fetchAll= $pegaCidades ->fetchAll();

        foreach($fetchAll as $cidades){
            echo '<option>'.$cidades['nome'].'</option>';
        }
?>
