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

        $id = filter_var($_POST["id"],FILTER_SANITIZE_NUMBER_INT);

        if(!$id) {
            die("Erro: ID inválido.");
        }
        $sql = "DELETE FROM cliente WHERE id_cliente = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id",$id, PDO::PARAM_INT);

        try{
            $stmt->execute();
            echo "Cliente excluído com sucesso!";
        } catch (PDOException $e) {
            error_log("Erro ao excluir cliente: ". $e->getMessage());
            echo "Erro ao excluir cliente.";
        }
    }
?>
<center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>