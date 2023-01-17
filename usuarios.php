<?php
include( 'controlpanel/acesso.php' );
require_once('controlpanel/verifica.php');
//usuários
$sql4 = "SELECT * FROM usuarios ORDER BY Usuario DESC";
$request4 = $banco->query( $sql4 );

//deletar Usuário
if ( isset( $_GET[ 'del4' ] ) ) {
  $usudel4 = addslashes($_GET[ 'del4' ]);
  $id4 = addslashes($_GET[ 'id' ]);
  $nome4 = addslashes($_GET[ 'nome' ]);
  


    if ($usudel4 == 'ok'){
      echo('<div class="cxnotifica">');
      echo('Deseja deletar o usuário ... ' . $nome4 . ' id = '. $id4);
      echo('<br>');
      print('<a href=usuarios.php?idok4='.$id4.'>Sim</a>');
      echo('<br>');
      echo('<a href=usuarios.php>Não</a>');
      echo('</div>');
    }
}

if ( isset( $_GET[ 'idok4' ] ) ) {
  $idokusu = $_GET['idok4'];

  $sqldelusu = "DELETE FROM usuarios WHERE Usuario = '$idokusu'";
  try{
    if(mysqli_query($banco, $sqldelusu)){
      echo('<div class="cxnotifica">');
      echo "Deletando o usuário Aguarde....";
      echo('</div>');
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=usuarios.php'>";
    }
    else{
      echo('<div clas="cxnotifica">');
      echo "ERRO...ESSE usuário está ligado a um contato, não pode apagar!!!";
      echo('</div>');
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=usuarios.php'>". mysqli_error($banco);
    }
  }
  catch(Exception $e){
    echo('<div class="cxnotifica">');
    echo "OPA, FOI MAL!... Para deletar este usuário precisa deletar primeiro o contato e teleefone dele!";
    echo('</div>');
    mysqli_close($banco);
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=usuarios.php'>";
}
}

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Angeda de Contato</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <header class="mb-5">
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item"> 
        <a class="navbar-brand" href="home.php">Contatos</a>
      </li>
        <li class="nav-item">
          <a class="navbar-brand" aria-current="page" href="telefones.php">Telefones</a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand" href="categorias.php">Categorias</a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand" href="usuarios.php">Usuários</a>
        </li>
      </ul>
      <a class="btn btn-outline-success" href="logout.php">Sair</a>
    </div>
  </div>
</nav>
    </header>
    <main>
      <div class="container d-flex justify-content-center">
        <h1 class="text-black">Usuários</h1>
      </div>
        <div class="container d-flex justify-content-center">
          <a class="btn btn-outline-success" href="cadastroUsuario.php">Cadastrar Usuário</a>
        </div>
        <div class="container d-flex justify-content-center containerCard">
              <?php while ( $row4 = mysqli_fetch_array( $request4 ) ) { ?>
                    <div class="card cardContato">
                      <div class="card-body">
                      <div class="container infoContainer">
                        <h5 class="card-title"><?php echo $row4['UsuarioNome']; ?> </h5>     
                      </div>
                        <div class="contianer d-flex justify-content-center mt-5 containerBt">
                          <a href="viewUsuario.php?id=<?php echo $row4['UsuarioNome']; ?>" class="btn btn-success">Visulizar</a>
                          <a href="updateUsuario.php?id=<?php echo $row4['UsuarioNome']; ?>" class="btn btn-success">Editar</a>
                          <a href="usuarios.php?del4=ok&id=<?php echo $row4['UsuarioNome'];?>&nome=<?php echo $row4['Usuario'];?>" class="btn btn-success">Excluir</a>
                        </div>
                      </div>
                    </div>
                  <?php 
                  }
                  ?>
          </div>
        
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>