<?php
require '../connect.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT produto.*, categoria.nome AS nome_categoria 
            FROM produto 
            INNER JOIN categoria ON produto.categoria_idcategoria = categoria.idcategoria 
            WHERE produto.idproduto = :id";
    $result = $pdo->prepare($sql);
    $result->bindValue(':id', $id);
    $result->execute();
    $resultFinal = $result->fetch(PDO::FETCH_ASSOC);

    if ($result->rowCount() > 0) {
        $categoria = $resultFinal['nome_categoria'];
        $nome = $resultFinal['nome'];
        $valor = $resultFinal['valor'];
        $quantidade = $resultFinal['quantidade'];
        $categoria_id = $resultFinal['categoria_idcategoria'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .custom-card {
          background: rgba(255, 255, 255, 0.2);
          border-radius: 16px;
          box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
          backdrop-filter: blur(5px);
          -webkit-backdrop-filter: blur(5px);
          border: 1px solid rgba(255, 255, 255, 0.3);
            margin: 0 auto;
            margin-top: 50px; 
            width: 400px; 
            border-radius: 10px;
            padding: 20px; 
        }

        body{
          background: linear-gradient(153deg, rgba(254,215,208,1) 0%, rgb(54, 178, 176) 87%);
          height: 100vh;

        }
    </style>
</head>
<body>
<div class="card custom-card">
    <div class="card-body">
        <form method="post" action="../verificar/editProduto.php">
            <h2 class="text-center">Editar Dados do Produto</h2>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite o nome do produto" value="<?php echo $nome;?>">
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" name="valor" placeholder="Digite o valor do produto" value="<?php echo $valor; ?>">
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade de produtos" value="<?php echo $quantidade; ?>">
            </div>
            <div class="form-group">
                <label for="c">Categoria</label>
                <select name="categoria" id="c" class="form-control mt-3">
                    <?php
                    require '../connect.php';
                    $sql = "SELECT * FROM categoria";
                    $resultado = $pdo->prepare($sql);
                    $resultado->execute();
                    $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($categorias as $categoria){
                        $selected = ($categoria['idcategoria'] == $categoria_id) ? 'selected' : '';
                        echo "<option value='" . $categoria['idcategoria'] . "' $selected>" . $categoria['nome']. "</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <button name="update" type="submit" class="btn btn-primary btn-block">Atualizar</button>
        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
