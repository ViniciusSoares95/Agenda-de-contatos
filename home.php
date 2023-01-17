<?php
include( 'controlpanel/acesso.php' );
require_once('controlpanel/verifica.php');
//contatos

if(!empty($_GET['busca'])) {
    $pesquisa = $_GET['busca'];
    $sql = "SELECT * FROM contatos WHERE Contato_Nome LIKE '%".$pesquisa."%'";
}
else{    
  $sql = "SELECT * FROM contatos ORDER BY Id_Contato DESC";
}

$request = $banco->query( $sql );




if ( isset( $_GET[ 'mudar' ] ) ) {
  $star_atual = addslashes($_GET[ 'favorito' ]);
  $id_atual = addslashes($_GET[ 'id' ]);
  if ( $star_atual == 0 ) {
    $sqlUp = "UPDATE contatos SET Favorito = 1 WHERE Id_Contato = $id_atual";
  } else {
    $sqlUp = "UPDATE contatos SET Favorito = 0 WHERE Id_Contato = $id_atual";
  }
  mysqli_query( $banco, $sqlUp );
  header( 'Location: home.php' );
  exit;
}


//deletar contato do banco

if ( isset( $_GET[ 'del1' ] ) ) {
  $btdel = addslashes($_GET[ 'del1' ]);
  $id = addslashes($_GET[ 'id' ]);
  $nome = addslashes($_GET[ 'nome' ]);
  


    if ($btdel == 'ok'){
      echo('<div class="cxnotifica">');
      echo('Deseja deletar o registro ...' . $nome . ' id = '. $id);
      echo('<br>');
      print('<a href=home.php?idok='.$id.'>Sim</a>');
      echo('<br>');
      echo('<a href=home.php>Não</a>');
      echo('</div>');
    }
}

if ( isset( $_GET[ 'idok' ] ) ) {
  $idok = $_GET['idok'];

  $sqldel = "DELETE FROM contatos WHERE Id_Contato = '$idok'";
  try{
    if(mysqli_query($banco, $sqldel)){
      echo('<div class="cxnotifica">');
      echo "Deletando Registro Aguarde....";
      echo('</div>');
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=home.php'>";
    }
    else{
      echo('<div clas="cxnotifica">');
      echo "ERRO...ESSE registro está ligado a outro, não pode apagar!!!";
      echo('</div>');
      echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=home.php'>". mysqli_error($banco);
    }
  }
  catch(Exception $e){
    echo('<div class="cxnotifica">');
    echo "OPA, FOI MAL!... Para deletar este contato precisa deletar primeiro o telefone!";
    echo('</div>');
    mysqli_close($banco);
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=home.php'>";
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
      <div class="container pesquisa">
       <div class="box-search d-flex">
          <input type="search" class="form-control me-2" id="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Pesquisar Contato" aria-label="Pesquisa">
          <button onclick="pesquisarData()" class="btn btn-outline-success">Pesquisar</button>
        </div> 
      </div>
       <div class="container d-flex justify-content-center">
             <h1 class="text-black">Contatos</h1>
        </div>
        <div class="container d-flex justify-content-center">
          <a class="btn btn-outline-success" href="cadastroContato.php">Cadastrar Contato</a>
        </div>
        <div class="container d-flex justify-content-center containerCard">
        <?php
          while ( $row = mysqli_fetch_array( $request ) ) {
            if ( $row[ 'Favorito' ] == 0 ) {
              $imgstar = 'ministar0.png';
            } else {
              $imgstar = 'ministar1.png';
            }
            
        ?>
        <div class="card cardContato">
          <div class="card-body">

          <div class="container, favoritoContato"><a href="home.php?mudar=ok&favorito=<?php echo $row['Favorito']; 
          ?>&id=<?php echo $row['Id_Contato']; ?>"><img src="image/<?php echo $imgstar; ?>" alt=""></a>
          </div>
          <div class="container infoContainer">
            <h5 class="card-title"><?php echo $row['Contato_Nome']; ?> </h5>
            <p class="card-text">Email: <?php echo $row['Email']; ?></p>
            <?php
                $idContato = $row['Id_Contato'];                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                $sql2 = "SELECT * FROM telefones WHERE Fk_Contato = $idContato ";
                $request2 = $banco->query( $sql2 ); 
                while ( $row2 = mysqli_fetch_array( $request2 ) ) { ?>
                <p class="card-text">Telefone: (<?php echo $row2['Telefone_DDD'].') '.$row2['Telefone_Nro']; ?></p>
              <?php } ?> 
          </div>
            <div class="contianer d-flex justify-content-center containerBt">
              <a href="viewContato.php?id=<?php echo $row['Id_Contato']; ?>" class="btn btn-success">Visulizar</a>
              <a href="updateContato.php?id=<?php echo $row['Id_Contato']; ?>" class="btn btn-success">Editar</a>
              <a href="home.php?del1=ok&id=<?php echo $row['Id_Contato'];
                ?>&nome=<?php echo $row['Contato_Nome'];?>" class="btn btn-success">Excluir</a>
            </div>
          </div>
        </div>
      <?php 
      }
      ?>
    </div>
    </main>
    <script src="./js/pesquisa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>