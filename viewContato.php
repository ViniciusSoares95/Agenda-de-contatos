
<?php
include( 'controlpanel/acesso.php' );
require_once('controlpanel/verifica.php');
$id = addslashes($_GET[ 'id' ]);
//echo $id;
/*$sqlCon = "SELECT * FROM contatos WHERE Id_Contato = $id";*/

$sqlCon = "SELECT * FROM contatos INNER JOIN telefones ON contatos.Id_Contato = telefones.Fk_Contato WHERE Id_Contato = $id";
$request = $banco->query( $sqlCon );
$rowCon = mysqli_fetch_assoc( $request );

$sqlCon2 = "SELECT * FROM contatos INNER JOIN telefones ON contatos.Id_Contato = telefones.Fk_Contato WHERE Id_Contato = $id";
$request2 = $banco->query($sqlCon2);
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
        <section style="background-color: #eee;" class="boxPerfilUm">
          <div class="container py-0">
            <div class="row">
              <div class="col-lg-4 viewCardPerfl">
                <div class="card mb-3">
                  <div class="card-body text-center">
                    <img src="./image/lufi.webp" alt="Foto de perfil"
                      class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3"><?php echo $rowCon['Contato_Nome'];?></h5>
                    <p class="text-muted mb-1">Categoria do Contato (<?php echo $rowCon['Fk_Categoria'];?>)</p>
                    <p class="text-muted mb-4"><?php echo $rowCon['Endereco_Cidade'].', '. $rowCon['Endereco_UF'];?> </p>
                    <div class="d-flex justify-content-center mb-2 containerBt">
                    <a class="btn btn-success" href="javascript:history.back();">Voltar</a>
                    <a class="btn btn-success" href="updateContato.php?id=<?php echo $rowCon['Id_Contato']; ?>">Editar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
        </section>
        <section style="background-color: #eee;" class="boxPerfilDois">  
          <div class="container ">
            <div class="row">
              <div class="col-lg-8">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Nome</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo $rowCon['Contato_Nome'];?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo $rowCon['Email'];?></p>
                      </div>
                    </div>
                    <?php while ($rowCon2 = mysqli_fetch_array( $request2 )) { ?>
                      <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Telefone</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">(<?php echo $rowCon2['Telefone_DDD'].') '.$rowCon2['Telefone_Nro'];?></p>
                      </div>
                    </div>
                    <?php } ?>
                    <hr>
                    
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Endereço</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo $rowCon['Endereco_Rua']. ', '. $rowCon['Endereco_Nro']. 
                        ' - '. $rowCon['Endereco_Bairro']. ' - '. $rowCon['Endereco_Cidade']. ', '. $rowCon['CEP_Contato'];?> </p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Complemento</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo $rowCon['Endereco_Compl'];?> </p>
                      </div>
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