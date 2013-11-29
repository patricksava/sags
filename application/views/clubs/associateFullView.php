<div class="row">
	<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<div class="row">
			<div class="col-lg-12">
				<h4>Demonstrativo de hist&oacute;rico de associado.</h4>
				<p>Programa: Clube Livro/Arte</p>
				<hr />
			</div>
		</div>
		<div class="row">
			<!-- Area esquerda - Clube Livro -->
			<div class="col-lg-6 right-border">
				<p> Clube do Livro (<?=$clubBook->getMonth()."/".$clubBook->getYear()?>): <?=$clubBook->getTitle(). " - R$" .$clubBook->getPrice()?></p>
				<br />
				<?php if(!is_null($paymentsCBL)){ ?>
					<table class="table table-condensed table-hover">
					  	<tr>
					  		<th>Numero</th>
					  		<th>Dt. Venc.<br />Dt. Pag.</th>
					  		<th>Val. pagar</th>
					  		<th>Val. pago</th>
					  		<th>Recebido por</th>
					  		<th>A&ccedil;&otilde;es</th>
					  	</tr>
					  	<?php foreach($paymentsCBL as $payment) { ?>
					  		<tr>
					  			<td><?=$payment->getPaymentNumber();?></td>
					  			<td><?=$payment->getDateLimit();?><br/><?=$payment->getDatePaid();?></td>
					  			<td>R$<?=$payment->getValueExpected();?></td>
					  			<td>R$<?=$payment->getValuePaid();?></td>
					  			<td><?=$payment->getLoginOperator();?></td>
					  			<td>
					  				<?php if(!$payment->isPaid()){ ?>
					  					<a href="<?= $this->config->item('basic_url')."PaymentController/confirmPayment?number=".$payment->getPaymentNumber();?>" >
					  					<span class="glyphicon glyphicon-usd"></span></a>
					  				<?php } ?>
					  			</td>
					  		</tr>
					  	<?php } ?>
					</table>
				<?php } else { ?>
					<a href="<?=$this->config->item('basic_url')?>ClubController/registerNewParticipant?club=cbl&id=<?=$associate->getAssociateId();?>">Cadastrar como participante</a>
				<?php } ?>
			</div>
			
			<!-- Area direita - Clube Arte -->
			<div class="col-lg-6">
				<p> Clube de Arte (<?=$clubArt->getMonth()."/".$clubArt->getYear()?>): <?=$clubArt->getTitle(). " - R$" .$clubArt->getPrice()?></p>
				<br />
				<?php if(!is_null($paymentsCBA)){ ?>
					<table class="table table-condensed table-hover">
					  	<tr>
					  		<th>Numero</th>
					  		<th>Dt. Venc.<br />Dt. Pag.</th>
					  		<th>Val. pagar</th>
					  		<th>Val. pago</th>
					  		<th>Recebido por</th>
					  		<th>A&ccedil;&otilde;es</th>
					  	</tr>
					  	<?php foreach($paymentsCBA as $payment) { ?>
					  		<tr>
					  			<td><?=$payment->getPaymentNumber();?></td>
					  			<td><?=$payment->getDateLimit();?><br/><?=$payment->getDatePaid();?></td>
					  			<td>R$<?=$payment->getValueExpected();?></td>
					  			<td>R$<?=$payment->getValuePaid();?></td>
					  			<td><?=$payment->getLoginOperator();?></td>
					  			<td>
					  				<?php if(!$payment->isPaid()){ ?>
					  					<a href="<?= $this->config->item('basic_url')."PaymentController/confirmPayment?number=".$payment->getPaymentNumber();?>" >
					  					<span class="glyphicon glyphicon-usd"></span></a>
					  				<?php } ?>
					  			</td>
					  		</tr>
					  	<?php } ?>
					</table>
				<?php } else { ?>
					<a href="<?=$this->config->item('basic_url')?>ClubController/registerNewParticipant?club=cba&id=<?=$associate->getAssociateId();?>">Cadastrar como participante</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
