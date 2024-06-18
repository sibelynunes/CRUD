<?php
require '../connect.php';


if (isset($_GET['id'])) {
    $idcategoria = $_GET['id'];


    $sql = "SELECT nome FROM categoria WHERE idcategoria = :idcategoria";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':idcategoria', $idcategoria);
    $stmt->execute();

    
    if ($stmt->rowCount() > 0) {
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $categoria['nome'];
    } else {
    
        echo "Categoria não encontrada.";
    
    }
} else {
    echo "ID da categoria não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Categoria</title>
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
        <form method="post" action="../verificar/editCategoria.php" class="needs-validation" novalidate>
    <h2 class="text-center">Editar Dados da Categoria</h2>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da categoria" value="<?php echo htmlspecialchars($nome ?? ''); ?>" required>
        <div class="invalid-feedback">
            Por favor, insira um nome válido.
        </div>
    </div>
    <input type="hidden" name="idcategoria" value="<?php echo $idcategoria; ?>">
    <button name="update" type="submit" class="btn btn-primary btn-block">Atualizar</button>
    <a href="catego.php" class="btn btn-secondary btn-block">Cancelar</a>

</form>
        </div>
    </div>
        <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>
</body>
</html>
