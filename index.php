<?php 
    require("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <h1>Cadastro</h1>
        <div class="primeira">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div class="segunda">
            <input type="submit" value="Cadastrar" name="cadastrar">
        </div>
    </form>
</body>
</html>

<?php
    if (isset ($_POST['cadastrar'])) {
        $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (!empty($usuario) && !empty($senha)) {

            $sql = "INSERT INTO usuarios (nome_de_usuario, senha) VALUES ('$usuario','$senha')";

            try {
                mysqli_query($conexao, $sql);
                echo"<script> alert('usuario cadastrado com sucesso')</script>";
            }

            catch(mysqli_sql_exception) {
                echo"<script> alert('O nome de usuario {$usuario} esta indisponivel, tente outro')</script>";
            }

        } else {
            echo"<script> alert('preencha todos os campos')</script>";
        }
    }

    mysqli_close($conexao);
?>