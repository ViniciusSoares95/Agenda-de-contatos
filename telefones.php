<?php
include( 'controlpanel/acesso.php' );
require_once('controlpanel/verifica.php');
//telefones
if(!empty($_GET['buscatel'])) {
  $pesquisaTel = $_GET['buscatel'];
  $sql3 = "SELECT * FROM telefones WHERE Telefone_Nro LIKE ('%".$pesquisaTel."%')";

}
else{
  $sql3 = "SELECT * FROM telefones INNER JOIN contatos ON telefones.Fk_Contato = contatos.Id_Contato ORDER BY Telefone_DDD DESC";
}
$request3 = $banco->query( $sql3 );

//deletar Telefone
if ( isset( $_GET[ 'del3' ] ) ) {
  $teldel3 = addslashes($_GET[ 'del3' ]);
  $id3 = addslashes($_GET[ 'id' ]);
  $nome3 = addslashes($_GET[ 'nome' ]);
  
    if ($teldel3 == 'ok'){
      echo('<div class="cxnotifica">');
      echo('Deseja deletar o telefone ... ' . $nome3 . ' id = '. $id3);
      echo('<br>');
      print('<a href=telefones.php?idok3='.$id3.'>Sim</a>');
      echo('<br>');
      echo('<a href=telefones.php>Não</a>');
      echo('</div>');
    }
}

if ( isset( $_GET[ 'idok3' ] ) ) {
  $idtelokl3 = $_GET['idok3'];

  $sqldeltel3 = "DELETE FROM `telefones` WHERE Fk_Contato = '$idtelokl3'";
  if(mysqli_query($banco, $sqldeltel3)){
    echo('<div class="cxnotifica">');
    echo "Deletando o telefone Aguarde....";
    echo('</div>');
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=telefones.php'>";
  }
  else{
    echo('<div clas="cxnotifica">');
    echo "ERRO...ESSE telefone está ligado a um contato, não pode apagar!!!";
    echo('</div>');
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=telefones.php'>". mysqli_error($banco);
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

      <a class="btn btn-outline-success" href="">Sair</a>
    </div>
  </div>
</nav>
    </header>
    <main>
    <div class="container d-flex justify-content-center">
             <h1 class="text-black">Telefones</h1>
        </div>
        <div class="container d-flex justify-content-center">
          <a class="btn btn-outline-success" href="cadastroTelefone.php">Cadastrar Telefone</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone DDD</th>
                <th scope="col">Telefone DDI</th>
                <th scope="col">numero</th>
                <th scope="col"><img src="./image/svg/edit.svg" alt=""></th>
                <th scope="col"><img src="./image/svg/eye.svg" alt=""></th>
                <th scope="col"><img src="./image/svg/trash-2.svg" alt=""></th>
                </tr>
            </thead>
            <tbody>
            <?php
              while ( $row3 = mysqli_fetch_array( $request3 ) ) {
                echo "<tr>";
                echo "<td>" .$row3['Contato_Nome']."</td>"; 
                echo "<td>" .$row3['Telefone_DDI']; "</td>";
                echo "<td>" .$row3['Telefone_DDD']. "</td>"; 
                echo "<td>" .$row3['Telefone_Nro']. "</td>"; 
                echo"<td>"?><a class="btn btn-success" href="updateTelefone.php?id=<?php echo $row3['Fk_Contato']; ?>">Editar</a><?php "</td>";
                echo"<td>"?><a class="btn btn-success" href="viewTeleefone.php?id=<?php echo $row3['Fk_Contato']; ?>">Visualizar</a><?php "</td>"; 
                echo"<td>"?><a class="btn btn-danger" href="telefones.php?del3=ok&id=<?php echo $row3['Fk_Contato'];?>&nome=<?php echo $row3['Telefone_Nro'];?>">Delete</a><?php "</td>"; 
                echo "</tr>";
              } 
              ?>

            </tbody>
        </table>
        </div>
    </main>
    <script src="./js/pesquisa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>