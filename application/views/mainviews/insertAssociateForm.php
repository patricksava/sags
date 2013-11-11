<div class="row">
<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<div class="row">
			<div class="col-lg-12">
				<h4>Cadastro de novo associado:</h4>
				<hr />
			</div>
		</div>
		<form name="associateForm" class="form-horizontal" id="associateForm" action="<?=$this->config->item('basic_url');?>MainController/insertNewAssociate" method="post">
			<div class="row">
				<div class="col-lg-6">	
					<div class="form-group">
						<label for="associateName" class="col-lg-2 control-label"> Nome*: </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" placeholder="Nome do Associado"
								id="associateName" name="associateName" />
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateBirthDate" class="col-lg-6 control-label"> Data de Nascimento: </label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="datepicker" name="associateBirthDate" id="associateBirthDate"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">					
					<div class="form-group">
						<label for="associateCPF" class="col-lg-2 control-label"> CPF: </label>
						<div class="col-lg-10">
							<input type="text" maxlength=11 class="form-control" placeholder="Somente numeros" name="associateCPF" id="associateCPF" />
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateEmail" class="col-lg-4 control-label"> E-mail: </label>
						<div class="col-lg-8">
							<input type="email" class="form-control" name="associateEmail" id="associateEmail"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">					
					<div class="form-group">
						<label for="associateRG" class="col-lg-2 control-label"> RG: </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" placeholder="Somente numeros" name="associateRG" id="associateRG"/>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateExpeditor" class="col-lg-4 control-label"> Org&atilde;o Exp.: </label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="associateExpeditor" id="associateExpeditor"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">					
					<div class="form-group">
						<label for="associateEstadoCivil" class="col-lg-4 control-label"> Estado Civil: </label>
						<div class="col-lg-8">
							<select class="form-control" name="associateEstadoCivil" id="associateEstadoCivil">
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
						<label for="associateProfissao" class="col-lg-4 control-label"> Profiss&atilde;o: </label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="associateProfissao" id="associateProfissao"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateRua" class="col-lg-4 control-label"> Rua: </label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="associateRua" id="associateRua"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateNumero" class="col-lg-4 control-label"> N&uacute;mero: </label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="associateNumero" id="associateNumero"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateComplemento" class="col-lg-4 control-label"> Complemento: </label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="associateComplemento" id="associateComplemento"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateCEP" class="col-lg-4 control-label"> CEP: </label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="associateCEP" id="associateCEP"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateBairro" class="col-lg-4 control-label"> Bairro: </label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="associateBairro" id="associateBairro"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateCidade" class="col-lg-4 control-label"> Cidade: </label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="associateCidade" id="associateCidade"/>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="form-group">
						<label for="associateEstado" class="col-lg-4 control-label"> Estado: </label>
						<div class="col-lg-8">
							<input type="text" maxlength=2 class="form-control" name="associateEstado" id="associateEstado"/>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="associateTelRes" class="col-lg-4 control-label"> Tel. Residencial: </label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="associateTelRes" id="associateTelRes"/>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="associateTelCom" class="col-lg-4 control-label"> Tel. Comercial: </label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="associateTelCom" id="associateTelCom"/>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="associateTelCel" class="col-lg-4 control-label"> Tel. Celular: </label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="associateTelCel" id="associateTelCel"/>
							</div>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-lg-2 col-lg-offset-10">
							<br />
							<input type="button" class="btn btn-primary" onclick="validateFormAssociado()" value="Cadastrar" />
						</div>
					</div>
				</div>
			</div>
	  	</form>
  	</div>
 </div>