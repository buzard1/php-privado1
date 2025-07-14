<?php 
    if(isset($_GET['nome_produto']) && isset($_GET['quantidade'])&& isset($_GET['valor'])&& isset($_GET['fornecedor'])){
        echo "Nome do produto: ".$_GET['nome_produto']."</br>";
        echo "Quantidade do produto: ".$_GET['quantidade']."</br>";
        echo "Valor do produto: ".$_GET['valor']."</br>";
        echo "Fornecedor do produto: ".$_GET['fornecedor']."</br></br></br>";
        echo "Matheus dela libera dos anjos/ Estudante / Tecnico em Deenvolvimento de Sistemas";
    }
?>