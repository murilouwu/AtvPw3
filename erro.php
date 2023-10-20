<?php
    require 'assets/php/html.php';
    if(isset($_SESSION['user'][0])){
        if($_SESSION['user'][0]['nivel'] != 1){
            echo '<h1>Você não é Adiministrador!!!</h1>';
            echo '<a href="home.php">Voltar</a>';
        }
    }else{
        echo '<h1>Não há nada aqui</h1>';
        echo '<a href="index.php">Voltar</a>';
    }
?>