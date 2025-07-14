<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Completo com GET</title>
</head>
<body>
<form method="GET" action="form_02_get_externo.php">
        <label>Nome</label>
        <input type="text" name="nome"/>

        <label>Idade</label>
        <input type="number" name="idade"/>

        <input type="submit" value="Enviar"/>
</form>
<?php 
    if(isset($_GET['nome']) && isset($_GET['idade'])){
        echo "Recebido o cliente: ".$_GET['nome'];
        echo " que tem ".$_GET['idade']. " anos";
    }
?>
<center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>

    
</body>
</html>