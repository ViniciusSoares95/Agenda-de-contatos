<?php
include( 'controlpanel/acesso.php' );
require_once('controlpanel/verifica.php');
//categorias
$sql2 = "SELECT * FROM categorias";
$request2 = $banco->query( $sql2 );

//deletar categoria do banco de dados
if ( isset( $_GET[ 'del2' ] ) ) {
  $catdel2 = addslashes($_GET[ 'del2' ]);
  $id2 = addslashes($_GET[ 'id' ]);
  $nome2 = addslashes($_GET[ 'nome' ]);
  


    if ($catdel2 == 'ok'){
      echo('<div class="cxnotifica">');
      echo('Deseja deletar a categoria ...' . $nome2 . ' id = '. $id2);
      echo('<br>');
      print('<a href=categorias.php?idok2='.$id2.'>Sim</a>');
      echo('<br>');
      echo('<a href=categorias.php>Não</a>');
      echo('</div>');
    }
}

if ( isset( $_GET[ 'idok2' ] ) ) {
  $idokcat = $_GET['idok2'];

  $sqldel = "DELETE FROM categorias WHERE categoria_Id = '$idokcat'";
  try{
    if(mysqli_query($banco, $sqldel)){
      echo('<div class="cxnotifica">');
      echo "Deletando categoria Aguarde....";
      echo('</div>');
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=categorias.php'>";
    }
    else{
      echo('<div clas="cxnotifica">');
      echo "ERRO...ESSA categoria está ligado a outro, não pode apagar!!!";
      echo('</div>');
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=categorias.php'>". mysqli_error($banco);
    }
  }
  catch(exception $e){
    echo('<div class="cxnotifica">');
    echo "OPA, FOI MAL!... Para deletar esta categoria precisa deletar os contatos contido nela!";
    echo('</div>');
    mysqli_close($banco);
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=categorias.php'>";
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
               <h1 class="text-black">Categorias</h1>
           </div>
               <div class="container d-flex justify-content-center">
                  <a class="btn btn-outline-success" href="cadastroCategoria.php">Cadastrar Categoria</a>
               </div>

                <div class="container d-flex justify-content-center containerCard">
                  <?php
                    while ( $row2 = mysqli_fetch_array( $request2 ) ) {
                  ?>
                    <div class="card cardContato">
                      <div class="card-body">
                      <div class="container infoContainer">
                        <h5 class="card-title"><?php echo $row2['Categoria_Descricao']; ?> </h5>     
                      </div>
                        <div class="contianer d-flex justify-content-center mt-5 containerBt">
                          <a href="viewCategoria.php?id=<?php echo $row2['categoria_Id']; ?>" class="btn btn-success">Visulizar</a>
                          <a href="updateCategoria.php?id=<?php echo $row2['categoria_Id']; ?>" class="btn btn-success">Editar</a>
                          <a href="categorias.php?del2=ok&id=<?php echo $row2['categoria_Id'];
                            ?>&nome=<?php echo $row2['categoria_Id'];?>" class="btn btn-success">Excluir</a>
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