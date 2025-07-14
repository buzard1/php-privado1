<?php 
    if(isset($_GET['nome']) && isset($_GET['idade'])){
        echo "Recebido o cliente: ".$_GET['nome'];
        echo " que tem ".$_GET['idade']. " anos";
    }
    echo "</br>";
    echo "Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas";
?>