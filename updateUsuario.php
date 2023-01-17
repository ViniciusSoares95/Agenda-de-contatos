<?php
include( 'controlpanel/acesso.php' );

$id = addslashes($_GET[ 'id' ]);

$sqlUsuarioUp = "SELECT * FROM usuarios WHERE UsuarioNome = '$id'";
$requestUsuarioUp = $banco->query( $sqlUsuarioUp );
$rowUsuarioUp = mysqli_fetch_assoc( $requestUsuarioUp );

$administrador = $rowUsuarioUp['Administrador'];

$flag = $rowUsuarioUp['Flag'];

if($administrador == 1) {
    $checkAdministrador = '
    <label for="txtadministrador" class="fieldFlag">sim
    <input type="radio" name="txtadministrador" value="1" class="fieldFlag" checked>
  </label>
    <label for="txtadministrador" class="fieldFlag">Não
    <input type="radio" name="txtadministrador" value="0" class="fieldFlag">
  </label>';
}
else{
  $checkAdministrador = '<label for="txtadministrador" class="fieldFlag">sim
    <input type="radio" name="txtadministrador" value="1" class="fieldFlag">
  </label>
  <label for="txtadministrador">Não
    <input type="radio" name="txtadministrador" value="0" class="fieldFlag" checked>
  </label>';    
}

if($flag == 1){
  $checkFlagUsuario = '<label for="txtflagUsuario" class="fieldFlag">sim
  <input type="radio" name="txtflagUsuario" value="1" class="fieldFlag" checked>
</label>
<label for="txtflagUsuario">Não
  <input type="radio" name="txtflagUsuario" value="0" class="fieldFlag" >
</label>';
}
else{
  $checkFlagUsuario = '<label for="txtflagUsuario" class="fieldFlag">sim
  <input type="radio" name="txtflagUsuario" value="1" class="fieldFlag">
</label>
<label for="txtflagUsuario">Não
  <input type="radio" name="txtflagUsuario" value="0" class="fieldFlag" checked>
</label>';
}

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
    <h1 class="Title">Atualizar Cadastro</h1>
  <div class="content"> 
    <!--Criar o Form de cadastro. -->
    <form action="updateUsuario2.php" method="post" id="cadastra">
    <div class="user-details">
      <div class="input-box"> 
      <input type="text" name="txtnomecompl" id="txtnomecompl" placeholder="Nome Completo"
      value="<?php echo $rowUsuarioUp['UsuarioNome']; ?>">
      </div>
      <div class="input-box">
      <input type="text" readonly="readonly" name="txtnomeusu" id="txtnomeusu" placeholder="Nome Usuário"
      value="<?php echo $rowUsuarioUp['Usuario']; ?>">
      </div>
      <div class="input-box">
      <input type="text" name="senhaUsu" id="senhaUsu" placeholder="Digite a senha"
      value="<?php echo $rowUsuarioUp['Senha']; ?>">
      </div>

      <fieldset>
      <h4 class="titleFlag">Administrador</h4>  
        <?php echo $checkAdministrador?>
      </fieldset>
      <fieldset>
       <h4 class="titleFlag">Flags-Habilitado</h4> 
          <?php echo $checkFlagUsuario?>
        </label>
      </fieldset>
      
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
      <div clas="bt">
      <input type="submit" name="btCad" id="btCad" value="Atualizar" class="botao">
      </div>
      <div clas="bt">
      <button>
      <a class="btVoltar" href="javascript:history.back();">Cancelar <- </a>
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