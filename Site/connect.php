<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'wilmadecoracoes';


    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    if($conexao){
        $conexao ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    }else{
        echo "Erro de conexação" . $e->getMessage();
    }
?>