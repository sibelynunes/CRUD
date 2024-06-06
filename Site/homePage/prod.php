<?php
session_start();
require('../connect.php');
$sql = "SELECT * FROM produto";
$result = $conexao -> query($sql);
$result ->execute();
$produtos = $result->fetchAll (PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class ="container">
  <div class="row">
  <div class="col-md-6" >
    <a class="bnt bnt-primary" href="formProdutos.php">Add</a>
    <?php
       if(count($produtos) > 0){
       ?>
  </div>
  </div>
  <h2>lista de produtos</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">idproduto</th>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
      <th scope="col">Quantidade</th>
      <th scope="col">categoria_idcategoria</th>
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
       echo "</tr>";
    }
    ?>
    </div>
    </tbody>
  
</table>
<?php
  }else{
        echo"<h1>Você não tem nenhum produto cadastrado.";
       }
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>