<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $age = 16;
    print "You are ".$age." years old.<br>";
    print "You are $age years old.<br>"; # You are 16 years old.
    print ' You are $age years old.'; # You are $age years old.
    ?>

    <?php 
    $cidade = "Curitiba";
    $estado = "PR";
    $idade = 325;
    $frase_capital = "A cidade de $cidade é a capital do $estado";
    $frase_idade = "$cidade tem mais de $idade anos";
    echo "<h3>$frase_capital </h3>";
    echo "<h4>$frase_idade </h4>"
    ?>

    <?php 
    $age = 16;
    print "Today is your $ageth birthday.<br>"; #ageth not found
    print "Today is your {$age}th birthday."
    
    ?>
    
</body>
<center> <address> Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
</html>