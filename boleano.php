<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //Declara variável numérica
    $umidade = 91;
    //Testa se $umidade maior que 90. Retorna um boolean
    $vaiChover = ($umidade >90);
    //Testa se $vaiChover é verdadeiro
    if($vaiChover)
    {
        echo "Vai chover com toda certeza absoluta da terra!";
    }
    
    
    ?>
    
</body>
</html>