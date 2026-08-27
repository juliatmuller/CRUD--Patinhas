<?php 
include "../infra/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Clientes</title>

</head>

<body>
 

<main>
    <?php if (isset($_GET["sucesso"])) { ?>

    <h2>Cliente cadastrado com sucesso!</h2>

    <a href="../index.php">
        <button type="button">Voltar para o início</button>
    </a>

<?php } else { ?>

<h1> ~ Cadastrar Cliente ~
</h1>

    <form action="cadastrar.php" method="POST">

        <input type="hidden" name="tipo" value="clientes">

        <label for="nome">Nome:</label>
    <input type="text"  name="nome" id="nome" required >
    <br>
    <br>

       <label for="email">Email:</label>
    <input type="text"  name="email" id="email" required >
    <br>
    <br>

        <label for="telefone">Telefone:</label>
    <input type="tel"  name="telefone" id="telefone" placeholder="(00) 00000-0000" required >
    <br>
    <br>


     <label for="endereco">Endereço:</label>
    <input type="text"  name="endereco" id="endereco" required >
    <br>
  <br>
    



    <button type="submit">Cadastrar</button>

      </form>

    <br>
  


    <a href="../index.php">  <button type="button"> Voltar para o início</button> </a>

<?php } ?>

</main>
</body>
</html>