<?php
    require_once 'conexao_pdo.php';

    $conexao = conectarBanco();

    //Obtendo o ID via GET
    $idCliente = $_GET['id'] ?? null;
    $cliente = null;
    $msgErro = "";

    //Função local para buscar cliente por ID
    function buscarClientePorId($idCliente, $conexao) {
        $stmt = $conexao->prepare("Select id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
        $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    //Se um ID foi enviado, busca o cliente no banco
    if($idCliente && is_numeric($idCliente)){
        $cliente = buscarClientePorId($idCliente, $conexao);

        if(!$cliente){
            $msgErro = "Erro: Cliente não encontrado.";
        }
    } else{
        $msgErro = "Digite o ID do cliente para buscar os dados.";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Atualizar Cliente</title>
    <script>
    function habilitarEdicao(campo) {
        document.getElementById(campo).removeAttribute("readonly");
    }
    </script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="inserircliente.php">Inserir</a></li>
        <li class="nav-item"><a class="nav-link" href="pesquisarcliente.php">Pesquisar</a></li>
        <li class="nav-item"><a class="nav-link" href="deletarcliente.php">Excluir</a></li>
        <li class="nav-item"><a class="nav-link" href="listarclientes.php">Listar</a></li>
        <li class="nav-item"><a class="nav-link active" href="atualizarcliente.php">Editar</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Atualizar Cliente</h2>

    <?php if($msgErro): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($msgErro) ?></div>
        <form action="atualizarCliente.php" method="GET" class="mb-3">
            <div class="mb-3">
                <label for="id" class="form-label">ID do Cliente:</label>
                <input type="number" id="id" name="id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </form>
    <?php else: ?>
        <form action="processarAtualizacao.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente['id_cliente']) ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" readonly onclick="habilitarEdicao('nome')" class="form-control">
            </div>

            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço:</label>
                <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" readonly onclick="habilitarEdicao('endereco')" class="form-control">
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" readonly onclick="habilitarEdicao('telefone')" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" readonly onclick="habilitarEdicao('email')" class="form-control">
            </div>

            <button type="submit" class="btn btn-success w-100">Atualizar Cliente</button>
        </form>
    <?php endif; ?>
</div>
<center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
