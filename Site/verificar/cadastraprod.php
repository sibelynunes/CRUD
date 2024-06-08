<?php
require '../connect.php';
if(isset($_POST['submit'])){
if(
isset($_POST['nome'])&& !empty($_POST['nome'])&& 
isset($_POST['valor'])&& !empty($_POST['valor']) &&
isset($_POST['quantidade'])&& !empty($_POST['quantidade'])
    ){
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $sql = "INSERT INTO produto(nome,valor,quantidade) VALUES(:nome, :valor, :quantidade)";
    $result = $pdo ->prepare($sql);
    $result -> bindValue(":nome", ":nome");
    $result -> bindValue(":valor", ":valor");
    $result -> bindValue(":quantidade", ":quantidade");
    $result->execute();

    header("Location: ../homePage/prod.php?nome_produto=$nome&sucesso=ok");
    }
}
