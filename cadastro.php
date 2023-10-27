<?php
    require 'assets/php/html.php';
    $html = new HtmlBased();
    $html->HeaderEcho(
        'Cadastro', 
        [
            [0, 'http-equiv="X-UA-Compatible" content="IE=edge"'],
            [0, 'name="viewport" content="width=device-width, initial-scale=1.0"'],
            [1, 'assets/css/index.css'],
            [1, 'assets/css/cad.css'],
            [2, 'assets/java/script.js'],
            [2, 'https://kit.fontawesome.com/39cab4bf95.js', 'crossorigin="anonymous"'],
            [2, 'https://code.jquery.com/jquery-3.2.1.slim.js', 'integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg=" crossorigin="anonymous"'],
        ],
        ''
    );
    if(isset($_SESSION['user'][0])){
        if($_SESSION['user'][0]['nivel'] != 1){
            $html->Atalho('erro.php');
        }
    }else{
        $html->Atalho('erro.php');
    }
?>
    <body>
        <div class="container">
            <button class="btnMain" onclick="redirect('home.php')"><i class="fa-solid fa-house-chimney"></i></button>
            <div class="left">
              <div class="header">
                <h2>Cadastrar User</h2>
                <h4>Aqui vocÊ cadastará um ou mais Usuários</h4>
                <img src="assets/imgs/BackHome.png" id="imagePreset" class="molde">
              </div>
              <form class="form" action="login.php" method="post" enctype="multipart/form-data">
                <input type="text" name="nome" class="form-field" placeholder="Nome de Usuário">
                <input type="password" name="senha" class="form-field" placeholder="senha">
                <select name="ADM" class="form-field">
                    <option value="3">User Padrão</option>
                    <option value="1">User ADM</option>
                </select>
                <input type="file" name="perfil" accept="image/*" id="perfilImage">
                <label for="perfilImage" class="btnLabel">Enviar Imagem</label>
                <input type="submit" value="Cadastre" class="btn" name="Cad">
              </form>
            </div>
            <div class="right"></div>
        </div>
        <script>
            $("#perfilImage").change(function(){
                let most = "#imagePreset";
                PreViewImg(this, most);
            });
        </script>
    </body>
<?php
    $html->foot();
?>