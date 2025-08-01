<?php 
// INCLUI O ARQUIVO DE CONEXAO COM O BANCO DE DADOS
require_once('conecta.php');

//CRIA A CONSULTA SQL PARA SELECIONAR OS DADOS PRINCIPAIS(SEM A COLUNA 'IMAGEM')
$querySelecao = "SELECT codigo,evento,descricao,nome_imagem,tamanho_imagem FROM tabela_imagens";

$resultado = mysqli_query($conexao,$querySelecao);

if(!$resultado){
    die("Erro na consulta: ".mysqli_error($conexao));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armazenando Imagens no banco de dados MySQL</title>
</head>
<body>

<h2>Selecione um novo arquivo de imagem</h2>
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="9999999999"/>
    <input name="evento" type="text" placeholder="Nome do Evento"/>
    <input name="descricao" type="text" placeholder="Descrição"/>
    <input name="imagem" type="file"/>
    <input type="submit" value="Salvar"/>
</form>

<br>

<table>
    <tr>
        <td align="center">Codigo</td>
        <td align="center">Evento</td>
        <td align="center">Descrição</td>
        <td align="center">Nome da imagem</td>
        <td align="center">Tamanho</td>
        <td align="center">Visualizar imagem</td>
        <td align="center">Excluir Imagem</td>
    </tr>
<?php 
    while($arquivos=mysqli_fetch_assoc($resultado)){ ?>
    <tr>
        <td align="center"><?php echo $arquivos['codigo']; ?></td>
        <td align="center"><?php echo $arquivos['evento']; ?></td>
        <td align="center"><?php echo $arquivos['descricao']; ?></td>
        <td align="center"><?php echo $arquivos['nome_imagem']; ?></td>
        <td align="center"><?php echo $arquivos['tamanho_imagem']; ?></td>
        <td align="center">
            <a href="ver_imagens.php?id=<?php echo $arquivos['codigo'];?>">Ver Imagem</a>
        </td>
        <td align="center">
            <a href="excluir_imagens.php?id=<?php echo $arquivos['codigo'];?>">Excluir</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>