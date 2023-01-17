<?php
include( 'controlpanel/acesso.php' );
require_once('controlpanel/verifica.php');
$id = addslashes($_GET[ 'id' ]);
//echo $id;

//SELECT * FROM telefones INNER JOIN contatos ON telefones.Fk_Contato = contatos.Id_Contato WHERE Fk_Contato = '$id';

$sqlTel2 = "SELECT * FROM telefones INNER JOIN contatos ON telefones.Fk_Contato = contatos.Id_Contato
JOIN categorias ON contatos.Fk_categoria = categorias.categoria_Id WHERE Fk_Contato = '$id'";
$requestTel2 = $banco->query( $sqlTel2 );
$rowTel2 = mysqli_fetch_assoc( $requestTel2 );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Telefone</title>
<link rel="stylesheet" href="css/style.css">
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

      <a class="btn btn-outline-success" href="">Sair</a>
    </div>
  </div>
</nav>
    </header>
<div class="card border-info mb-3 centered" style="max-width: 80rem;">
  <div class="card-header"><h1>Dados Completos</h1></div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Cidade</th>
                <th scope="col">CEP</th>
                <th scope="col">bairro</th>
                <th scope="col">Rua</th>
                <th scope="col">Número</th>
                <th scope="col">Complemento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $rowTel2['Contato_Nome'];?></td>
                    <td><?php echo $rowTel2['Email'];?></td>     
                    <td><?php echo $rowTel2['Endereco_Cidade'];?></td>
                    <td><?php echo $rowTel2['CEP_Contato'];?></td>
                    <td><?php echo $rowTel2['Endereco_Bairro'];?></td>
                    <td><?php echo $rowTel2['Endereco_Rua'];?></td>
                    <td><?php echo $rowTel2['Endereco_Nro'];?></td>
                    <td><?php echo $rowTel2['Endereco_Compl'];?></td>
                </tr>
            </tbody>
        </table> 
    </div>
        <div class="card-header"><h1>Telefones</h1></div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Telefone DDI</th>
                <th scope="col">Telefone DDD</th>
                <th scope="col">Telefone Número</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $rowTel2['Telefone_DDI'];?></td>
                    <td><?php echo $rowTel2['Telefone_DDD'];?></td>     
                    <td><?php echo $rowTel2['Telefone_Nro'];?></td>
                </tr>
            </tbody>
        </table> 
        <div class="btviewtelefone">
            <a class="btn btn-success" href="javascript:history.back();">Voltar</a>
            <a class="btn btn-success" href="updateTelefone.php?id=<?php echo $rowTel2['Fk_Contato']; ?>">Editar Telefone</a>
            <a class="btn btn-success" href="updateContato.php?id=<?php echo $rowTel2['Id_Contato']; ?>">Editar Contato</a>
        </div>    
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>