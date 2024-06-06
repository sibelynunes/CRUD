<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario produtos</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form>
    <h2>Cadastrar Produtos</h2>
  <div class="form-group">
  <div class="col-md-4 mb-3">
    <label for="exampleInputEmail1">idproduto</label>
    <input type="number" class="form-control" id="id" aria-describedby="idlHelp" placeholder="Digite o id do produto">
  </div>
  </div>
  <div class="form-group">
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1">Nome</label>
    <input type="text" class="form-control" id="nome" placeholder="Digite o nome do produto">
  </div>
  </div>
  <div class="form-group">
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1">Valor</label>
    <input type="number" class="form-control" id="valor" placeholder="Digite o valor do produto">
  </div>
  </div>
  <div class="form-group">
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1">Quantidade</label>
    <input type="number" class="form-control" id="quantidade" placeholder="Digite a quantidade de produtos">
  </div>
  </div>
  <div class="form-group">
  <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1">Categoria</label>
    <input type="text" class="form-control" id="categoria" placeholder="Digite a categoria do produto">
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>