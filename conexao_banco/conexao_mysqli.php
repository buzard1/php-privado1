<?php
    //Habilita relatório detalhado de erros no MySQLi
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/**
 * Função para conectar ao banco de dados
 * Retorna um objeto de conexão MySQLi ou imterrompe o script em caso de erro.
 */

    function conectadb(){
        $endereco = "localhost"; // Endereço do servidor MySQL
        $usuario = "root"; //Nome de usuário do banco de dados
        $senha = ""; //Senha do banco de dados
        $banco = "empresa"; //Nome do banco de dados
    }

    try{
        //Criação de conexão
        $con = new mysqli($endereco, $usuario, $senha, $banco);

        //Definição do conjunto de caracteres para evitar problemas de acentuação
        $con->set_charset("utf8mb4");
        return $con;
    } catch (Exception $e){
        //Exibe uma mensagem de erro e encerra o script
        die("Erro na conexão:".$e->getMessage());
    }
?>