<?php
session_start();
include_once('config.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta ao banco para verificar as credenciais
    $result = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1");

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifica se a senha fornecida corresponde à senha armazenada
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['user'] = $user['nome'];
            header("Location: ../Html/site.html"); // Redireciona para uma página protegida
            exit;
        } else {
            // Se a senha estiver incorreta
            $errorMessage = "Senha incorreta";
        }
    } else {
        // Se o usuário não for encontrado
        $errorMessage = "Usuário não encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="../imagens/icon.png">
    <script src="olho.js" defer></script>

    <title>Login | TK</title>
</head>
<body>
<section>
    <div class="box">
        <form action="login.php" method="POST">
            <fieldset>
                <legend><h1>Login</h1></legend>


                <div class="inputBox">
    <input type="email" name="email" id="email" class="inputUser2" placeholder=" " required />
    <label class="labelInput" for="email">Email</label>
</div>

                <br><br>

                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label><img src="../imagens/eye-slash.svg" id="showPasswordBtn" onclick="togglePasswordVisibility()" alt="Mostrar senha">
                </div>
                
              
                
                <!-- Mensagem de erro (visível quando houver erro) -->
                <div class="error-message <?php if(isset($errorMessage)) echo 'visible'; ?>">
                  <?php if(isset($errorMessage)) echo $errorMessage; ?> 
                  </div>
                
                <br>

                <input type="submit" name="login" id="login" value="Entrar">
                
                <br><br>

                <p><a href="formulario.php" id="naoTenhoConta">Não tem conta? Cadastre-se.</a></p>
                
                </fieldset>
            </form>
        </section>
    </div>
</body>
</html>