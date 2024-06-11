<?php
require '../connect.php';
if(isset($_POST['submit'])){
if(
isset($_POST['nome'])&& !empty($_POST['nome'])
    ){
    $nome = $_POST['nome'];
    $sql = "INSERT INTO categoria(nome) VALUES(:nome)";
    $result = $pdo ->prepare($sql);
    $result -> bindValue(":nome", $nome);
    $result->execute();

    header("Location: ../homePage/prod.php?nome_produto=$nome&sucesso=ok");
    }
}
