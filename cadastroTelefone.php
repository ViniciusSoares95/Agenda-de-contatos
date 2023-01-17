    <?php
    include( 'controlpanel/acesso.php' );

    $sqlTel = "SELECT * FROM contatos ORDER BY Id_Contato ASC";
    $requestTel = $banco->query( $sqlTel );
    
    ?>
    <!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Novo Cadastro</title>
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="js/main.js"></script>
    </head>

    <body>
    <header></header>
    <main>
    <section class="container">    
        <h1 class="Title">Cadastrar Telefone</h1>
        <div class="content">  
            <!--Criar o Form de cadastro. -->
            <form action="cadastroTelefone2.php" method="post" id="cadastra">
             <div class="user-details"> 

                <fieldset>     
                    <label for="txtIdContato" class="titleCategoria"> <h4>Contato</h4></label>
                    <select name="txtIdContato" id="txtIdContato">
                        <?php while ( $rowTel = mysqli_fetch_array( $requestTel ) ) { ?>
                        <option value="<?php echo $rowTel['Id_Contato']?>">
                        <?php echo $rowTel['Contato_Nome'] ?> </option>
                        <?php } ?>
                     </select>    
                </fieldset>

                <div class="input-box">
                 <input type="text" name="txtTelDDI" id="txtTelDDI" placeholder="Telefone DDI" required>
                </div> 
                <div class="input-box">      
                 <input type="text" name="txtTelDDD" id="txtTelDDD" placeholder="Telefone DDD" required>
                </div>
                <div class="input-box">
                 <input type="text" name="txtTelNro" id="txtTelNro" placeholder="Telefone Número" required>
                </div>

                <fieldset>
                   <h4 class="titleFlag">Telefone</h4> 
                    <label for="txtTelTipo">Fixo
                    <input type="radio" name="txtTelTipo" value="1" class="fieldFlag">
                    </label>
                    <label for="txtTelTipo">Movel
                    <input type="radio" name="txtTelTipo" value="0" class="fieldFlag" checked>
                    </label>
                </fieldset> 
                
                <fieldset>
                  <h4 class="titleFlag">Flags-Habilitado</h4>  
                    <label for="txtflagTel">sim
                    <input type="radio" name="txtflagTel" value="1" class="fieldFlag">
                    </label>
                    <label for="txtflagTel">Não
                    <input type="radio" name="txtflagTel" value="0" class="fieldFlag" checked>
                    </label>
                </fieldset>

                <div clas="bt"> 
                 <input type="submit" name="btCad" id="btCad" value="Cadastrar" class="botao">
                </div> 

                <div clas="bt">
                    <button>
                    <a class="btVoltar" href="javascript:history.back();">Cancelar</a>
                    </button>
                </div>    
            </div>    
            </form>
        </div>    
    </section>
    </main>
    <footer></footer>
    </body>
    </html>