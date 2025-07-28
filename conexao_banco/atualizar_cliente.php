<?php 
require_once 'conexao.php';

$conexao = conectarBanco();

//Obtendo o ID via GET
$idCliente = $_GET['id']?? null;
$cliente = null;
$msgErro = "";

// função local para buscar cliente por ID
function buscarClientePorId($idCliente, $conexao){
    $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente =:id");
    $stmt->bindParam(":id",$idCliente, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

//Se um ID foi enviado, busca o cliente no banco
if($idCliente && is_numeric($idCliente)){
    $cliente = buscarClientePorId($idCliente, $conexao);
    if(!$cliente){
        $msgErro = "Erro: Cliente não encontrado.";
    }else{
        $msgErro = "Digite o ID do cliente para buscar os dados.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <script>
        function habilitarEdicao(campo){
            document.getElementByid(campo).removeAttribute("readonly");
        }
    </script>
</head>
<body>
    <h2>Atualizar Cliente</h2>
    <!-- se houver erro,exibe a mensagem e o campo de busca -->
     <?php if($msgErro):?>
        <p style="color:red;"><? htmlspecialchars($msgErro)?></p>
        <form action = "atualizarCliente.php" method = "GET">
            <label for="id">ID do cliente:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Buscar</button>
        </form>

<!-- se um cliente foi encontrado, exibe o fumulário preenchido -->
 <form action="processarAtualizacao.php" method="POST">
    <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente['id_cliente'])?>">
    <label for="nome">Nome:</label>
    <input type="text" id="endereco" name="endereco" value="<?=htmlspecialchars($cliente['endereco'])?>" readonlyonclick="habilitarEdicao('endereco')">

    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" value="<?=htmlspecialchars($cliente['endereco'])?>" readonlyonclick="habilitarEdicao('endereco')">

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?=htmlspecialchars($cliente['email'])?>" readonlyonclick="habilitarEdicao('email')">




</body>
</html>