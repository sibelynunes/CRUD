<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
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



<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <a href="prod.php" class="white-link text-white">
                        <h5 class="card-title">Produtos</h5>
                    </a>
                    <p class="card-text ">Quantidade: </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <a href="catego.php" class="white-link text-white">
                        <h5 class="card-title ">Categorias</h5>
                    </a>
                    <p class="card-text">Quantidade: </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
