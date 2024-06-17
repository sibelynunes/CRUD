<?php
require "../connect.php";

if (
    isset($_POST['idcategoria']) && !empty($_POST['idcategoria']) && 
    isset($_POST['nome']) && !empty($_POST['nome'])
) {
    $idcategoria = $_POST['idcategoria'];
    $nome = $_POST['nome'];

    $sql = "UPDATE categoria SET nome = :nome WHERE idcategoria = :idcategoria"; // Correção aqui
    $resultado = $pdo->prepare($sql);
    $resultado->bindValue(":idcategoria", $idcategoria);
    $resultado->bindValue(":nome", $nome);
    $resultado->execute();


    header("Location: ../homePage/catego.php?nome_catego=$nome&editar=ok");

}
?>
