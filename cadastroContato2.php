  <?php
  include( 'controlpanel/acesso.php' );
  $nomeCad = addslashes($_POST['txtnome']);
  $emailCad = addslashes($_POST['txtemail']);
  $cepCad = addslashes($_POST['txtcep']);
  $numCad = addslashes($_POST['txtnum']);
  $compCad = addslashes($_POST['txtcomp']);

  $ruaCad = addslashes($_POST['txtrua']);
  $bairroCad = addslashes($_POST['txtbairro']);
  $cidadeCad = addslashes($_POST['txtcidade']);
  $ufCad = addslashes($_POST['txtuf']);

  $favoritoCad = addslashes($_POST['txtfavorito']);
  $flagCad = addslashes($_POST['txtflag']);
  $usuCad = addslashes($_POST['txtusuarios']);
  $catCad = addslashes($_POST['txtcategorias']);


  //echo $nomeCad.$emailCad.$cepCad.$numCad.$compCad.$favoritoCad.$flagCad.$usuCad.$catCad;
  
  $sqlCadS = "INSERT INTO contatos VALUES (null, '$nomeCad','$emailCad','$cepCad','$ufCad', '$cidadeCad', '$bairroCad', '$ruaCad', '$numCad', '$compCad', '$favoritoCad', '$flagCad', '$usuCad', '$catCad')"; 
  
  if ( mysqli_query( $banco, $sqlCadS ) ) {
      echo '<strong>Success!</strong> Registro inserido!';
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=home.php'>";
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