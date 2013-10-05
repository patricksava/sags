<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="ISO-8859-1">
		<title>SAGS - Sistema de Aux�lio ao Gerenciamento de Servi�os v1.0</title>
		
		<link href="<?=$this->config->item('assets');?>css/basic.css" rel="stylesheet" />
		<link href="<?=$this->config->item('assets');?>css/bootstrap.min.css" rel="stylesheet" />
		<script type="text/javascript" src="<?=$this->config->item('assets');?>js/bootstrap.min.js"></script>
	</head>
	<body>
		<header class="navbar navbar-sags" role="banner" id="top">
			<div class="container">
				<a class="navbar-brand" href="#">SAGS</a>
				<div class="navbar-form navbar-right">
					<?php if(!isset($operator)){?>
					<form name="login-top" class="form-inline" action="<?=$this->config->item('base_url')?>index.php/MainController/login" method="post" >
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
					<?php } else {
						echo "Logado como: ". $operator->getName();
					}?>
				</div>
			</div>
		</header>

		<div class="main-container">
			

       