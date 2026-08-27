<?php

include "../infra/conexao.php";

$sql = "SELECT * FROM clientes ORDER BY nome";
$clientes = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Animal</title>

</head>

<body>

<main>
<?php if (isset($_GET["sucesso"])) { ?>
    <h2>Animal cadastrado com sucesso!</h2>
    <a href="../index.php">
        <button>Voltar para o início</button>
    </a>

<?php } else { ?>

    <h1>~ Cadastre um novo animal ~</h1>

    <form action="cadastrar.php" method="POST">
       <input type="hidden" name="tipo" value="animais">

        <label>Nome do Animal:</label>
        <input type="text" name="nome_animal" required>
        <br>
<br>
        <label>Espécie:</label>
        <input type="text" name="especie" required>
        <br>
<br>
        <label>Raça:</label>
        <input type="text" name="raca" required>
        <br>
<br>
        <label>Idade:</label>
        <input type="number" name="idade" required>
        <br>
<br>
        <label>Usuário:</label>

        <select name="usuario_id" required>
            <option value="">Selecione um usuário</option>
            <?php while ($cliente = $clientes->fetch_assoc()) { ?>
            
                <option value="<?= $cliente["id"] ?>">
                    <?= htmlspecialchars($cliente["nome"]) ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <br>
        
        <button type="submit">
            Cadastrar
        </button>
    </form>
<br>
    <a href="../index.php">
        <button type="button">
            Voltar para o início
        </button>
    </a>

<?php } ?>

</main>
</body>
</html>
