<?php 
    $bdServidor = 'localhost:8080';
    $bdUsuario = 'root';
    $bdSenha = '';
    $bdBanco = 'matheus_anjos';
    $conexao = mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdBanco);
        if(mysqli_connect_errno($conexao)){
            echo "Prolemas para conectar no banco. Verifique os dados";
            die();
        }
?>