<?php 
    $bdServidor = '127.0.0.1';
    $bdUsuario = 'root';
    $bdSenha = '123';
    $bdBanco = 'matheus_anjos';
    $conexao = mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdBanco);
        if(mysqli_connect_errno()){
            echo "Prolemas para conectar no banco. Verifique os dados";
            die();
        }
?>