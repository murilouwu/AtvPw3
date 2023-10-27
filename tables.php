<?php
    require 'assets/php/html.php';
    $html = new HtmlBased();
    $html->HeaderEcho(
        'Relatório', 
        [
            [0, 'http-equiv="X-UA-Compatible" content="IE=edge"'],
            [0, 'name="viewport" content="width=device-width, initial-scale=1.0"'],
            [1, 'assets/css/tabel.css'],
            [2, 'assets/java/script.js'],
            [2, 'https://kit.fontawesome.com/39cab4bf95.js', 'crossorigin="anonymous"'],
            [2, 'https://code.jquery.com/jquery-3.2.1.slim.js', 'integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg=" crossorigin="anonymous"'],
        ],
        ''
    );

    if(!isset($_SESSION['user'][0])){
        $html->Atalho('erro.php');
    }
    if(!isset($_GET['Tab'])){
        $html->Atalho('home.php');
    }
?>
    <body>
        <button class="btnMain" onclick="redirect('home.php')"><i class="fa-solid fa-house-chimney"></i></button>
        <div class="BigTable" id="Table">
            <table class="table">
                <?php
                    $date = $_GET['Tab'] == 'cliente' ? array('nome', 'cor') : array('nome', 'img');

                    $Table = new BankUse();
                    $Table->NameTable = $_GET['Tab'];
                    $Table->Dates = $date;
                    $stmt = $Table->GetUser($pdo, "", "");

                    if($stmt->rowcount() == 0){
                        echo '
                        <tr class="Top">
                            <th class="total">Não há dados</th>
                        </tr>
                        ';
                    }else{
                        echo '
                            <tr class="Top">
                                <th class="total">'.$_GET['Tab'].'s:</th>
                            </tr>
                            <tr class="Top">
                                <th id="tb-id">ID</td>
                            ';
                        foreach($date as $row){
                            echo '
                                <th id="tb-id">'.$row.'</td>
                            ';
                        }
                        echo '
                                <th id="tb-fn">Funções(Não funcional)</td>
                            </tr>
                            ';
                        foreach($stmt as $row){
                            echo '
                                <tr>
                                    
                                </tr>
                            <tr>
                                <td>'.$row['cd'].'</td>
                                <td>'.$row['nome'].'</td>
                            ';
                            if($_GET['Tab'] == 'cliente'){
                                echo '<td><i class="fa-solid fa-fill-drip" style="color: '.$row['cor'].';"></i></td>';
                            }else{
                                echo '<td><img src="'.$row['img'].'" style="height: 3vh; width: 3vh; border-radius: 0.2vw; border: 0.05vw solid var(--corD);"></td>';
                            }
                            echo '
                                <td>
                                    <a><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            ';
                        }
                    }
                ?>
            </table>
        </div>
    </body>
<?php
    $html->foot();
?>
