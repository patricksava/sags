<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>SAGS - Sistema de Auxílio ao Gerenciamento de Servços v1.0</title>
		
		<link href="<?=$this->config->item('assets');?>css/basic.css" rel="stylesheet" />
		<link href="<?=$this->config->item('assets');?>css/bootstrap.min.css" rel="stylesheet" />
		<script type="text/javascript" src="<?=$this->config->item('assets');?>js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="<?=$this->config->item('assets');?>js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<header class="navbar navbar-sags" role="banner" id="top">
			<div class="container">
				<a class="navbar-brand" href="#">SAGS</a>
				<div class="navbar-form navbar-right">
					<?php if(!isset($operator)){?>
					<form name="login-top" class="form-inline" action="<?=$this->config->item('basic_url')?>Login/login" method="post" >
                        <div class="form-group <?php if(isset($loginfail)) echo" has-error"?>">
                            <div class="col-lg-12"><input type="text" class="form-control input-sm" placeholder="Login" name="login"/></div>
                        </div>
                        <div class="form-group <?php if(isset($loginfail)) echo" has-error"?>">
                            <div class="col-lg-12"><input type="password" class="form-control input-sm" placeholder="Senha" name="password"/></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12"><button class="btn btn-primary marg-left">Entrar</button></div>
                        </div>
					</form>
					<?php } else { ?>
					<span class="login-span"> 
						Logado como: <?=$operator->getName();?><br /> 
						<a href="<?=$this->config->item('basic_url')?>Login/logout">Logout</a>
					</span>
					<?php } ?>
				</div>
			</div>
		</header>

		<div class="main-container">
			

       