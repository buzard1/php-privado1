<?php 
    //Conexao com o banco de dados
    $host = 'localhost';
    $bdname = 'bd_imagens';
    $username = 'root';
    $password = '';

    try{
        //CONXAO COM O BANCO DE DADOS USANDO PDO
        $pdo = new PDO("mysql:host=$host;dbname=$bdname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //defube que erros vao lancar exceçoes
    
        //Recupera todos os funcinarios do banco de dados
        $sql="SELECT id,nome FROM funcionarios";
        $stmt = $pdo->prepare($sql);//prepara a instrulçao sql para execucao
        $stmt->execute(); //Executa a instrução sql;
        $funcionarios=$stmt->fetchALL(PDO::FETCH_ASSOC); //Busca toros os resultados para

        //Verifica se foi solicitado a exclusao de um funcionario
        if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['excluir_id'])){
            $excluir_id = $_POST['excluir_id'];
            $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
            $stmt_excluir = $pdo->prepare($sql_excluir);
            $stmt_excluir->bindParam(':id' ,$excluir_id, PDO::PARAM_INT);
            $stmt_excluir->execute();

            //Redireciona para evitar reenvio do formulario
            header("location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }catch(PDOexception $e){
        echo "Erro: ".$e->getMessage();//Exibe a mensagem de erro se a conexao ou a consulta falhar
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de funcionarios</title>
</head>
<body>
    <h1>Consulta de funcionarios</h1>

    <ul>
        <?php foreach($funcionarios as $funcionario):?>
        <li>
            <!--A linha abaixo exibe o Link para visualizar os detalhes do Funcionario com base no id -->
            <a href="visualizar_funcionario.php?id=<?=$funcionario['id'] ?>">
                <!--A linha abaixo exibe o nome do Funcionario -->
                <?=htmlspecialchars($funcionario['nome'])?>
            </a>
            <!-- Formulario para excluir funcionarios -->
             <form method="POST" style="display:inline;">
                <input type="hidden" name="excluir_id" value="<?= $funcionario['id'] ?>">
                <button type="submit">Excluir</button>
             </form>
        </li>
        <?php endforeach; ?>
    </ul>
    
    <center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>

</body>
</html>