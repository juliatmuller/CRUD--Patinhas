<?php

$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "patinhas_seguras";

$conexao = new mysqli ($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na coexão com o banco: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");
