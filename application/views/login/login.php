
<div class="row">
	<div class="col-lg-6 col-lg-push-3 login-middle">
		<form name="login-middle" class="form-horizontal" action="<?=$this->config->item('basic_url')?>Login/login"
			method="post">
			<div class="form-group <?php if(isset($loginfail)) echo" has-error"?>">
				<label for="login" class="col-lg-2 control-label"> Login: </label>
				<div class="col-lg-10">
					<input type="text" class="form-control" placeholder="Login"
						name="login" />
				</div>
			</div>

			<div class="form-group <?php if(isset($loginfail)) echo" has-error"?>">
				<label for="password" class="col-lg-2 control-label"> Senha: </label>
				<div class="col-lg-10">
					<input type="password" class="form-control" placeholder="Senha"
						name="password" />
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<button class="btn btn-primary">Entrar</button>
					<?php if(isset($loginfail)) echo"  Login e/ou senha incorretos"?>
				</div>
			</div>
		</form>
	</div>
</div>