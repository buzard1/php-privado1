<?php 
//Configuração do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa_teste";

//Conexão usando MySQLi sem proteção contra SQL Injection
$conexao = new mysqli($servidor,$usuario,$senha,$banco);

//Verifica se há erro na conexão
if($conexao->connect_error){
    die("Erro de conexão:".$conexao->connect_error);
}

//Captura os dados dos formulario(nome de usuário)
$nome = $_POST["nome"];

$stmt = $conexao->prepare("SELECT * FROM cliente_teste where nome = ?");
$stmt->bind_param("s",$nome);
$stmt->execute();
$result = $stmt->get_result();

//verifica se há resultados(se existe o nome informado no banco)
if($result->num_rows > 0){
    //login bem-sucedido e redireciona para área restrita
    header("location:area_restrita.php");
    //garante que o script pare após redirecionamento
    exit();
}else{
    echo"Nome não encontrado.";
}
//fecha a consulta e a conexao
$stmt->close();
$conexao->close();
?>