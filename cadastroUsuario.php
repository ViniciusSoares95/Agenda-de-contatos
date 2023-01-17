<?php
include( 'controlpanel/acesso.php' );

//$sqlCat = "SELECT * FROM categorias ORDER BY Categoria_Descricao ASC";
//$requestCat = $banco->query( $sqlCat );

//$sqlUsu = "SELECT * FROM usuarios ORDER BY Usuario ASC";
//$requestUsu = $banco->query( $sqlUsu );


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
    <h1 class="Title">Cadastrar novo Usuário</h1>
    <div class="content">
    <!--Criar o Form de cadastro. -->
      <form action="cadastroUsuario2.php" method="post" id="cadastra">
        <div class="user-details"> 
          <div class="input-box">
            <input type="text" name="txtnomecompl" id="txtnomecompl" placeholder="Nome Completo" required>
          </div>
          <div class="input-box">
            <input type="text" name="txtnomeusu" id="txtnomeusu" placeholder="Nome Usuário" required>
          </div>
          <div class="input-box">
            <input type="text" name="senhaUsu" id="senhaUsu" placeholder="Digite a senha" required>
          </div>
          <fieldset>
           <h4 class="titleFlag">Administrador</h4> 
            <label for="txtadm">sim
              <input type="radio" name="txtadm" value="1" class="fieldFlag">
            </label>
            <label for="txtadm">Não
              <input type="radio" name="txtadm" value="0" class="fieldFlag" checked>
            </label>
          </fieldset>

          <fieldset>
           <h4 class="titleFlag">Flags-Habilitado</h4> 
            <label for="txtflag">sim
              <input type="radio" name="txtflag" value="1" class="fieldFlag">
            </label>
            <label for="txtflag">Não
              <input type="radio" name="txtflag" value="0" class="fieldFlag" checked>
            </label>
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