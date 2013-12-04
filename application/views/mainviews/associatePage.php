<div class="row">
	<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<div class="row">
			<div class="col-lg-8"><h4>Nome: <?=$associate->getName()?></h4></div>
			<div class="col-lg-4"><h4>Matricula: <?=$associate->getAssociateId()?></h4></div>
		</div>
		<hr />
		<div class="row action-horizontal-menu">
			<div class="col-lg-3">
				<a href="<?=$this->config->item('basic_url')?>DonationController/associateDonationForm?id=<?=$associate->getAssociateId()?>">Cadastrar doa&ccedil;&atilde;o</a>
			</div>
			<div class="col-lg-3">
				<a href="<?=$this->config->item('basic_url')?>PartnerController/premiumAssociateManagementPage?id=<?=$associate->getAssociateId()?>">Registro de S&oacute;cio</a>
			</div>
			<div class="col-lg-3">	
				<a href="<?=$this->config->item('basic_url')?>ClubController/clubManagementPage?id=<?=$associate->getAssociateId()?>">Registro de Clubes</a>
			</div>
			<div class="col-lg-3">
				<a href="<?=$this->config->item('basic_url')?>CestaBasicaController/associateDonationManagementPage?id=<?=$associate->getAssociateId()?>">Registro de Cesta B&aacute;sica</a>
			</div>
		</div>
		
		<hr />
		<? if(!is_null($telephones)){
			$i=1; ?>
		<div class="row">
			<?php foreach($telephones as $tel){?>
				<div class="col-lg-4"><h5>Telefone <?=$i++?>: <?=$tel?></h5></div>
			<?php }?>
		</div>
		<? } ?>
		
		<div class="row">
			<div class="col-lg-4"><h5>Email: <?=$associate->getEmail()?></h5></div>
			<div class="col-lg-4"><h5>Profiss&atilde;o: <?=$associate->getBirthDate()?></h5></div>
			<div class="col-lg-4"><h5>D.Nascimento: <?=$associate->getOccupation()?></h5></div>
		</div>
		<div class="row">
			<div class="col-lg-4"><h5>CPF: <?=$associate->getCPF()?></h5></div>
			<div class="col-lg-4"><h5>Identidade: <?=$associate->getRG()?></h5></div>
			<div class="col-lg-4"><h5>Orgao Exp.: <?=$associate->getExpeditor()?></h5></div>
		</div>
		<div class="row">
			<div class="col-lg-4"><h5>Est. Civil: <?=$associate->getCivilState()?></h5></div>
		</div>
		
		<hr />
		<div class="row">
			<div class="col-lg-12"><h5>Endere&ccedil;o: <?=$address->printFullAddress();?></h5></div>
			<div class="col-lg-4"><h5>CEP:<?=$address->getCEP();?></h5></div>
		</div>
		<?php if($associate instanceof Partner) {?>
			<hr />
			<div class="row">
				<div class="col-lg-12"><h4>Dados de s&oacute;cio</h4></div>
				<div class="col-lg-4"><h5>Login: <?=$associate->getLogin()?></h5></div>
				<div class="col-lg-4"><h5>Mensalidade: <?=$associate->getPayment()?></h5></div>
				<div class="col-lg-4"><h5>D.Assinatura: <?=$associate->getInicialDate()?></h5></div>
			</div>
		<?php } else { ?>
			<hr />
			<div class="row">
				<div class="col-lg-12">
					<h5>Associado n&atilde;o participante do programa S&oacute;cios da Casa</h5>
					<p>Para torn&aacute;-lo s&oacute;cio da casa, preencha e submeta os dados abaixo:</p>
					<br />
				</div>
				<form name="newPartnerForm" class="form-horizontal" id="newPartnerForm" action="<?=$this->config->item('basic_url');?>PartnerController/NewPartnerSubscription" method="post">
					<input type="hidden" name="associateId" value="<?=$associate->getAssociateId()?>" />
					<div class="col-lg-5">
						<div class="form-group">
							<label for="newPartnerLogin" class="col-lg-3 control-label"> Login: </label>
							<div class="col-lg-9">
								<input type="text" class="form-control" id="newPartnerLogin" name="newPartnerLogin" />
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="newPartnerPayment" class="col-lg-6 control-label"> Valor: </label>
							<div class="col-lg-6">
								<input type="text" class="form-control" id="newPartnerPayment" name="newPartnerPayment" />
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-lg-offset-1">
						<div class="form-group">
							<input type="button" class="btn btn-primary" onclick="validateFormNovoSocio()" value="Submeter" />
						</div>
					</div>
				</form>
			</div>
		<?php }?>
	</div>
</div>