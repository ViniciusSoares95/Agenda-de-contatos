<?php
include( 'controlpanel/acesso.php' );
$id = addslashes($_POST['id']);
$nomeCad = addslashes( $_POST[ 'txtnome' ] );
$emailCad = addslashes( $_POST[ 'txtemail' ] );
$cepCad = addslashes($_POST[ 'txtcep' ]);
$numCad = addslashes($_POST[ 'txtnum' ]);
$compCad = addslashes($_POST[ 'txtcomp' ]);

 

$ruaCad = addslashes($_POST[ 'txtrua' ]);
$bairroCad = addslashes($_POST[ 'txtbairro' ]);
$cidadeCad = addslashes($_POST[ 'txtcidade' ]);
$ufCad = addslashes($_POST[ 'txtuf' ]);

 

$favoritoCad = addslashes($_POST[ 'txtfavorito' ]);
$flagCad = addslashes($_POST[ 'txtflag' ]);
$usuCad = addslashes($_POST[ 'txtusuarios' ]);
$catCad = addslashes($_POST[ 'txtcategorias' ]);

 

$sqlUp = "UPDATE contatos SET FK_Categoria = '$catCad', Id_Contato = '$id', Contato_Nome = '$nomeCad', Email = '$emailCad', CEP_Contato = '$cepCad', Endereco_UF = '$ufCad', Endereco_Cidade = '$cidadeCad', Endereco_Bairro = '$bairroCad', Endereco_Rua = '$ruaCad', Endereco_Nro = '$numCad', Endereco_Compl = '$compCad', Favorito = '$favoritoCad', Flag = '$flagCad', Fk_Usuario = '$usuCad' WHERE Id_Contato = '$id'";

 

if ( mysqli_query( $banco, $sqlUp ) ) {

 

  echo '<strong>Success!</strong> Registro Alterado!';
  echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=index.php'>";
} else {
  echo '<strong>Erro!</strong> Registro não inserido!';
}

?>