<?php 
//FUNCAO PARA REDIMENSIONAR A IMAGEM
function redimensionarImagem($imagem,$largura,$altura){
    //OBTEM AS DIMENSOES ORIGINAIS DA IMAGEM
    //getimagesize() RETORNA A LARGURA E A ALTURA DE UMA IMAGEM
    list($larguraOrignal,$alturaOriginal) = getimagesize($imagem);

    //CRIA UMA NOVA IMAGEM EM BRANCO COM AS NOVAS DIMENSOES
    //imagecreatetruecolor() CRIA UMA NOVA IMAGEM EM BRANCO EM ALTA QUALIDADE
    $novaImagem = imagecreatetruecolor($largura,$altura);

    //CAREGA A IMAGEM ORIGINAL (JPEG) A PARTIR DO ARQUIVO
    //imagecreatefromjpeg() CRIA UMA IMAGEM PHP A PARTIR DE UM JPEG
    $imagemOriginal = imagecreatefromjpeg($imagem);

    //COPIA E REDIMENSIONA A IMAGEM ORIGINAL PARA A NOVA
    //imagecopyresampled() COPIA COM REDIMENSIONAMENTO E SUAVIAZAÇÃO
    imagecopyresampled($novaImagem,$imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOrignal, $alturaOriginal);

    //INICIA UM BUFFER PARA GUARDAR A IMAGEM COM O TEXTO BINARIO
    //ob_start() INCIA O "output buffering" GUARDANDO A SAIDA
    ob_start();

    // image.jpeg() ENVIA A IMAGEM PARA O OUTPUT
    imagejpeg($novaImagem);=

    //ob_get_clean PEGA O CONTEUDO DO BUFFER E LIMPA
    $dadosImagem = ob_get_clean();
    
    //LIBERA A MEMORIA USADA PELAS IMAGENS
    //imagedestroy() LIMPA A MEMORIA DA IMAGEM CRIADA
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    //RETORNA A IMAGEM REDIMENSIONADA EM FORMATO BINARIO
    return $dadosImagem;
}

//CONFIGURAÇÃO DO BANCO DE DADOS
$host = 'localhost';
$dbname = 'bd_imagens';
$username = 'root';
$password = '';

try{
    //CONXAO COM O BANCO DE DADOS USANDO PDO
    $pdo = new PDO("mysql:host=$host;dbname=$bdname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //defube que erros vao lancar exceçoes

    //VERIFICA SE FOI UM POST E SE TEM ARQUIVO 'foto'
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])){
        
        if($_FILES['foto']['error'] == 0){
            $nome = $_POST['nome']; //PEGA O NOME DO FUNCIONARIO
            $telefone = $_POST['telefone']; //PEGA O TELEFONE DO FUNCIONARIO
            $nomeFoto = $_FILES['foto']['name']; //PEGA O NOME ORIGINAL DO ARQUIVO
            $tipoFoto = $_FILES['foto']['type']; //PEGA O TIPO MIME DA IMAGEM

        // REDIMENSIONA A IMAGEM
        $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400); //tmp_name É O CAMINHO TEMPORARIO

        //INSERE NO BANCO DE DADOS USANDO SQL PREPARADA
        $sql = "INSERT INTO funcionarios(nome, telefone, nome_foto, tipo_foto, foto)
        VALUES(:nome,:telefone,:nome_foto,:tipo_foto,:foto)";
        $stmt = $pdo->prepare($sql); //PREPARA A QUERY PARA EVITAR ATAQUE sql injection
        $stmt->bindParam(':nome',$nome); //LIGA OS PARAMETROS AS VARIAVEIS
        $stmt->bindParam(':telefone',$telefone); //LIGA OS PARAMETROS AS VARIAVEIS
        $stmt->bindParam(':nome_foto',$nomeFoto); //LIGA OS PARAMETROS AS VARIAVEIS
        $stmt->bindParam(':tipo_foto',$tipoFoto); //LIGA OS PARAMETROS AS VARIAVEIS
        $stmt->bindParam(':foto',$foto, PDO::PARAM_LOB); //LOB = Large Object USADO PARA DADOS BINARIOS COM IMAGENS

        if($stmt->execute()){
            echo "Funcionario cadastrado com sucesso";
        }else{
            echo "Erro ao cadastrar o funcionario";
        }
        }else{
            echo "Erro ao fazer o UPLOAD da foto! Codigo : ".$_FILES['foto']['error'];
        }
    }
} catch(PDOexception $e){
    echo "Erro".$e->GetMessage(); // MOSTRA O ERRO SE HOUVER
}
?>