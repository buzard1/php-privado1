<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link active" href="inserircliente.php">Inserir</a></li>
        <li class="nav-item"><a class="nav-link" href="pesquisarcliente.php">Pesquisar</a></li>
        <li class="nav-item"><a class="nav-link" href="deletarcliente.php">Excluir</a></li>
        <li class="nav-item"><a class="nav-link" href="listarclientes.php">Listar</a></li>
        <li class="nav-item"><a class="nav-link" href="atualizarcliente.php">Editar</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Cadastro de Cliente</h2>
    
    <form action="processarInsercao.php" method="POST" class="mx-auto" style="max-width: 500px;">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required />
        </div>
        
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" id="endereco" name="endereco" class="form-control" required />
        </div>
        
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control" required />
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" required />
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Cadastrar Cliente</button>
    </form>
</div>

<center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
