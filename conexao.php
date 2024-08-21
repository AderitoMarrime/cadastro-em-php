<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nome_bd = "cadastro";

    try {
        $conexao = mysqli_connect($servidor, $usuario, $senha, $nome_bd);
    } 
    catch(mysqli_sql_exception) {
        echo "<script> alert('Nao foi possivel conectar a base de dados')</script>";
    }

?>