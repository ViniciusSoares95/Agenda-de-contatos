<?php
include( 'controlpanel/acesso.php' );
$nomeCat = addslashes($_POST['txtnomeCat']);
$siglaCat = addslashes($_POST['txtsiglaCat']);
$flagCat = addslashes($_POST['txtflagCat']);

//echo $nomeCad.$emailCad.$cepCad.$numCad.$compCad.$favoritoCad.$flagCad.$usuCad.$catCad;

$sqlCatS = "INSERT INTO categorias VALUES ('$siglaCat','$nomeCat','$flagCat')"; 

if ( mysqli_query( $banco, $sqlCatS ) ) {
    echo '<strong>Success!</strong> Categoria inserido!';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=categorias.php'>";
  }else{
	  echo '<strong>Erro!</strong> Categoria não inserido!';
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
	
	
</body>
</html>