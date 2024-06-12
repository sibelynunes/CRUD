<?php
require '../connect.php';
if(
isset($_POST['nome']) && !empty($_POST['nome'])&& 
isset($_POST['valor']) && !empty($_POST['valor']) &&
isset($_POST['quantidade']) && !empty($_POST['quantidade'])&&
isset($_POST['categoria']) && !empty($_POST['categoria'])

    ){
        var_dump("oi");
    $categoria = $_POST['categoria'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    echo $nome;
    echo $categoria;
    $sql = "INSERT INTO produto(nome,valor,quantidade, categoria_idcategoria) VALUES(:nome, :valor, :quantidade, :categoria_idcategoria)";
    $result = $pdo->prepare($sql);
    $result -> bindValue(":nome", $nome);
    $result -> bindValue(":valor", $valor);
    $result -> bindValue(":quantidade", $quantidade);
    $result -> bindValue(":categoria_idcategoria", $categoria);
    $result->execute();
        
    header('Location: ../homePage/prod.php?nome_produto=$nome&sucesso=ok');
    } ;
    

