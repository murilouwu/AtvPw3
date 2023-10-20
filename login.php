<?php
    require 'assets/php/html.php';
    $html = new HtmlBased();

    if(isset($_POST['Log'])){
        $userCad = array($_POST['nome'], $_POST['senha']);
        if(!empty($userCad[0]) && !empty($userCad[1])){
            $date = array('nome', 'pass', 'nivel');
            $where = $date[0]." = '".$userCad[0]."' AND ".$date[1]." = '".$userCad[1]."'";

            $UserAction = new BankUse();
            $UserAction->NameTable = 'user';
            $UserAction->Dates = $date;
            
            $UserFun = $UserAction->GetUser($pdo, "", $where);

            if(is_string($UserFun)){
                $html->mensage($UserFun);
                echo '<a href="index.php">Voltar</a>';
            }else{
                $a = 0;
                foreach($UserFun as $row){
                    $_SESSION['user'][$a] = $row;
                    $a++;
                }
                $html->Atalho('home.php');
            }
        }else{
            $html->mensage("Há campos vazios!");
            echo '<a href="index.php">Voltar</a>';
        }

    }else if(isset($_POST['Cad'])){
        $userCad = array($_POST['nome'], $_POST['senha'], $_POST['ADM']);
        if(!empty($userCad[0]) && !empty($userCad[1])){
            $date = array('nome', 'pass', 'nivel');
            $Verifcs = array(0, 1);
            $Configs = array(array('AND'));

            $UserAction = new BankUse();
            $UserAction->NameTable = 'user';
            $UserAction->Dates = $date;
            
            $UserFun = $UserAction->InsertUser($pdo, $userCad, $Verifcs, $Configs);
            $html->mensage($UserFun);
            echo '<a href="cadatro.php">Voltar</a>';
        }else{
            $html->mensage("Há campos vazios!");
            echo '<a href="cadatro.php">Voltar</a>';
        }

    }else{
        $html->Atalho('index.php');
    }
?>