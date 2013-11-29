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
				<p> Clube do Livro (<?=$clubBook->getMonth()."/".$clubBook->getYear()?>): <?=$clubBook->getTitle(). " - " .$clubBook->getPrice()?></p>
				<br />
				<?php print_r($paymentsCBL);?>
			</div>
			
			<!-- Area direita - Clube Arte -->
			<div class="col-lg-6">
				<p> Clube de Arte (<?=$clubArt->getMonth()."/".$clubArt->getYear()?>): <?=$clubArt->getTitle(). " - " .$clubArt->getPrice()?></p>
				<br />
				<?php print_r($paymentsCBL);?>
			</div>
		</div>
	</div>
</div>
