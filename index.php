<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <main>
   <div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a class="active" href="#signup-tab-content">Registar</a></h3>
			<h3 class="login-tab"><a href="#login-tab-content">Entrar</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div id="signup-tab-content" class="active">
				<form class="signup-form" action="cadastroUsuario2.php" method="post" id="cadastra">
					<div class="form-icon">
                		<span><i class="icon icon-user"><img class ="svgLogin" src="./image/svgLogin/agenda-svgrepo-com.svg" alt=""></i></span>
            		</div>
					<input type="text" class="input" name="txtnomecompl" id="txtnomecompl" autocomplete="off" placeholder="Nome Completo" required>
					<input type="text" class="input" name="txtnomeusu" id="txtnomeusu" autocomplete="off" placeholder="Usuário Nome" required>
					<input type="password" class="input" name="senhaUsu" id="senhaUsu" autocomplete="off" placeholder="Senha" required>
					<input type="submit" class="button" value="Inscrever-se">
				</form><!--.login-form-->
				<div class="help-text">

				</div><!--.help-text-->
			</div><!--.signup-tab-content-->

			<div id="login-tab-content">
				<form class="login-form" action="./controlpanel/validarDB.php" method="POST">
					<div class="form-icon">
                		<span><i class="icon icon-user"><img class ="svgLogin" src="./image/svgLogin/agenda-svgrepo-com.svg" alt=""></i></span>
            		</div>
					<input type="text" class="input" name="txtlogin" id="txlogin" autocomplete="off" placeholder="Usuário Nome">
					<input type="password" class="input" name="txtpass" id="txtpass" autocomplete="off" placeholder="Senha">
					<input type="checkbox" class="checkbox" id="remember_me">
					<label for="remember_me">Remember me</label>

					<input type="submit" class="button"  class="login__submit" name="btacessar" id="btacessar" value="Acessar">
				</form><!--.login-form-->
				<div class="help-text">
					<p><a href="#">Forget your password?</a></p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->
    </main>

 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src='./js/login.js'></script>
<script src='./js/esconderSenha.js'></script>

</body>
</html>