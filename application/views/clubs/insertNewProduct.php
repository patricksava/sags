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
			<?php if($type==CLUBE_DO_LIVRO){ ?>
				<form name="newProductForm" class="form-horizontal" action="<?=$this->config->item('basic_url')?>ClubController/clubBookAddNewMonthData" method="post">
			<?php } else { ?>
				<form name="newProductForm" class="form-horizontal" action="<?=$this->config->item('basic_url')?>ClubController/clubArtAddNewMonthData" method="post">
			<?php }?>
					<div class="col-lg-12">
						<h4>Clube <?=($type==CLUBE_DO_LIVRO)?"Livro":"Arte";?></h4>
						<p> M&ecirc;s: <?=date("m");?></p>
						<p> Ano: <?=date("Y");?></p>
					</div>
					<div class="col-lg-12">					
						<div class="form-group">
							<label for="value" class="col-lg-2 control-label"> Pre&ccedil;o: </label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="value" />
							</div>
						
							<label for="titulo" class="col-lg-2 control-label"> T&iacute;tulo: </label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="titulo" />
							</div>
						</div>
						<div class="form-group">
							<label for="mes" class="col-lg-2 control-label"> M&ecirc;s: </label>
							<div class="col-lg-4">
								<select class="form-control" name="mes" >
									<option value="1">Janeiro</option>
									<option value="2">Fevereiro</option>
									<option value="3">Mar&ccedil;o</option>
									<option value="4">Abril</option>
									<option value="5">Maio</option>
									<option value="6">Junho</option>
									<option value="7">Julho</option>
									<option value="8">Agosto</option>
									<option value="9">Setembro</option>
									<option value="10">Outubro</option>
									<option value="11">Novembro</option>
									<option value="12">Dezembro</option>
								</select>
							</div>
						
							<label for="ano" class="col-lg-2 control-label"> Ano: </label>
							<div class="col-lg-4">
								<select class="form-control" name="ano" >
									<option value="<?=date("Y");?>"><?=date("Y");?></option>
									<option value="<?=date("Y")+1;?>"><?=date("Y")+1;?></option>
									<option value="<?=date("Y")+2;?>"><?=date("Y")+2;?></option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button class="btn btn-default" onclick="validateFormNovoProdutoClube()">Confirmar</button>
							</div>
						</div>
					</div>
		      	</form>
			
			
		</div>
	</div>
</div>

