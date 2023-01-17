<?php
  include( 'controlpanel/acesso.php' );

  $id = addslashes($_POST['id']);

  $telDDIUp = addslashes($_POST['txtTelDDI']);
  $telDDDUp = addslashes($_POST['txtTelDDD']);
  $telNroUp = addslashes($_POST['txtTelNro']);
  $telTipoUp = addslashes($_POST['txtTelTipo']);

  $flagTelUp = addslashes($_POST['txtflagTel']);
  $idContatoUp = addslashes($_POST['txtIdContato']);

  //echo $nomeCad.$emailCad.$cepCad.$numCad.$compCad.$favoritoCad.$flagCad.$usuCad.$catCad;

  $sqlTelSUp = "UPDATE telefones SET Fk_Contato = '$idContatoUp', Telefone_Tipo = '$telTipoUp',
                                     Telefone_DDI = '$telDDIUp', Telefone_DDD = '$telDDDUp',
                                     Telefone_Nro = '$telNroUp', Flag = '$flagTelUp'
                                     WHERE Fk_Contato = '$id'"; 

  if ( mysqli_query( $banco, $sqlTelSUp ) ) {
      echo '<strong>Success!</strong> Telefone Atualizado!';
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=telefones.php'>";
    }else{
      echo '<strong>Erro!</strong> Telefone não Atualizado!';
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