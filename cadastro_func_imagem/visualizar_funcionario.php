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

        //VERIFICA SE O ID FOI PASSADO NA URL
        if(isset($_GET['id'])){
            $id=$_GET['id']; //OBTEM O ID DO FUNCIONARIO ATRAVEZ DA URL

            //RECUPERA OS DADOS DO FUNCIONARIO NO BANCO DE DADOS
            $sql = "SELECT nome,telefone,tipo_foto,foto FROM funcionarios WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT); //vincula o valor do ID ao parametro :id
            $stmt->execute(); //EXECUTA A INSTRUÇÃO SQL
            
            //VERIFICA SE ENCONTROU O FUNCIONARIO
            if($stmt->rowCount()>0){
                //A LINHA ABAIXO BUSCA OS DADOS DOS FUNCIONARIOS COM UM ARRAY ASSOCIATIVO
                $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
            //VERIFICA SE FOI SOLICITADO A EXCLUSAO DO FUNCIONARIO;
            //LINHA ABAIXO VERIFICA SE OS DADOS FORAM ENVIADO VIA FORMULARIO COM O METODO POST
            //isset VERIFICA SE HA UM VALOR DEFINIDO NA VARIAVEL
            //VERIFICA SE O FORMULARIO FOI ENVIADO VIA POST E SE EXISTE O CAMPO "excluir_id"
                if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['excluir_id'])){
                    // A LINHA BAIXO PEGA O VALOR id QUE FOI ENVIADO PELO FORMULARIO(id DO FUNCIONARIO A SER EXCLUIDO)
                    $excluir_id = $_POST['excluir_id'];
                    //monta a query sql para deletar o funcionario com o id correspondente
                    $sql_excluir = "DELETE FROM funcionarios WHERE id= :id";

                    //PREPARA A QUERY PARA A EXECUÇÃO SEGURA EVITANDO SQL INJECTION
                    $stmt_excluir = $pdo->prepare($sql_excluir);

                    //associa o valor ID ao parametro :id na query garantindo que sera tratado como um numero
                    $stmt_excluir->bindParam(':id',$excluir_id, PDO::PARAM_INT);

                    //executa a query excluindo o funcionario do bd
                    $stmt_excluir->execute();

                    header("Location: consulta_funcionario.php");
                    exit();
                }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Funcionario</title>
</head>
<body>
    <h1>Dados do Funcionario</h1>
    <p>Nome:<?=htmlspecialchars($funcionario['nome'])?></p>
    <p>Telefone:<?=htmlspecialchars($funcionario['telefone'])?></p>
    <p>Foto:</p>
        <img src="data:<?$funcionario['tipo_foto']?>;base64,<?=base64_encode($funcionario['foto'])?>" alt="Foto do Funcionario">

        <!-- formulario para excluir funcionario -->
    <form method="POST">
        <input type="hidden" name="excluir_id" value="<?=$id?>">
        <button type="submit">Excluir Funcionario</button>
    </form>
    <center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>

</body>
</html>
<?php
        } else {
            echo "Funcionario não encontrado";
        }
    } else {
        echo "id do funcionario não foi fornecido";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>