<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="container">
        <?php
        session_start();
        require('../connect.php');
        $sql = "SELECT * FROM categoria";
        $result = $pdo->query($sql);
        $result->execute();
        $categorias = $result->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php if(isset($_GET['sucesso'])): ?>
            <div class="alert alert-success">
                Categoria '<?php echo $_GET['nome_categoria']; ?>' cadastrada com sucesso!
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary mb-3" href="formcategoria.php">Cadastrar categoria</a>
            </div>
        </div>

        <h2 class="text-center mb-3">Lista de Categorias</h2>

        <?php if(count($categorias) > 0): ?>
            <table class="table">
                <thead class="color-">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach($categorias as $categoria): ?>
                        <tr>
                            <td><?php echo $categoria['idcategoria']; ?></td>
                            <td><?php echo $categoria['nome']; ?></td>
                            <td>
                                <form method="post" action="../verificar/deleteCatego.php">
                                    <input type="hidden" name="idcategoria" value="<?php echo $categoria['idcategoria']; ?>">
                                    <input type="hidden" name="nome" value="<?php echo $categoria['nome']; ?>">
                                    <button class="btn btn-danger" type="submit">Deletar</button>
                                    <a class="btn btn-primary" href="editCategoriaForm.php?id=<?php echo $categoria['idcategoria']; ?>">Editar</a>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h1>Você não tem nenhuma categoria cadastrada.</h1>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
