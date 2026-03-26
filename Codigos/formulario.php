<?php



include_once('config.php');


if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha, telefone, sexo, data_nasc, cidade, estado, endereco) VALUES ('$nome', '$email', '$senha', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco')");
    
    // Redireciona para a página de login
header("Location: login.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="../imagens/icon.png">
    <script src="olho.js" defer></script>
    <title>Cadastro |TF</title>
      
</head>
<body>
    <div class="box">
        <form action="formulario.php" method="POST"> 
            <fieldset>
                <legend><h1>Cadastro</h1></legend>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser2" placeholder=" " required />
                    <label for="email" class="labelInput">Email</label>
                </div>

                <br>
                
                <div class="inputBox">
                  
                  <input type="password" name="senha" id="senha" class="inputUser" required>
                  <label for="senha" class="labelInput">Senha</label> <img src="eye-slash.svg" id="showPasswordBtn" onclick="togglePasswordVisibility()" alt="Mostrar senha">
</div>

<br>

                <input type="submit" name="submit" id="submit" value="Enviar">
                <br><br>
                
                <p><a href="login.php" id="jaTenhoConta">Já tenho conta? Faça login.</a></p>

                

                <p>&copy; 2024 Teen Finance. Todos os direitos reservados.</p>
                
            </fieldset> 
            

        </form>
    </div>
</body>
</html>