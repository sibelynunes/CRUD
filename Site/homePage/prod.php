<?php
    session_start();
    require('../connect.php');
    $sql = "SELECT * FROM produto";
    $result = $pdo->query($sql);
    $result->execute();
    $produtos = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php
                if(isset($_GET['sucesso'])){
                  $nomeProduto = $_GET['nome_produto'];
            ?>
                    <div class="container mt-5">
                        <div class="alert alert-success">
                            Produto '<?php echo $nomeProduto;?>' cadastrado com sucesso!
                        </div>
                    </div>
            <?php
                 }
            ?>
            <a href="formProdutos.php" class="btn btn-primary">Cadastro do Produto</a>
            <?php
                if(count($produtos) > 0){
            ?>
        </div>
    </div>
    <h2 class="text-center">Lista de Produtos</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">ID da Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($produtos as $produto){
                        echo "<tr>";
                        echo "<td>". $produto['idproduto']."</td>";
                        echo "<td>". $produto['nome']."</td>";
                        echo "<td>". $produto['valor']."</td>";
                        echo "<td>". $produto['quantidade']."</td>";
                        echo "<td>". $produto['categoria_idcategoria']."</td>";
                        echo "<td>";
                        echo "<form method='post' action='../verificar/delete.php'>";
                        echo "<input type='hidden' name= 'idproduto' value= '" . $produto['idproduto'] ."'>";
                        echo "<input type='hidden' name= 'nome' value= '" . $produto['nome'] ."'>";
                        echo "<button class='btn btn-danger' type='submit'>Deletar</button>";
                        echo "<a class='btn btn-primary' href='editProdutoForm.php?id=$produto[idproduto]'>Editar</a>";
                        echo "</form>";
                        echo "</td></tr>";
                    }
                ?>
                </tbody>
            </table>
            <?php
                }else{
                    echo "<h1 class='text-center'>Você não tem nenhum produto cadastrado.</h1>";
                }
            ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
