<?php
include( 'controlpanel/acesso.php' );
require_once('controlpanel/verifica.php');
/*require_once('./controlpanel/verifica.php');*/
$id = addslashes($_GET[ 'id' ]);
//echo $id;


//"SELECT * FROM telefones INNER JOIN contatos ON telefones.Fk_Contato = contatos.Id_Contato
//JOIN categorias ON contatos.Fk_categoria = categorias.categoria_Id WHERE Fk_Contato = '$id'";

$sqlUsu2 = "SELECT * FROM usuarios WHERE UsuarioNome = '$id'";
$requestUsu2 = $banco->query( $sqlUsu2 );

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
    <section style="background-color: #eee;" class="boxPerfilDois">  
          <div class="container ">
            <div class="row">
              <div class="col-lg-8">
                <div class="card mb-4">
                  <div class="card-body">
                    <?php while ($rowUsu2 = mysqli_fetch_array( $requestUsu2 )) { ?>
                      <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <img class="categoriaView" src="./image/svgViewCategoria/contact-svgrepo-com.svg" alt="CategoriaView">
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-5"> <h5> <?php echo $rowUsu2['UsuarioNome'];?></h5></p>
                      </div>
                      <div class="d-flex justify-content-end">
                        <a class="btn btn-outline-success categoriaBtEditar" href="updateUsuario.php?id=<?php echo $rowCat2['Usuario']; ?>">Editar</a>
                      </div>
                    </div>
                    <?php } ?>
                    <hr>
                    <div class="d-flex justify-content-center mb-2 ">
                        <a class="btn btn-success" href="javascript:history.back();">Voltar</a>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>