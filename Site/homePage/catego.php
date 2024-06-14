<?php
session_start();
require('../connect.php');
$sql = "SELECT * FROM categoria";
$result = $pdo -> query($sql);
$result ->execute();
$categorias = $result->fetchAll (PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class ="container">
  <div class="row">
  <div class="col-md-6" >
    <?php
    if(isset($_GET['sucesso'])){
      $nomeCategoria = $_GET ['nome_categoria'];
    ?>
    <div class="container mt-5">
    <div class="alert alert-success">
      categoria '<?php echo $nomeCategoria;?>' cadastro com sucesso!
    </div>
    <?php
     }
    ?>
    </div>
    
    <a class="bnt bnt-primary" href="formcategoria.php">cadastrar categoria</a>
    <?php
       if(count($categorias) > 0){
       ?>
  </div>
  </div>
  <h2>lista de Categorias</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">idcategoria</th>
      <th scope="col">Nome</th>
    </tr>
  </thead>
    <tbody> 
    <?php
    foreach($categorias as $categoria){
    echo "<tr>";
    echo "<td>". $categoria['idcategoria']."</td>";
    echo "<td>". $categoria['nome']."</td>";
    echo "<td>";
    echo "<form method='post' action='../verificar/deleteCatego.php'>
    <input type='hidden' name= 'idcategoria' value= '" . $categoria['idcategoria'] ."'>
    <input type='hidden' name= 'nome' value= '" . $categoria['nome'] ."'>
    <button class='btn btn-danger' type='submit'>Deletar</button>
    <a class='btn btn-primary' href='editCategoriaForm.php?id=$categoria[idcategoria]'>Editar</a>
    </form>
    </td></tr>";
 }
  ?>
    </div>
    </tbody>
</table>
<?php
  }else{
        echo"<h1>Você não tem nenhuma categoria cadastrada.";
       }
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>