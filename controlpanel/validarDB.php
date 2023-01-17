<?php
require_once('acesso.php');

if (!isset( $_SESSION ) ) {
  session_start();
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Validação</title>
</head>

<body>
	<?php
    $acesso = $_POST[ 'btacessar' ];
    $login = addslashes( $_POST[ 'txtlogin' ] );
    $senha = md5(addslashes( $_POST[ 'txtpass' ] ));

    if ( $acesso == 'Acessar' ) {
      $comandoSQL = "select * from usuarios where usuario ='" . $login . "' and senha ='" . $senha . "'";
      $result = mysqli_query( $banco, $comandoSQL )or die( "Erro ao executar SQL" );

      if ( mysqli_fetch_array( $result ) ) {

        $_SESSION[ 'ativo' ] = true;
        $_SESSION[ 'login' ] = $login;

        echo "Acesso validado!! Aguarde para ser redirecionado!";
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=../home.php'>";
      } else {
        echo "Acesso bloqueado!! Senha ou Usuário errados!";
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=../index.php'>";
      }
    } 
    ?>
	
</body>
</html>
<?php
	mysqli_close( $banco );
?>