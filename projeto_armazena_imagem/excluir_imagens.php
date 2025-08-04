<?php 
require("conecta.php");

//OBTEM O ID DA IMAGEM DA URL, GARANTINDO QUE SEJA NUMERO INTEIRO
$id_imagem = isset($_GET['id'])? intval($_GET['id']):0;

//VERIFICA SE O id É VALIDO (MAIOR QUE ZERO)
if($id_imagem>0){
    //CRIA A QUERY SEGURA USNADO O prepared statement
    $queryExclusao = "DELETE FROM tabela_imagens WHERE codigo = ?";

    //PREPARA A QUERY
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i",$id_imagem); //DEFINE O ID COM UM INTEIRO

    //EXECUTA A EXCLUSAO
    if($stmt->execute()){
        echo "Imagem excluida com sucesso!";
    }else{
        die("Erro ao excluir a imagem: ".$stmt->error);
    }
    //FECHA A CONSULTA
    $stmt->close();
}else{
    echo "ID invalido";
}

//REDIRECIONA PARA A index.php E garante que o script pare
header("location: index.php");
exit();
?>