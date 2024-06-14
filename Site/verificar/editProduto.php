<?php
require "../connect.php";

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $categoria_id = $_POST['categoria'];

    $resultChecar = "SELECT idcategoria FROM categoria WHERE idcategoria = :categoria_id";
    $resultChecar = $pdo->prepare($resultChecar);
    $resultChecar->bindValue(':categoria_id', $categoria_id);
    $resultChecar->execute();

    if($resultChecar->rowCount() > 0){
        $sql = "UPDATE produto SET nome = :nome, valor = :valor, quantidade = :quantidade, categoria_idcategoria = :categoria_id WHERE idproduto = :id";
        $result = $pdo->prepare($sql);
        $result->bindValue(':nome', $nome);
        $result->bindValue(':valor', $valor);
        $result->bindValue(':quantidade', $quantidade);
        $result->bindValue(':categoria_id', $categoria_id);
        $result->bindValue(':id', $id);
        $result->execute();
    header('Location: ../homePage/prod.php?nome_prod=$nome&editar=ok');
        exit();
    } else {
        echo "A categoria selecionada não existe";
    }
} else {
    echo "Dados do formulário não foram recebidos corretamente";
}
?>
