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
				<a href="<?=$this->config->item('basic_url')?>PremiumAssociateController/premiumAssociateManagementPage?id=<?=$associate->getAssociateId()?>">Registro de S&oacute;cio</a>
			</div>
			<div class="col-lg-3">	
				<a href="<?=$this->config->item('basic_url')?>ClubController/clubManagementPage?id=<?=$associate->getAssociateId()?>">Registro de Clubes</a>
			</div>
			<div class="col-lg-3">
				<a href="<?=$this->config->item('basic_url')?>BasicPackageController/basicPackageManagementPage?id=<?=$associate->getAssociateId()?>">Registro de Cesta B&aacute;sica</a>
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
		
		<?php if($associate instanceof Partner) {?>
		<hr />
		<div class="row">
			<div class="col-lg-12"><h4>Dados de s&oacute;cio</h4></div>
			<div class="col-lg-4"><h5>Login: <?=$associate->getLogin()?></h5></div>
			<div class="col-lg-4"><h5>Mensalidade: <?=$associate->getPayment()?></h5></div>
			<div class="col-lg-4"><h5>D.Assinatura: <?=$associate->getInicialDate()?></h5></div>
		</div>
		<?php }?>
		
		<hr />
		<div class="row">
			<div class="col-lg-12"><h5>Endere&ccedil;o: <?=$address->printFullAddress();?></h5></div>
			<div class="col-lg-4"><h5>CEP:<?=$address->getCEP();?></h5></div>
		</div>
	</div>
</div>