<div class="row">
<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<div class="row">
			<div class="col-lg-12">
				<h4>Cadastro de nova doa&ccedil;&atilde;o:</h4>
				<hr />
			</div>
		</div>
		<form name="donationForm" class="form-horizontal" id="donationForm" action="<?=$this->config->item('basic_url');?>DonationController/registerDonation" method="post">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label for="donationValue" class="col-lg-6 control-label"> Valor Estimado: </label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="donationValue" id="donationValue" />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">					
					<div class="form-group">
						<label for="donationDescription" class="col-lg-2 control-label"> Descri&ccedil;&atilde;o: </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="donationDescription" id="donationDescription" />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-lg-2 col-lg-offset-10">
							<br />
							<input type="button" class="btn btn-primary" onclick="validateFormDonation()" value="Cadastrar" />
						</div>
					</div>
				</div>
			</div>
	  	</form>
  	</div>
 </div>