<div class="row">
	<?php require_once APPPATH.'views/include/leftmenu.php'?>
	<div class="col-lg-10 middle-content">
		<div class="panel-group" id="accordion">
		  	<div class="panel panel-default">
		    	<div class="panel-heading">
		      		<h4 class="panel-title">
		        		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
		          			Crit&eacute;rios de busca:
		        		</a>
		      		</h4>
		   		</div>
		    	<div id="collapseOne" class="panel-collapse collapse in">
		      		<div class="panel-body">
			      		<div class="row">
			      			<form name="login-middle" class="form-horizontal" action="<?=$this->config->item('basic_url')?>Login/login" method="post">
									
								<input type="hidden" name="is_request" value="1" />
								<div class="col-lg-6">
									
										<div class="form-group">
											<label for="associateName" class="col-lg-2 control-label"> Nome: </label>
											<div class="col-lg-10">
												<input type="text" class="form-control" placeholder="Nome do Associado"
													name="associateName" />
											</div>
										</div>
							
										<div class="form-group">
											<label for="associateId" class="col-lg-2 control-label"> Matricula: </label>
											<div class="col-lg-10">
												<input type="text" class="form-control" placeholder="Matricula do Associado"
													name="associateId" />
											</div>
										</div>
								</div>
								<div class="col-lg-6">					
									<div class="form-group">
										<label for="cpf" class="col-lg-2 control-label"> CPF: </label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="CPF"
												name="associateCPF" />
										</div>
									</div>
						
									<div class="form-group">
										<div class="col-lg-10 col-lg-offset-2">
											<button class="btn btn-primary">Entrar</button>
										</div>
									</div>
								</div>
			      			</form>
		      			</div>
		      		</div>
		    	</div>
		  	</div>
		</div>
	</div>
</div>