<?php
    require 'assets/php/html.php';
    $html = new HtmlBased();
    $html->HeaderEcho(
        'Mensage', 
        [
            [0, 'http-equiv="X-UA-Compatible" content="IE=edge"'],
            [0, 'name="viewport" content="width=device-width, initial-scale=1.0"'],
            [1, 'assets/css/mens.css'],
            [2, 'assets/java/script.js'],
            [2, 'https://kit.fontawesome.com/39cab4bf95.js', 'crossorigin="anonymous"'],
            [2, 'https://code.jquery.com/jquery-3.2.1.slim.js', 'integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg=" crossorigin="anonymous"'],
        ],
        ''
    );
    echo '<body>';

    if(isset($_POST['Log'])){
        $userCad = array($_POST['nome'], $_POST['senha']);
        if(!empty($userCad[0]) && !empty($userCad[1])){
            $date = array('nome', 'pass', 'nivel', 'img');
            $passCript = $html->Cripto($userCad[1]);
            $where = "WHERE ".$date[0]." = '".$userCad[0]."';";

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
                if($html->CriptoVer($userCad[1], $_SESSION['user'][0]['pass']) == true){
                    $html->Atalho('home.php');
                }else{
                    $html->mensage('Senha Incorreta');
                    echo '<a href="index.php">Voltar</a>';
                }
            }
        }else{
            $html->mensage("Há campos vazios!");
            echo '<a href="index.php">Voltar</a>';
        }

    }else if(isset($_POST['Cad'])){
        $userCad = array($_POST['nome'], $html->Cripto($_POST['senha']), $_POST['ADM'], $_FILES['perfil']);

        if(!empty($userCad[0]) && !empty($userCad[1]) && !empty($userCad[3])){
            $partes = explode('.', $userCad[3]['name']);
            $extensao = end($partes);
            
            $imgLocal = 'assets/imgsBank/'.$userCad[0].'Perfil.'.$extensao;
            $FolderFile = 'assets/imgsBank/';
            $NameFile = $userCad[0].'Perfil.'.$extensao;

            $imgVer = $html->upload($userCad[3], $FolderFile, $NameFile);
            if($imgVer != true){
                $html->mensage('erro no upload!');
                if($imgVer != false){
                    echo $imgVer;
                }
                echo '<a href="cadastro.php">Voltar</a>';
            }else{
                $userCad[3] = $imgLocal;
                $date = array('nome', 'pass', 'nivel', 'img');
                $Verifcs = array(0);
                $Configs = array();

                $UserAction = new BankUse();
                $UserAction->NameTable = 'user';
                $UserAction->Dates = $date;
                
                $UserFun = $UserAction->InsertUser($pdo, $userCad, $Verifcs, $Configs);
                if($UserFun == 'sucesso'){
                    $html->mensage($UserFun);
                    echo '<a href="cadastro.php">Voltar</a>';
                }else{
                    $html->mensage($UserFun);
                    if(unlink($userCad[3])){
                        echo '<a href="cadastro.php">Voltar</a>'; 
                    }else{
                        $html->mensage("EROR 404");
                    }
                }
            }
        }else{
            $html->mensage("Há campos vazios!");
            echo '<a href="cadastro.php">Voltar</a>';
        }

    }else{
        $html->Atalho('index.php');
    }
    
    echo   '</body>';
    $html->foot();
?>