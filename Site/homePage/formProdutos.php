<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario produtos</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="post" action="../verificar/cadastraprod.php">
    <h2>Cadastrar Produtos</h2>
  <div class="form-group">
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1">Nome</label>
    <input type="text" class="form-control" name="nome" placeholder="Digite o nome do produto">
  </div>
  </div>
  <div class="form-group">
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1">Valor</label>
    <input type="number" class="form-control" name="valor" placeholder="Digite o valor do produto">
  </div>
  </div>
  <div class="form-group">
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1">Quantidade</label>
    <input type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade de produtos">
  <select name="categoria" id="c">
  <?php
  require '../connect.php';
  $sql = "SELECT * FROM categoria";
  $resultado = $pdo->prepare($sql);
  $resultado->execute();
  $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($categorias as $categoria){
  
  
    echo "<option value ='" . $categoria['idcategoria'] . "'>" . $categoria['nome']. "</option>";
  
  }
  
  
  ?>
  </select>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Enviar</button>
  </div>
 

</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>