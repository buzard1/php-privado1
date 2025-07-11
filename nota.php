    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notas</title>
    </head>
    <body>
        <?php 

        $nota1 = 6;
        $nota2 = 10;
        $nota3 = 7;
        $media = ($nota1+$nota2+$nota3) / 3;
        
        if($media >=7)
        {
            echo "Você está aprovado com media ".number_format($media, 1);
        }else{
            echo "Você ficou em exame com media ".number_format($media, 1);
        #Desenvolvido por Matheus Dela Libera dos Anjos
        ?>
    
    </body>
    
    </html>