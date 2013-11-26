<div class="row">
	<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<div class="row">
			<div class="col-lg-7">
				<h4>Registro de pagamentos de um associado</h4>
				<h5>Programa: S&oacute;cios da Casa</h5>
			</div>
			<div class="col-lg-5">
				Associado: <?=$associate->getName();?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<br />
				<table class="table table-condensed table-hover">
				  	<tr>
				  		<th>Numero</th>
				  		<th>Data Vencimento</th>
				  		<th>Valor a pagar</th>
				  		<th>Data Pagamento</th>
				  		<th>Valor pago</th>
				  		<th>A&ccedil;&otilde;es</th>
				  	</tr>
				  	
				  	<?php foreach($payments as $payment){ ?>
				  		<tr>
				  			<td><?=$payment->getPaymentNumber();?></td>
				  			<td><?=$payment->getDateLimit();?></td>
				  			<td><?=$payment->getValueExpected();?></td>
				  			<td><?=(!$payment->isPayed())?$payment->getDatePayed():'Nao pago';?></td>
				  			<td><?=(!$payment->isPayed())?$payment->getValuePayed():'Nao pago';?></td>
				  			<td>
				  				<?php if(!$payment->isPayed()){ ?>
				  					<a href="<?= $this->config->item('basic_url')."PaymentController/confirmPayment?number=".$payment->getPaymentNumber();?>" >
				  					<span class="glyphicon glyphicon-info-sign"></span></a>
				  				<?php } ?>
				  			</td>
				  		</tr>
				  	<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
