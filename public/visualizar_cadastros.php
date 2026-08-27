<?php

include "../infra/conexao.php";

// Clientes para colocar no filtro

$clientes = mysqli_query(
    $conexao,
    "SELECT * FROM clientes ORDER BY nome"
);

// Verifica se algum cliente foi selecionado

$usuario_id = $_GET["usuario_id"] ?? "";

// Se escolheu um cliente, mostra somente os animais dele

if ($usuario_id != "") {

    $sql = "SELECT animais.*, clientes.nome AS usuario_nome
            FROM animais
            INNER JOIN clientes
            ON animais.usuario_id = clientes.id
            WHERE animais.usuario_id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("i", $usuario_id);

    $stmt->execute();

    $animais = $stmt->get_result();

} else {

    // Se nenhum cliente foi escolhido, mostra todos os animais

    $sql = "SELECT animais.*, clientes.nome AS usuario_nome
            FROM animais
            INNER JOIN clientes
            ON animais.usuario_id = clientes.id";

    $animais = mysqli_query($conexao, $sql);

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciar Animais</title>

    <link rel="stylesheet" href="../style/style.css">

</head>

<body>


<main>

    <h1>~ Animais por cliente ~</h1>

    <!-- FILTRO -->

    <form method="GET">

        <label for="usuario_id">

            Escolha um cliente:

        </label>

        <select name="usuario_id" id="usuario_id">

            <option value=""> Todos os clientes </option>

            <?php while ($cliente = mysqli_fetch_assoc($clientes)): ?>

                <option
                    value="<?= $cliente["id"] ?>"
                    <?= ($usuario_id == $cliente["id"]) ? "selected" : "" ?>>

                    <?= htmlspecialchars($cliente["nome"]) ?>

                </option>

            <?php endwhile; ?>

        </select>

        <button type="submit">

            Filtrar

        </button>

    </form>

    <br>

    <!-- TABELA -->

    <table border="1">

        <thead>

            <tr>

                <th>ID</th>

                <th>Cliente</th>

                <th>Nome do Animal</th>

                <th>Espécie</th>

                <th>Raça</th>

            </tr>

        </thead>

        <tbody>

            <?php while ($animal = mysqli_fetch_assoc($animais)): ?>

                <tr>

                    <td>

                        <?= $animal["id"] ?>

                    </td>

                    <td>

                        <?= htmlspecialchars($animal["usuario_nome"]) ?>

                    </td>

                    <td>

                        <?= htmlspecialchars($animal["nome"]) ?>

                    </td>

                    <td>

                        <?= htmlspecialchars($animal["especie"]) ?>

                    </td>

                    <td>

                        <?= htmlspecialchars($animal["raca"]) ?>

                    </td>

            

                </tr>

            <?php endwhile; ?>

        </tbody>

    </table>

    <br>

    <a href="../index.php">

        <button type="button">

            Voltar para o início

        </button>

    </a>

</main>

</body>

</html>