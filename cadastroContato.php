  <?php
  include( 'controlpanel/acesso.php' );

  $sqlCat = "SELECT * FROM categorias ORDER BY Categoria_Descricao ASC";
  $requestCat = $banco->query( $sqlCat );

  $sqlUsu = "SELECT * FROM usuarios ORDER BY Usuario ASC";
  $requestUsu = $banco->query( $sqlUsu );


  ?>
  <!doctype html>
  <html>
  <head>
  <meta charset="utf-8">
  <title>Novo Cadastro</title>
  <link rel="stylesheet" href="css/form.css">
  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
  <script type="text/javascript" src="js/main.js"></script>
  </head>

  <body>
  <header></header>
  <main>
    <section class="container">
      <h1 class="Title">Cadastrar novo Contato</h1>
     
      <!--Criar o Form de cadastro. -->
      <div class="content">
      <form action="cadastroContato2.php" method="post" id="cadastra" required>
        <div class="user-details"> 
          <div class="input-box">
            <input type="text" name="txtnome" id="txtnome" placeholder="Nome" required>
          </div> 
          <div class="input-box">
            <input type="email" name="txtemail" id="txtemail" placeholder="Email" required>
          </div>
          <div class="input-box">
            <input type="text" name="txtcep" id="txtcep" placeholder="C.E.P" required>
          </div>
          <div class="input-box">
            <input type="text" name="txtrua" id="txtrua" placeholder="Rua">
          </div>
          <div class="input-box">
            <input type="text" name="txtbairro" id="txtbairro" placeholder="Bairro">
          </div>
          <div class="input-box">
            <input type="text" name="txtcidade" id="txtcidade" placeholder="Cidade">
          </div>
          <div class="input-box">
            <input type="text" name="txtuf" id="txtuf" placeholder="U.F.">
          </div>
          <div class="input-box">
            <input type="text" name="txtnum" id="txtnum" placeholder="Número" required>
          </div>
          <div class="input-box">
          <input type="text" name="txtcomp" id="txtcomp" placeholder="Complemento">
          </div> 

          <fieldset>
           <h4 class="titleFlag">Favoritos</h4> 
            <label for="txtfavorito" class="fieldFlag">sim
              <input type="radio" name="txtfavorito" value="1" class="fieldFlag">
            </label>
            <label for="txtfavorito">Não
              <input type="radio" name="txtfavorito" value="0" class="fieldFlag" checked>
            </label>
          </fieldset>
          
          <fieldset>
           <h4 class="titleFlag">Flags-Habilitado</h4> 
            <label for="txtflag" class="fieldFlag">sim
              <input type="radio" name="txtflag" value="1" class="fieldFlag">
            </label>
            <label for="txtflag" class="fieldFlag">Não
              <input type="radio" name="txtflag" value="0" class="fieldFlag" checked>
            </label>
          </fieldset>

          <fieldset>
            <label for="txtusuarios" class="titleUsuario"> <h4>Usuarios</h4></label>
            <select name="txtusuarios" id="txtusuarios">
              <?php while ( $rowUsu = mysqli_fetch_array( $requestUsu ) ) { ?>
              <option value="<?php echo $rowUsu['Usuario']?>"> <?php echo $rowUsu['UsuarioNome'] ?> </option>
              <?php } ?>
            </select>
          </fieldset> 

          <fieldset>
            <label for="txtcategorias" class="titleCategoria"> <h4>Categorias</h4> </label>
            <select name="txtcategorias" id="txtcategorias">
              <?php while ( $rowCat = mysqli_fetch_array( $requestCat ) ) { ?>
              <option value="<?php echo $rowCat['categoria_Id'] ?>"> <?php echo $rowCat['Categoria_Descricao'] ?> </option>
              <?php } ?>
            </select>
          </fieldset>  

          <div clas="bt">
             
            <input type="submit" name="btCad" id="btCad" value="Cadastrar" class="botao">
          </div>
          <div clas="bt">
            <button>
            <a class="btVoltar" href="javascript:history.back();">Cancelar</a>
            </button>
          </div> 
          
        </div>   
      </form>
      </div>
    </section>
  </main>
  <footer></footer>
  </body>
  </html>