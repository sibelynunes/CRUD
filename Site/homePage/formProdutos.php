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
        <form method="post" action="../verificar/cadastraprod.php" class="needs-validation" novalidate>
    <h2 class="text-center">Cadastrar Produtos</h2>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome do produto" required>
        <div class="invalid-feedback">
            Por favor, insira um nome válido.
        </div>
    </div>
    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="number" class="form-control" name="valor" id="valor" placeholder="Digite o valor do produto" required>
        <div class="invalid-feedback">
            Por favor, insira um valor válido.
        </div>
    </div>
    <div class="form-group">
        <label for="quantidade">Quantidade</label>
        <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Digite a quantidade de produtos" required>
        <div class="invalid-feedback">
            Por favor, insira uma quantidade válida.
        </div>
    </div>
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria" class="form-control mt-3" required>
            <option value="">Escolha uma categoria...</option>
            <?php
            require '../connect.php';
            $sql = "SELECT * FROM categoria";
            $resultado = $pdo->prepare($sql);
            $resultado->execute();
            $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

            foreach($categorias as $categoria){
                echo "<option value='" . $categoria['idcategoria'] . "'>" . $categoria['nome']. "</option>";
            }
            ?>
        </select>
        <div class="invalid-feedback">
            Por favor, selecione uma categoria.
        </div>
    </div>
    <button name="submit" type="submit" class="btn btn-primary btn-block">Enviar</button>
    <a href="homePage/prod.php" class="btn btn-secondary btn-block">Cancelar</a>
</form>



        </div>
    </div>
    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
