<?php

$endereco = "locahost";
$usuario = "root";
$senha = "";
$banco = "empresa";
try
{
    $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND =>))

}
?>