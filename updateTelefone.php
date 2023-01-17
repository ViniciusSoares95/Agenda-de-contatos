<?php
include( 'controlpanel/acesso.php' );

$id = addslashes($_GET[ 'id' ]);

$sqlTel = "SELECT * FROM contatos ORDER BY Contato_nome DESC";
$requestTel = $banco->query( $sqlTel );

$sqlTelUp = "SELECT * FROM telefones WHERE Fk_Contato = '$id'";
$requestTelUp = $banco->query( $sqlTelUp );
$rowTelUp = mysqli_fetch_assoc( $requestTelUp );

$telTipo = $rowTelUp['Telefone_Tipo'];

$flag = $rowTelUp['Flag'];

if($telTipo == 1) {
    $checkTelTipo = '
    <label for="txtTelTipo" class="fieldFlag">sim
    <input type="radio" name="txtTelTipo" value="1" class="fieldFlag" checked>
  </label>
    <label for="txtTelTipo">Não
    <input type="radio" name="txtTelTipo" value="0" class="fieldFlag">
  </label>';
}
else{
  $checkTelTipo = '<label for="txtTelTipo" class="fieldFlag">sim
    <input type="radio" name="txtTelTipo" value="1" class="fieldFlag">
  </label>
  <label for="txtTelTipo">Não
    <input type="radio" name="txtTelTipo" value="0" class="fieldFlag" checked>
  </label>';    
}

if($flag == 1){
  $checkFlagTel = '<label for="txtflagTel" class="fieldFlag">sim
  <input type="radio" name="txtflagTel" value="1" class="fieldFlag" checked>
</label>
<label for="txtflagTel">Não
  <input type="radio" name="txtflagTel" value="0" class="fieldFlag" >
</label>';
}
else{
  $checkFlagTel = '<label for="txtflagTel" class="fieldFlag">sim
  <input type="radio" name="txtflagTel" value="1" class="fieldFlag">
</label>
<label for="txtflagTel">Não
  <input type="radio" name="txtflagTel" value="0" class="fieldFlag" checked>
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
    <h1>Atualizar Telefone</h1>
    <div class="content">  
      <!--Criar o Form de cadastro. -->
      <form action="updateTelefone2.php" method="post" id="cadastra">
         <div class="user-details">
           <fieldset>
              <label for="txtIdContato" class="titleUsuario"><h4>Contato</h4></label>
              <select name="txtIdContato" id="txtIdContato">
                <?php while ( $rowTel = mysqli_fetch_array( $requestTel ) ) { ?>
                <option value="<?php echo $rowTel['Id_Contato'] ?>"> <?php echo $rowTel['Contato_Nome'] ?> </option>
                <?php } ?>
              </select>
            </fieldset>
              <div class="input-box">
                <input type="text" name="txtTelDDI" id="txtTelDDI" placeholder="Telefone DDI"
                value="<?php echo $rowTelUp['Telefone_DDI']; ?>">
              </div>
              <div class="input-box">
                <input type="text" name="txtTelDDD" id="txtTelDDD" placeholder="Telefone DDD"
                value="<?php echo $rowTelUp['Telefone_DDD']; ?>">
              </div>  
              <div class="input-box">
                <input type="text" name="txtTelNro" id="txtTelNro" placeholder="Telefone Número"
                value="<?php echo $rowTelUp['Telefone_Nro']; ?>">
              </div>  

              <fieldset>
               <h4 class="titleFlag">Telefone</h4> 
                <?php echo $checkTelTipo?>
              </fieldset>
              <fieldset>
               <h4 class="titleFlag">Flags-Habilitado</h4> 
                  <?php echo $checkFlagTel?>
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