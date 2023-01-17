<?php
include( 'controlpanel/acesso.php' );
$nomeCompl = addslashes($_POST['txtnomecompl']);
$nomeUsu = addslashes($_POST['txtnomeusu']);
$senhaUsu = md5(addslashes($_POST['senhaUsu']));
$administradorUsu = addslashes($_POST['txtadm']);
$flagCad = addslashes($_POST['txtflag']);

//echo $nomeCad.$emailCad.$cepCad.$numCad.$compCad.$favoritoCad.$flagCad.$usuCad.$catCad;

$sqlUsu = "INSERT INTO usuarios (Usuario, Senha, Administrador, UsuarioNome, Flag) 
                VALUES ('$nomeUsu', '$senhaUsu', '$administradorUsu', '$nomeCompl', '$flagCad')"; 

if ( mysqli_query( $banco, $sqlUsu ) ) {
    echo '<strong>Success!</strong> Registro inserido!';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=usuarios.php'>";
  }else{
	  echo '<strong>Erro!</strong> Registro não inserido!';
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