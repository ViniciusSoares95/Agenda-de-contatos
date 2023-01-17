<?php
  include( 'controlpanel/acesso.php' );
  $telDDI = addslashes($_POST['txtTelDDI']);
  $telDDD = addslashes($_POST['txtTelDDD']);
  $telNro = addslashes($_POST['txtTelNro']);
  $telTipo = addslashes($_POST['txtTelTipo']);

  $flagTel = addslashes($_POST['txtflagTel']);
  $idContato = addslashes($_POST['txtIdContato']);

  //echo $nomeCad.$emailCad.$cepCad.$numCad.$compCad.$favoritoCad.$flagCad.$usuCad.$catCad;

  $sqlTelS = "INSERT INTO telefones (Fk_Contato, Telefone_Tipo, Telefone_DDI, Telefone_DDD, Telefone_Nro, Flag)
                    VALUES ('$idContato', '$telTipo', '$telDDI', '$telDDD', '$telNro', '$flagTel')"; 

  if ( mysqli_query( $banco, $sqlTelS ) ) {
      echo '<strong>Success!</strong> Telefone inserido!';
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=telefones.php'>";
    }else{
      echo '<strong>Erro!</strong> Telefone não inserido!';
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