<div class="row">
<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<form name="login-middle" class="form-horizontal" action="<?=$this->config->item('basic_url')?>MainController/searchAssociate" method="post">
			
			<div class="col-lg-6">	
				<div class="form-group">
					<label for="associateName" class="col-lg-2 control-label"> Nome*: </label>
					<div class="col-lg-10">
						<input type="text" class="form-control" placeholder="Nome do Associado"
							name="associateName" />
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="associateId" class="col-lg-6 control-label"> Data de Nascimento: </label>
					<div class="col-lg-6">
						<input type="text" class="form-control" id="datepicker" name="associateBirthDate" />
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">					
				<div class="form-group">
					<label for="cpf" class="col-lg-2 control-label"> CPF: </label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="associateCPF" />
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="email" class="col-lg-4 control-label"> E-mail: </label>
					<div class="col-lg-8">
						<input type="email" class="form-control" name="associateEmail" />
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">					
				<div class="form-group">
					<label for="rg" class="col-lg-2 control-label"> RG: </label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="associateRG" />
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="expeditor" class="col-lg-4 control-label"> Org&atilde;o Exp.: </label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="associateExpeditor" />
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">					
				<div class="form-group">
					<label for="rg" class="col-lg-4 control-label"> Estado Civil: </label>
					<div class="col-lg-8">
						<select class="form-control" name="associateRG">
							<option value="solteiro" selected> Solteiro </option>
							<option value="casado"> Casado </option>
							<option value="divorciado"> Divorciado </option>
							<option value="viuvo"> Vi&uacute;vo </option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button class="btn btn-default">Cadastrar</button>
					</div>
				</div>
			</div>
	  	</form>
  	</div>
 </div>