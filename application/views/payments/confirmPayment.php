<div class="row">
	<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<div class="row">
			<div class="col-lg-12">
				<form name="confirmPaymentForm" class="form-horizontal" action="<?=$this->config->item('basic_url')?>PaymentController/registerPayment" method="post">
					<input type="hidden" name="paymentNumber" value="<?=$payment->getPaymentNumber();?>" />
					<input type="hidden" name="associateId" value="<?=$payment->getAssociateId();?>" />
					<div class="col-lg-12"><p>Confirma&ccedil;&atilde;o do pagamento, por favor insira o valor pago e confirme seus dados de operador:</p></div>
					<div class="col-lg-12">
						<p> Matricula: <?=$payment->getAssociateId();?></p>
						<p> Valor Total a pagar: <strong>R$<?=$payment->getValueExpected();?></strong></p>
					</div>
					<div class="col-lg-12">					
						<div class="form-group">
							<label for="paidValue" class="col-lg-2 control-label"> Valor pago: </label>
							<div class="col-lg-4">
								<input type="text" class="form-control" value="<?=$payment->getValueExpected();?>" name="paidValue" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="login" class="col-lg-2 control-label"> Login: </label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="login" />
							</div>
						</div>
						<div class="form-group">
							<label for="passwrd" class="col-lg-2 control-label"> Senha: </label>
							<div class="col-lg-4">
								<input type="password" class="form-control" name="passwrd" />
							</div>
						</div>
					</div>
					<?php if($payment->getServiceCode() == CESTABASICA){ ?>
						<div class="form-group">
							<label for="paymentmode" class="col-lg-2 control-label"> Modo de pagamento: </label>
							<div class="col-lg-4" style="margin-top:6px;">
								<input type="radio" name="paymentmode" value="dinheiro" checked="checked"/> Dinheiro<br />
								<input type="radio" name="paymentmode" value="alimento" /> Alimento
							</div>
						</div>
					<?php } ?>
					<div class="col-lg-4">
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button class="btn btn-default" onclick="validateFormConfirmaPagamentoSocio()">Confirmar</button>
							</div>
						</div>
					</div>
		      	</form>
	      	</div>
      	</div>
	</div>
</div>
