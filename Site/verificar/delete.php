<?php
require '../connect.php';
if(isset($_POST['idproduto'])){
    $nome = $_POST['nome'];
    $idproduto = $_POST['idproduto'];

    $sql = "DELETE FROM produto WHERE idproduto = :idproduto";
    $result = $pdo->prepare($sql);
    $result->bindValue("idproduto", $idproduto);
    $result->execute();
    header ('Location: ../homePage/prod.php');
} else{
    echo"oi";
}
