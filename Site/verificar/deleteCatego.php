<?php
require '../connect.php';
var_dump($_POST);
if(isset($_POST['idcategoria'])){
    $idcategoria = $_POST['idcategoria'];

    $sql = "DELETE FROM categoria WHERE idcategoria = :idcategoria";
    $result = $pdo->prepare($sql);
    $result->bindValue(':idcategoria', $idcategoria);
    $result->execute();
    header ('Location: ../homePage/catego.php');
}