<?php 
require_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $conexao = conectarBanco();

    $sql = "INSERTO INTO clinte(nome,endereco,telefone,email)
    VALUES(:nome,:endereco,:telefone,:email)";


$stmt = $conexao->prepare($sql);
$stmt->bindParam(":nome", $_POST["nome"]);
$stmt->bindParam(":endereco", $_POST["endereco"]);
$stmt->bindParam(":telefone", $_POST["telefone"]);
$stmt->bindParam(":email", $_POST["email"]);
try{
    $stmt->execute();
    echo"Cliente cadastrado com sucesso!";
}catch(PDOException $e){
    error_log("Erro ao inserir cliente: " .$e->GetMessage());
    echo"Erro ao cadastrar Cliente.";
    }
}
?>