<?php
    require 'assets/php/html.php';
    $html = new HtmlBased();
    $html->HeaderEcho(
        'Login', 
        [
            [0, 'http-equiv="X-UA-Compatible" content="IE=edge"'],
            [0, 'name="viewport" content="width=device-width, initial-scale=1.0"'],
            [1, 'assets/css/index.css'],
            [2, 'assets/java/script.js'],
            [2, 'https://kit.fontawesome.com/39cab4bf95.js', 'crossorigin="anonymous"'],
            [2, 'https://code.jquery.com/jquery-3.2.1.slim.js', 'integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg=" crossorigin="anonymous"'],
        ],
        ''
    );
    $_SESSION['user'] = array();
?>
    <body>
        <div class="container">
            <div class="left">
              <div class="header">
                <h2>Bem Vindo de volta</h2>
                <h4>Entre agora usando seu Nome de usuário e sua senha</h4>
              </div>
              <form class="form" action="login.php" method="post">
                <input type="text" name="nome" class="form-field" placeholder="Nome de Usuário">
                <input type="password" name="senha" class="form-field" placeholder="senha">
                <input type="submit" value="Entrar" class="btn" name="Log">
              </form>
            </div>
            <div class="right"></div>
        </div>
    </body>
<?php
    $html->foot();
?>