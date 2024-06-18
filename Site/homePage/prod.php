<?php
    session_start();
    require('../connect.php');
    $sql = "SELECT produto.*, categoria.nome AS nome_categoria 
    FROM produto 
    JOIN categoria ON produto.categoria_idcategoria = categoria.idcategoria";
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
    <style>
    #topo {
        background-color: #ffcdbd;
    }
    </style>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="../img/wilma.png" width="30" height="30" class="d-inline-block align-top" alt=""> Wilma Decorações
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link white-link" href="index.php">inicio</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item white-link" href="prod.php">Todos os produtos</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link white-link" href="catego.php">Categorias</a>
      </li>
    </ul>
        <div class="col-md-6 text-right">
            <div class="button-container">
                <a class="btn btn-danger" href="../login/login.php">Sair</a>
            </div>
        </div>
    </div>
</div>
  </div>
</nav>
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary mb-3" href="formProdutos.php">Cadastrar produto</a>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                if(isset($_GET['sucesso'])){
            ?>
                <div class="container mt-5">
                    <div class="alert alert-success">
                        Produto cadastrado com sucesso!
                    </div>
                </div>
                <?php
                 }
            ?>
                <?php
        if (isset($_GET['editar'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    Produto editado com sucesso!
                </div>
                <?php
        }
        ?>
                <?php
                if(count($produtos) > 0){
            ?>
            </div>
        </div>
        <div class="d-flex flex-row mt-5 justify-content-between">
        <h2 class="text-center">Lista de Produtos</h2>
        <a href="formProdutos.php" class="btn btn-primary">Cadastro do Produto</a>
        </div>
      
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead id="">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Nome da Categoria</th>
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
                        echo "<td>". $produto['nome_categoria']. "</td>";
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>
</html>