<div class="row">
<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<h5>Registro de Doa&ccedil;&atilde;o de Cestas B&aacute;sicas</h5>
		<br />
		<?php 
			if(!is_null($donations)){ 
		  		$i = 1; 
		  		foreach($donations as $donation) { 
		?>
			  	<form name="donation<?=$i;?>" class="form-horizontal" action="<?=$this->config->item('basic_url')?>CestaBasicaController/updateDonationsQuantity" method="post">
			  		<input type="hidden" name="idassoc" value="<?=$associate->getAssociateId();?>" />
			  		<table class="table table-condensed table-hover">
					  	<tr>
					  		<th>C&oacute;digo</th>
					  		<th>Quantidade</th>
					  		<th>A&ccedil;&otilde;es</th>
					  	</tr>
				  		<tr>
				  			<td><input type="text" name="codcesta" value="<?=$donation->getCodCesta();?>" /></td>
				  			<td><input type="text" name="quantity" value="<?=$donation->getQuantidade();?>" /></td>
				  			<td>
				  				<input type="submit" value="Atualizar" />
				  			</td>
				  		</tr>
			  		</table>
			  	</form>
			<?php 
			  		$i++;
		  		}	
			} else { ?>
				<h4>N&atilde;o existem registros de doa&ccedil;&otilde;es para este associado.</h4>
		<?php }?>
		
		<br />
		<h5>Inserir nova doa&ccedil;&atilde;o de Cesta B&aacute;sica</h5>
		<form name="newDonationAssocForm" class="form-horizontal" action="<?=$this->config->item('basic_url')?>CestaBasicaController/newDonationByAssociate" method="post">
			<input type="hidden" name="idassoc" value="<?=$associate->getAssociateId();?>" />
	  		<table class="table table-condensed table-hover">
			  	<tr>
			  		<th>C&oacute;digo</th>
			  		<th>Quantidade</th>
			  		<th>A&ccedil;&otilde;es</th>
			  	</tr>
		  		<tr>
		  			<td><input type="text" id="novoCodCesta"   name="codcesta" /></td>
		  			<td><input type="text" id="novoQuantidade" name="quantity" /></td>
		  			<td>
		  				<button name="novaCesta" onclick="validateFormNovaDoacaoCesta()">Submeter</button>
		  			</td>
		  		</tr>
	  		</table>
  		</form>
  		
  		<br />
		<h5>Demonstrativo de pagamentos de Cestas B&aacute;sicas</h5>
		<table class="table table-condensed table-hover">
		  	<tr>
		  		<th>Numero</th>
		  		<th>Data Vencimento</th>
		  		<th>Valor a pagar</th>
		  		<th>Data Pagamento</th>
		  		<th>Valor pago</th>
		  		<th>Recebido por</th>
		  		<th>A&ccedil;&otilde;es</th>
		  	</tr>
		  	
		  	<?php foreach($payments as $payment){ ?>
		  		<tr>
		  			<td><?=$payment->getPaymentNumber();?></td>
		  			<td><?=$payment->getDateLimit();?></td>
		  			<td><?=$payment->getValueExpected();?></td>
		  			<td><?=($payment->isPaid())?$payment->getDatePaid():'Nao pago';?></td>
		  			<td><?=($payment->isPaid())?$payment->getValuePaid():'Nao pago';?></td>
		  			<td><?=($payment->isPaid())?$payment->getLoginOperator():'----------';?></td>
		  			<td>
		  				<?php if(!$payment->isPaid()){ ?>
		  					<a href="<?= $this->config->item('basic_url')."PaymentController/confirmPayment?number=".$payment->getPaymentNumber();?>" >
		  					<span class="glyphicon glyphicon-usd"></span></a>
		  				<?php } ?>
		  			</td>
		  		</tr>
		  	<?php } ?>
		</table>
  	</div>
 </div>