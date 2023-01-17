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
    <h1>Cadastrar nova Categoria</h1>
  
    <!--Criar o Form de cadastro. -->
    <div class="content">
      <form action="cadastroCategoria2.php" method="post" id="cadastra">
       <div class="user-details">
          <div class="input-box">
           <input type="text" name="txtnomeCat" id="txtnomeCat" placeholder="Nome Categoria" required>
          </div>
          <div class="input-box">
           <input type="text" name="txtsiglaCat" id="txtsiglaCat" placeholder=" insira Sigla da Categoria 'G'" required>
          </div>

          <fieldset>
           <h4 class="titleFlag">Flags-Habilitado</h4>
            <label for="txtflagCat">sim
              <input type="radio" name="txtflagCat" value="1" class="fieldFlag">
            </label>
            <label for="txtflag">Não
              <input type="radio" name="txtflagCat" value="0" class="fieldFlag" checked>
            </label>
          </fieldset>

          <div clas="bt">
            <input type="submit" name="btCat" id="btCat" value="Cadastrar" class="botao">
          </div> 
          
          <div clas="bt">
            <button>
            <a class="btVoltar" href="javascript:history.back();">Cancelar </a>
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