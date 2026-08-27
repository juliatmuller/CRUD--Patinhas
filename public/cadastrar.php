<?php

include "../infra/conexao.php";

$tipo = $_POST["tipo"] ?? "";


/* CADASTRAR USUÁRIO */

if ($tipo == "clientes") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    

    $sql = "INSERT INTO clientes (nome, email, telefone, endereco)
            VALUES (?, ?,?,?)";

 if (empty($nome) || empty($email) || empty($telefone) || empty($endereco)) {
        die("Preencha todos os campos.");
    }

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("ssss", $nome, $email, $telefone, $endereco);

    $stmt->execute();

    header("Location: cadastrar_clientes.php?sucesso=1");
    exit();
}


/* CADASTRO DE ANIMAL*/

if ($tipo == "animais") {

   $nome = $_POST["nome_animal"] ?? "";
    $especie = $_POST["especie"] ?? "";
    $raca = $_POST["raca"] ?? "";
    $idade = $_POST["idade"] ?? "";
    $usuario_id = $_POST["usuario_id"] ?? "";

    if (
        $nome == "" ||
        $especie == "" ||
        $raca == "" ||
        $idade === "" ||
        $usuario_id == ""
    ) {
        die("Preencha todos os campos.");
    }

    $sql = "INSERT INTO animais (nome, especie, raca, idade, usuario_id)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param( "sssii", $nome, $especie, $raca, $idade, $usuario_id);

    $stmt->execute();
    
    header("Location: cadastrar_animais.php?sucesso=1");
    exit();
}

?>