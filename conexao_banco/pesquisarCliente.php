<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pesquisar Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="inserircliente.php">Inserir</a></li>
        <li class="nav-item"><a class="nav-link active" href="pesquisarcliente.php">Pesquisar</a></li>
        <li class="nav-item"><a class="nav-link" href="deletarcliente.php">Excluir</a></li>
        <li class="nav-item"><a class="nav-link" href="listarclientes.php">Listar</a></li>
        <li class="nav-item"><a class="nav-link" href="atualizarcliente.php">Editar</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container mt-5">
    <h2 class="mb-4 text-center">Pesquisar Cliente</h2>

<?php
require_once 'conexao_pdo.php';
$conexao = conectarBanco();
$busca = $_GET['busca'] ?? '';

if (!$busca) {
    // Formulário de busca estilizado com Bootstrap
    ?>
    <form action="pesquisarCliente.php" method="GET" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="busca" class="form-label">Digite o ID ou Nome:</label>
            <input type="text" id="busca" name="busca" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Pesquisar</button>
    </form>
    <center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
    <?php
    exit;
}

if (is_numeric($busca)) {
    $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
    $stmt->bindParam(":id", $busca, PDO::PARAM_INT);
} else {
    $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE nome LIKE :nome");
    $buscanome = "%$busca%";
    $stmt->bindParam(":nome", $buscanome, PDO::PARAM_STR);
}

$stmt->execute();
$clientes = $stmt->fetchAll();

if (!$clientes) {
    echo '<div class="alert alert-warning text-center">Nenhum cliente encontrado.</div>';
    exit;
}
?>


<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
            <td><?= htmlspecialchars($cliente['nome']) ?></td>
            <td><?= htmlspecialchars($cliente['endereco']) ?></td>
            <td><?= htmlspecialchars($cliente['telefone']) ?></td>
            <td><?= htmlspecialchars($cliente['email']) ?></td>
            <td>
                <a href="atualizarCliente.php?id=<?= $cliente['id_cliente'] ?>" class="btn btn-sm btn-primary">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
