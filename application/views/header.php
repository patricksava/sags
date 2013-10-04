<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="ISO-8859-1">
		<title>Insert title here</title>
		
		<link href="css/basic.css" rel="stylesheet" />
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<header class="navbar navbar-sags" role="banner" id="top">
			<div class="container">
				<a class="navbar-brand" href="#">SAGS</a>
				<div class="navbar-form navbar-right">
					<form name="login-top" class="form-inline" action="#" method="post" >
                        <div class="form-group">
                            <div class="col-lg-12"><input type="text" class="form-control input-sm" placeholder="Login" name="login"/></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12"><input type="password" class="form-control input-sm" placeholder="Senha" name="password"/></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12"><button class="btn btn-primary marg-left">Entrar</button></div>
                        </div>
					</form>
				</div>
			</div>
		</header>

		<div class="main-container">
			
			<div class="row">
                <div class="col-lg-2  left-action-bar">
                    <h4 class="menu-title">Menu Lateral</h4>
                    <hr />
                    <ul class="">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                        <li><a href="#">Link 5</a></li>
                        <li><a href="#">Link 6</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-push-1 login-middle">
                        <form name="login-middle" class="form-horizontal" action="#" method="post" >
                            <div class="form-group">
						        <label for="login" class="col-lg-2 control-label" > Login: </label>
                                <div class="col-lg-10"><input type="text" class="form-control" placeholder="Login" name="login"/></div>
                            </div>

                            <div class="form-group">
						        <label for="password" class="col-lg-2 control-label" > Senha: </label>
                                <div class="col-lg-10"><input type="password" class="form-control" placeholder="Senha" name="password"/></div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2"><button class="btn btn-primary">Entrar</button></div>
                            </div>
					    </form>
                    </div>
                </div>
            </div>
			
		</div>

        <hr class="footer-hr" />

		<div class="container footer-section">
			<div class="row">
				<div class="col-lg-6">
					<p>Sistema de Auxílio ao Gerenciamento de Serviços(SAGS) v1.0</p>
				</div>
				<div class="col-lg-6">
					<p align="right">Desenvolvido por: Patrick Sava, José Victor Fernandes, Ian Baldo, Adriano Gonçalves e Marta Villanueva</p>
				</div>
			</div>
			<br />
			<div class="row">
                <div class="col-lg-6"><a href="#top">Voltar ao topo</a></div>
				<div class="col-lg-6">
					<p align="right">Pontifícia Universidade Católica do Rio de Janeiro<br />INF1383 - Banco de Dados I -2013.2</p>
				</div>
			</div>
		</div>
	</body>
</html>