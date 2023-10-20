<?php
    require 'assets/php/html.php';
    if(isset($_SESSION['user'][0])){
        if($_SESSION['user'][0]['nivel'] != 1){
            echo '<h1>Você não é Adiministrador!!!</h1>';
            echo '<a href="index.php">Voltar</a>';
        }else{
            echo '<a href="cadatro.php">Cadastrar Novos Users!</a>';
            echo '<br><br><a href="index.php">Sair</a>';
        }
    }else{
        echo '<h1>Logue primeiro!!!</h1>';
        echo '<a href="index.php">Voltar</a>';
    }
    
?>