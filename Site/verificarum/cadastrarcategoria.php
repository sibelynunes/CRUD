<?php
require '../connect.php';
if(
isset($_POST['nome'])&& !empty($_POST['nome'])
    ){
        var_dump($_POST['nome']);
    $nome = $_POST['nome'];
    $sql = "INSERT INTO categoria(nome) VALUES(:nome)";
    $result = $pdo->prepare($sql);
    $result -> bindValue(":nome", $nome);
    $result->execute();

    header("Location: ../homePage/catego.php?nome_categoria=$nome&sucesso=ok");
    }

