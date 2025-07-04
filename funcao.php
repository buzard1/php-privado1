<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    #index 0123456789012345
    $name = "Stefanie Hatcher";
    $lenght= strlen($name);
    $cmp = strcmp($name, "Brian Le");
    $index = strpos($name, "e");
    $firts = substr($name, 9, 5);
    $name_upper = strtoupper($name);
    echo $name."<br>";
    echo $lenght."<br>";
    echo $cmp."<br>";
    echo $index."<br>";
    echo $firts."<br>";
    echo $name_upper."<br>";
    ?>
</body>
</html>