<div class="row">
	<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<div class="row">
			<div class="col-lg-12">
				<h4>Cadastro de novos produtos dos Clubes.</h4>
				<p>Mes: <?=date("m")?> | Ano: <?=date("Y")?></p>
				<hr />
			</div>
		</div>
		<div class="row">
			<!-- Area esquerda - Clube Livro -->
			<div class="col-lg-6 right-border">
				<h5>Clube do Livro nos &uacute;ltimos 5 meses</h5>
				<?php if(!is_null($prodClubBook)){ ?>
						<table class="table table-condensed table-hover">
					  	<tr>
					  		<th>Mes</th>
					  		<th>Ano</th>
					  		<th>Valor</th>
					  		<th>Titulo</th>
					  		<th>Part.</th>
					  	</tr>
					  	<?php foreach($prodClubBook as $product) { ?>
					  		<tr>
					  			<td><?=$product->getMonth();?></td>
					  			<td><?=$product->getYear(); ?></td>
					  			<td><?=$product->getPrice();?></td>
					  			<td><?=$product->getTitle();?></td>
					  			<td><?=$product->getParticipants();?></td>
					  		</tr>
					  	<?php } ?>
					</table>
				<?php } ?>
				<a href="<?=$this->config->item('basic_url')?>ClubController/registerNewProductForm?t=livro">Cadastrar novo produto</a>
			</div>
			
			<!-- Area esquerda - Clube Arte -->
			<div class="col-lg-6 right-border">
				<h5>Clube de Arte nos &uacute;ltimos 5 meses</h5>
				<?php if(!is_null($prodClubArt)){ ?>
					<table class="table table-condensed table-hover">
					  	<tr>
					  		<th>Mes</th>
					  		<th>Ano</th>
					  		<th>Valor</th>
					  		<th>Titulo</th>
					  		<th>Part.</th>
					  	</tr>
					  	<?php foreach($prodClubArt as $product) { ?>
					  		<tr>
					  			<td><?=$product->getMonth();?></td>
					  			<td><?=$product->getYear(); ?></td>
					  			<td><?=$product->getPrice();?></td>
					  			<td><?=$product->getTitle();?></td>
					  			<td><?=$product->getParticipants();?></td>
					  		</tr>
					  	<?php } ?>
					</table>
				<?php } ?>
				<a href="<?=$this->config->item('basic_url')?>ClubController/registerNewProductForm?t=arte">Cadastrar novo produto</a>
			</div>
		</div>
	</div>
</div>
			