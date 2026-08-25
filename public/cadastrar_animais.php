<?php

include "../infra/conexao.php";

$sql = "SELECT * FROM usuarios ORDER BY nome";
$usuarios = $conexao->query($sql);

?>