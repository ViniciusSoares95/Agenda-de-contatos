<?php
include( 'controlpanel/acesso.php' );

$id = addslashes($_GET[ 'id' ]);

$sqlCatUp = "SELECT * FROM categorias WHERE categoria_Id = '$id'";
$requestCatUp = $banco->query( $sqlCatUp );
$rowCatUp = mysqli_fetch_assoc( $requestCatUp );

$flag = $rowCatUp['Flag'];

if($flag == 1){
  $checkFlag = '<label for="txtflagCat" class="fieldFlag">sim
  <input type="radio" name="txtflagCat" value="1" class="fieldFlag" checked>
</label>
<label for="txtflag" class="fieldFlag">Não
  <input type="radio" name="txtflagCat" value="0" class="fieldFlag" >
</label>';
}
else{
  $checkFlag = '<label for="txtflagCat" class="fieldFlag">sim
  <input type="radio" name="txtflagCat" value="1" class="fieldFlag">
</label>
<label for="txtflag" class="fieldFlag">Não
  <input type="radio" name="txtflagCat" value="0" class="fieldFlag" checked>
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
      <h1>Atualizar Categoria</h1>
    <div class="content">
      <!--Criar o Form de cadastro. -->
      <form action="updateCategoria2.php" method="post" id="cadastra">
        <div class="user-details"> 
            <div class="input-box"> 
              <input type="text" name="txtnomeCat" id="txtnomeCat" placeholder="Nome Categoria"
              value="<?php echo $rowCatUp['Categoria_Descricao']; ?>">
            </div>  
            <div class="input-box">
              <input type="text" name="txtsiglaCat" id="txtsiglaCat" placeholder="insira Sigla da Categoria 'G'"
              value="<?php echo $rowCatUp['categoria_Id']; ?>">
            </div>  

              <fieldset>
               <h4 class="titleFlag">Flags-Habilitado</h4> 
                  <?php echo $checkFlag?>
                </label>
              </fieldset>

              <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
              <div clas="bt">
               <input type="submit" name="btCat" id="btCat" value="Atualizar" class="botao">
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