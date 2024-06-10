<?php
require '../connect.php';
// var_dump($_POST['idproduto']);
// var_dump($_POST['nome']);
var_dump($_POST);
if(isset($_POST['idproduto'])){
    $nome = $_POST['nome'];
    $idproduto = $_POST['idproduto'];

    $sql = "DELETE FROM produto WHERE idproduto = :idproduto";
    $result = $pdo->prepare($sql);
    $result->bindValue(':idproduto', $idproduto);
    $result->execute();
    header ('Location: ../homePage/prod.php');
}