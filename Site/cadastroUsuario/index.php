<?php
    require '../connect.php';
    function mostrarAlerts($title, $message, $icon, $redirect) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '$title',
                    text: '$message',
                    icon: '$icon'
                }).then(function() {
                    window.location.href = '$redirect';
                });
            });
        </script>";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
            $stmt->execute(['nome' => $nome, 'email' => $email,'senha' => $senha]);

            if($stmt->rowCount() > 0){
                mostrarAlerts('Sucesso!', 'Usuário criado com sucesso.', 'success', '../login/login.php');
            }else{
                mostrarAlerts('Erro!', 'Dados inválidos.', 'error', 'index.php');
            }

        }else{
            mostrarAlerts('Atenção!', 'Por favor, preencha todos os campos.', 'warning', 'index.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="./node_modules/parsleyjs/src/parsley.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .parsley-errors-list {
            list-style-type: none;
            color: red;
            margin: 0px;
            padding: 0px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="box-login">
        <div class="box-login-left">
            <img src="../img/wilma.png" class="box-img">
            <div class="box-title">
                <p class="title">Bem vindos a Wilma decorações.</p>
                <p class="subtitle">Criando momentos e memórias com toda a criatividade e dedicação, com um toque de personalidade e estilo de nossos clientes.</p>
        </div>
        </div>
        <div class="box-login-right">
            <form action="" class="box-form" method="POST" data-parsley-validate>
                
                <h1>Cadastro</h1>
                <div class="box-input">
                    <label for="Nome">Digite seu Nome:*</label>
                    <input type="text" name="nome" placeholder="Nome" required  required data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="O campo deve conter apenas letras.">
                </div>
                <div class="box-input">
                    <label for="usuario">Digite seu Email:*</label>
                    <input type="email" name="email" placeholder="E-mail" required data-parsley-type="email">   
                </div>
                <div class="box-input">
                    <label for="Senha">Digite Sua Senha:*</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required data-parsley-minlength="6" data-parsley-maxlength="12">
                </div>
                <div class="box-input">
                    <label for="usuario">Confirme Sua Senha:*</label>
                    <input type="password" name="confirmar-senha" placeholder="Repita sua Senha" required data-parsley-equalto="#senha" data-parsley-equalto-message="Digite as senha iguais.">
                </div>
                <div class="button-container">
                    <button class="btn-login" type="submit" value="Enviar">Cadastrar</button>
                </div>
                <div class="text-register">
                    <p>Ja tem uma conta? <a href="../login/login.php" class="text-link">Login</a>.</p>
                </div>
            </form>
        </div>
    </div>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="../node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
