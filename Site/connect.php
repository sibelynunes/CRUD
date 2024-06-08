<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'wilmadecoracoes';


    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    if($pdo){
        $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    }else{
        echo "Erro de conexação" . $e->getMessage();
    }
