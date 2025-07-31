<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="style.css" />
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="inserircliente.php">Inserir</a></li>
        <li class="nav-item"><a class="nav-link" href="pesquisarcliente.php">Pesquisar</a></li>
        <li class="nav-item"><a class="nav-link" href="deletarcliente.php">Excluir</a></li>
        <li class="nav-item"><a class="nav-link" href="listarclientes.php">Listar</a></li>
        <li class="nav-item"><a class="nav-link" href="atualizarcliente.php">Editar</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
    require_once 'conexao_pdo.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $conexao = conectarBanco();

        $sql = "INSERT INTO cliente(nome, endereco, telefone, email)
            VALUES(:nome, :endereco, :telefone, :email)";
    

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome",$_POST["nome"]);
    $stmt->bindParam(":endereco",$_POST["endereco"]);
    $stmt->bindParam(":telefone",$_POST["telefone"]);
    $stmt->bindParam(":email",$_POST["email"]);
    try{
        $stmt->execute();
        echo "Cliente cadastrado com sucesso!";
    } catch(PDOException $e){
        error_log("Erro ao inserir cliente: ". $e->getMessage());
        echo "Erro ao cadastrar cliente.";
    }
}
?>
<center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>