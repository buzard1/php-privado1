<?php 
//Definir as credenciais da conexão
$endereco = "localhost"; // Endereço do servidor MySQL
$usuario = "root"; //Nome de usuário do banco de dados
$senha = ""; //Senha do banco de dados
$banco = "armazena_imagem"; //Nome do banco de dados

//Criando a conexão usando MySQLI
$conexao= new mysqli($endereco,$usuario,$senha,$banco);

//Verificar se houver erro de conexão

if($conexao->connect_error){
    die("Falha na conexão".$conexao->connect_error);
}
?>