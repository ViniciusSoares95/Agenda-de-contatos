<?php
include( 'controlpanel/acesso.php' );
$id = addslashes($_POST['id']);
$nomeCat = addslashes($_POST['txtnomeCat']);
$siglaCat = addslashes($_POST['txtsiglaCat']);
$flagCat = addslashes($_POST['txtflagCat']);

//echo $nomeCat. $siglaCat. $flagCat; 

$sqlCatUp = "UPDATE categorias SET categoria_Id = '$siglaCat', Categoria_Descricao = '$nomeCat',
Flag = '$flagCat' WHERE categoria_Id = '$id'";

if ( mysqli_query( $banco, $sqlCatUp ) ) {
    echo '<strong>Success!</strong> Categoria Atualizada!';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=categorias.php'>";
  }else{
	  echo '<strong>Erro!</strong> Categoria não Atualiza...!';
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Atualizar Categoria</title>
</head>

<body>
	
	
</body>
</html>