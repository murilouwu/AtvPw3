<?php
    require 'assets/php/html.php';
    $html = new HtmlBased();
    $html->HeaderEcho(
        'Home', 
        [
            [0, 'http-equiv="X-UA-Compatible" content="IE=edge"'],
            [0, 'name="viewport" content="width=device-width, initial-scale=1.0"'],
            [1, 'assets/css/home.css'],
            [2, 'assets/java/script.js'],
            [2, 'https://kit.fontawesome.com/39cab4bf95.js', 'crossorigin="anonymous"'],
            [2, 'https://code.jquery.com/jquery-3.2.1.slim.js', 'integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg=" crossorigin="anonymous"'],
        ],
        ''
    );
    $_SESSION['user'] = array();
?>
    <body>
        <div class="barLine">
          <div class="ulBar"></div>
          <i class="fa-solid fa-house-chimney"></i>
          <h2 class="TitleSite">Home</h2>
        </div>
        <div class="LateralMain">
          <!--Perfil Edit-->
          <div class="UlMaster">
            <i class="fa-solid fa-user"></i>
            <button class="btn" onclick="FormOpen(this, 1, '#AltSenha')">Alterar Senha</button>
            <form method="post" class="AltSenha ocultar" id="AltSenha">
              <h2>Alterar Senha</h2>
              <input type="password" name="NewPass" class="pass" placeholder="Nova senha">
              <input type="password" name="NewPassConf" class="pass" placeholder="confirme a Nova senha">
              <input type="submit" value="Alterar" class="btn" name="pasNew">
            </form>
          </div>

          <!--Cadastro de Users-->
          <div class="UlMaster">
            <i class="fa-solid fa-user-plus"></i>
            <button class="btn" onclick="redirect('cadastro.php')">Cadastar Usuário</button>
          </div>

          <!--Cadastro de Cliente-->
          <div class="UlMaster">
            <i class="fa-solid fa-person"></i>
            <button class="btn" onclick="FormOpen(this, 1, '#CadastarCliente')">Cadastar Clientes</button>
            <form method="post" class="AltSenha ocultar" id="CadastarCliente">
              <h2>Cadastar Clientes</h2>
              <input type="text" name="nome" class="pass" placeholder="Digite o nome, escolha uma cor">
              <input type="color" name="cor" class="btn">
              <input type="submit" value="Criar" class="btn" name="cadClients">
            </form>
          </div>
          
          <!--Cadastro de Produtos-->
          <div class="UlMaster">
            <i class="fa-solid fa-box"></i>
            <button class="btn" onclick="FormOpen(this, 1, '#CadastarProd')">Cadastar Produtos</button>
            <form method="post" class="AltSenha ocultar" id="CadastarProd" enctype="multipart/form-data">
              <h2>Cadastar Produtos</h2>
              <input type="text" name="nome" class="pass">
              <input type="file" name="foto" accept="image/*" id="fotoProduct">
              <label for="fotoProduct" class="btn">Enviar foto</label>
              <input type="submit" value="Criar" class="btn" name="cadProducts">
            </form>
          </div>
          
          <!--Relatório de produtos-->
          <div class="UlMaster">
            <i class="fa-solid fa-clipboard-list"></i>
            <button class="btn">Relatório de Produtos</button>
          </div>
          
          <!--Relatório de Clientes-->
          <div class="UlMaster">
            <i class="fa-solid fa-clipboard-list"></i>
            <button class="btn">Relatório de Clientes</button>
          </div>
        </div>
    </body>
    <script>
      function FormOpen(btn, fun, form){
        let frm = document.querySelector(form);
        ocultar(frm, fun);
        let invertFun = fun==0? 1:0;
        let textFun = "FormOpen(this, "+invertFun+", '"+form+"')";
        btn.setAttribute('onclick', textFun);
      }
    </script>
<?php
    $html->foot();
?>