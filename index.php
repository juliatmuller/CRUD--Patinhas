<?php

include "infra/conexao.php";
$clientes = mysqli_query($conexao, "SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Patinhas</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <main>
        <h1>~ Sistema de Cadastro ~</h1>
        
            <a href="public/cadastrar_clientes.php">Cadastrar Cliente</a>
            <br>
   <br>

        
            <a href="public/cadastrar_animais.php">Cadastrar Animal</a>
            <br>
   <br>

               <a href="public/visualizar_cadastros.php">Visualizar Cadastros</a>
            <br>


 
        

    </main>
    <footer>

    </footer>


</body>

</html>