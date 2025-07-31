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

//Executa a consulta SEM proteção contra SQL injetion
$sql = "Select * FROM cliente_teste WHERE nome = '$nome'";
$result = $conexao->query($sql);

//se houver resultados, o login é considerado bem-sucedido
if($result->num_rows > 0){
    header("Location:area_restrita.php");
//Garante que o codigo pare aqui para evitar execução indevida
    exit();
}else{
    echo"Nome não encontrado.";
}
//fecha conexao
$conexao->close();
?>