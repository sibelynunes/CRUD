<?php
    session_start();
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["email"]) && isset($_POST["senha"])) {
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $_SESSION["email"] = $_POST["email"];

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
            $stmt->execute([$email, $senha]);

            if ($stmt->rowCount() > 0) {
                mostrarAlerts('Sucesso!', 'Login realizado com sucesso.', 'success', '../homePage/index.php');
            } else {
                mostrarAlerts('Erro!', 'Dados inválidos.', 'error', 'login.php');
            }
        } else {
            mostrarAlerts('Atenção!', 'Por favor, preencha todos os campos.', 'warning', 'login.php');
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
    <title>login</title>
    <style>
        .parsley-errors-list {
            list-style-type: none;
            color: red;
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
            <form action="" method="POST" class="box-form" data-parsley-validate>
                <h1>Login</h1>
                <div class="box-input">
                    <label for="usuario">Digite seu Email:*</label>
                    <input type="email" name="email" placeholder="E-mail" required data-parsley-type="email">
                </div>
                <div class="box-input">
                    <label for="usuario">Digite sua Senha:*</label>
                    <input type="password" name="senha" placeholder="Senha" id="senha" required data-parsley-minlength="6" data-parsley-maxlength="12">
                </div>
                <div class="box-checkbox">
                    <div class="checkbox">
                        <input type="checkbox" id="mostrarsenha" name="mostrarSenha" value="mostrar">
                        <label >Mostrar Senha</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox"  name="lembrarSenha" value="lembrar">
                        <label >Lembrar Senha</label>
                    </div>
                </div>
                <div class="button-container">
                    <button class="btn-login" type="submit" value="Enviar">Entrar</button>
                </div>
                <div class="text-register">
                    <p>Não tem uma conta? <a href="../cadastroUsuario/index.php" class="text-link">Cadastre-se</a>.</p>
                </div>
            </form>
        </div>
    </div>
    <script>
        const checkbox = document.getElementById('mostrarsenha');
        const senha = document.getElementById('senha');

        checkbox.addEventListener('change', function(){
            if(this.checked){
                senha.type = 'text';
            }else{
                senha.type = 'password';
            }
        });
        
    </script>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="../node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>