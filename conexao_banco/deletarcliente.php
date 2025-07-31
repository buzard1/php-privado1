<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Excluir Cliente</title>
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
        <li class="nav-item"><a class="nav-link active" href="deletarcliente.php">Excluir</a></li>
        <li class="nav-item"><a class="nav-link" href="listarclientes.php">Listar</a></li>
        <li class="nav-item"><a class="nav-link" href="atualizarcliente.php">Editar</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Excluir Cliente</h2>
    <form action="processarDelecao.php" method="POST">
        <div class="mb-3">
            <label for="id" class="form-label">ID do Cliente:</label>
            <input type="number" id="id" name="id" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-danger w-100">Excluir Cliente</button>
    </form>
</div>
<center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
