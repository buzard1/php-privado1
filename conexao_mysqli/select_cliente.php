<?php 
//Inclui o arquivo de conexão com o banco de dados
require_once "conexao_mysqli.php";

//Estabelece conexão
$conexao = conectadb();

//Define a consulta SQL para buscar clientes
$sql = "SELECT id_cliente, nome, email FROM cliente";

//Executa a consulta no banco
$result = $conexao->query($sql);

if($result->num_rows > 0){
    //itera sobre os resultados e exibe os dados
        while($linha = $result->fetch_assoc()){
            echo "ID:".$linha["id_cliente"]." - Nome: ".$linha["nome"]. " -Email: ".$linha["email"]."<br/>";
        }
    }else{
        //Caso nenhum resultado seja encontrado
        echo "Nenhum resultado encontrado.";
    }
    //Fecha a conexão com o bando de dados
    $conexao->close();
?>