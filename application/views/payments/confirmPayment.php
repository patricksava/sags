<div class="row">
	<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<form name="confirm-payment-form" class="form-horizontal" action="<?=$this->config->item('basic_url')?>PaymentController/registerPayment" method="post">
		
			<div class="col-lg-6">	
				<div class="form-group">
					<label for="associateName" class="col-lg-2 control-label"> Nome: </label>
					<div class="col-lg-10">
						<input type="text" class="form-control" placeholder="Nome do Associado"
							name="associateName" />
					</div>
				</div>
			
				<div class="form-group">
					<label for="associateId" class="col-lg-2 control-label"> Matricula: </label>
					<div class="col-lg-10">
						<input type="text" class="form-control" placeholder="Matricula do Associado"
						name="associateId" />
					</div>
				</div>
			</div>
			<div class="col-lg-6">					
				<div class="form-group">
					<label for="cpf" class="col-lg-2 control-label"> CPF: </label>
					<div class="col-lg-10">
						<input type="text" class="form-control" placeholder="CPF"
							name="associateCPF" />
					</div>
				</div>
								
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button class="btn btn-default">Buscar</button>
					</div>
				</div>
			</div>
      	</form>
	</div>
</div>
