<?php
include( 'controlpanel/acesso.php' );
$id = addslashes($_POST['id']);
$nomeCompl = addslashes($_POST['txtnomecompl']);
$nomeUsu = addslashes($_POST['txtnomeusu']);
$senhaUsu = addslashes($_POST['senhaUsu']);
$adm = addslashes($_POST['txtadministrador']);
$flagUsu = addslashes($_POST['txtflagUsuario']);

//echo $nomeCat. $siglaCat. $flagCat; 

$sqlUsuUp = "UPDATE usuarios SET Usuario = '$nomeUsu', Senha = '$senhaUsu', Administrador = '$adm',
UsuarioNome = '$nomeCompl', Flag = '$flagUsu' WHERE UsuarioNome = '$id'";

if ( mysqli_query( $banco, $sqlUsuUp ) ) {
    echo '<strong>Success!</strong> Usuário Atualizado!';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=usuarios.php'>";
  }else{
	  echo '<strong>Erro!</strong> Usuário não Atualizo...!';
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