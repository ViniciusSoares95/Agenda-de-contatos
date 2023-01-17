<?php
include( 'controlpanel/acesso.php' );

$id = addslashes($_GET[ 'id' ]);

$sqlCat = "SELECT * FROM categorias ORDER BY Categoria_Descricao ASC";
$requestCat = $banco->query( $sqlCat );

$sqlUsu = "SELECT * FROM usuarios ORDER BY Usuario ASC";
$requestUsu = $banco->query( $sqlUsu );

$sqlCon = "SELECT * FROM contatos INNER JOIN usuarios ON contatos.Fk_Usuario = usuarios.Usuario JOIN categorias ON 
contatos.Fk_categoria = categorias.categoria_Id WHERE Id_Contato = '$id'";
$request = $banco->query( $sqlCon );
$rowCon = mysqli_fetch_assoc( $request );

$favorito = $rowCon['Favorito'];

$flag = $rowCon['Flag'];

if($favorito == 1) {
    $checkFavorito = '
    <label for="txtfavorito" class="fieldFlag">sim
    <input type="radio" name="txtfavorito" value="1" class="fieldFlag" checked>
  </label>
    <label for="txtfavorito" class="fieldFlag">Não
    <input type="radio" name="txtfavorito" value="0" class="fieldFlag">
  </label>';
}
else{
  $checkFavorito = '<label for="txtfavorito" class="fieldFlag">sim
    <input type="radio" name="txtfavorito" value="1" class="fieldFlag">
  </label>
  <label for="txtfavorito" class="fieldFlag">Não
    <input type="radio" name="txtfavorito" value="0" class="fieldFlag" checked>
  </label>';    
}

if($flag == 1){
  $checkFlag = '<label for="txtflag" class="fieldFlag">sim
  <input type="radio" name="txtflag" value="1" class="fieldFlag" checked>
</label>
<label for="txtflag">Não
  <input type="radio" name="txtflag" value="0" class="fieldFlag">
</label>';
}
else{
  $checkFlag = '<label for="txtflag" class="fieldFlag">sim
  <input type="radio" name="txtflag" value="1" class="fieldFlag">
</label>
<label for="txtflag">Não
  <input type="radio" name="txtflag" value="0" class="fieldFlag" checked>
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
      <form action="updateContato2.php" method="post" id="cadastra">
        <div class="user-details"> 
          <div class="input-box">
            <input type="text" name="txtnome" id="txtnome" placeholder="Nome" value="<?php echo $rowCon['Contato_Nome']; ?>">
          </div>
          <div class="input-box">
            <input type="email" name="txtemail" id="txtemail" placeholder="Email" value="<?php echo $rowCon['Email']; ?>" >
          </div>
          <div class="input-box">
            <input type="text" name="txtcep" id="txtcep" placeholder="cep" value="<?php echo $rowCon['CEP_Contato']; ?>" >
          </div>
          <div class="input-box">
           <input type="text" name="txtrua" id="txtrua" value="<?php echo $rowCon['Endereco_Rua']; ?>">
          </div>
          <div class="input-box">
            <input type="text" name="txtbairro" id="txtbairro" value="<?php echo $rowCon['Endereco_Bairro']; ?>">
          </div>
          <div class="input-box">
            <input type="text" name="txtcidade" id="txtcidade" value="<?php echo $rowCon['Endereco_Cidade']; ?>">
          </div>
          <div class="input-box">
            <input type="text" name="txtuf" id="txtuf" value="<?php echo $rowCon['Endereco_UF']; ?>">
          </div>   
          <div class="input-box">   
            <input type="text" name="txtnum" id="txtnum" placeholder="número" value="<?php echo $rowCon['Endereco_Nro']; ?>">
          </div>
          <div class="input-box">
            <input type="text" name="txtcomp" id="txtcomp" placeholder="complemento" value="<?php echo $rowCon['Endereco_Compl']; ?>">
          </div>  

          <fieldset>
           <h4 class="titleFlag">Favoritos</h4> 
            <?php echo $checkFavorito?>
          </fieldset>
          <fieldset>
           <h4 class="titleFlag">Flags-Habilitado</h4> 
              <?php echo $checkFlag?>
            </label>
          </fieldset>

          <fieldset>
            <label for="txtusuarios" class="titleUsuario"> <h4>Usuarios</h4> </label>
            <select name="txtusuarios" id="txtusuarios">

             <option value="<?php echo $rowCon['Fk_Usuario'];?>"><?php echo $rowCon['UsuarioNome']; ?></option>

              <?php while ( $rowUsu = mysqli_fetch_array( $requestUsu ) ) { ?>
              <option value="<?php echo $rowUsu['Usuario'] ?>"> <?php echo $rowUsu['UsuarioNome'] ?> </option>
              <?php } ?>
             </select>
          </fieldset>

          <fieldset>
            <label for="txtcategorias" class="titleCategoria"> <h4>Categorias</h4></label>
           <select name="txtcategorias" id="txtcategorias">
            <option value="<?php echo $rowCon['Fk_Categoria'];?> "><?php echo $rowCon['Categoria_Descricao']; ?></option>

              <?php while ( $rowCat = mysqli_fetch_array( $requestCat ) ) { ?>
              <option value="<?php echo $rowCat['categoria_Id'] ?>"> <?php echo $rowCat['Categoria_Descricao'] ?> </option>
              <?php } ?>
           </select>
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
          </fieldset>

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