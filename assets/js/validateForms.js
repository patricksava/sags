function validateFormAssociado(){
	//TODO: Implementar validacoes de dados de novos associados
	flagOk = true;
	//validar nome - not null
	if($("#associateName").value == ''){
		//$("#associateName < div").addClass("has-error");
		flagOk = false;
	}
	/*
	//validar cpf - 11 numeros
	if($("#associateCPF").value != '')
		flagOk = false;
	alert(flagOk);
	
	//validar orgao exp: rg not null -> orgao not null
	if($("#associateRG").value != '')
		if($("#associateExpeditor").value == '')
			flagOk = false;
	alert(flagOk);
	if($("#associateExpeditor").value != '')
		if($("#associateRG").value == '')
			flagOk = false;
	alert(flagOk);
	*/
	if( flagOk )
		$("#associateForm").submit();
	else
		alert("Informacoes invalidas, favor corrigir.");
};

function validateFormDonationAssociado(){
	//TODO: Implementar validacoes de doacao por associado
	$("#donationForm").submit();
};
function validateFormDonation(){
	//TODO: Implementar validacoes de doacao anonima
	$("#donationForm").submit();
};
function validateFormNovoSocio(){
	//TODO: Implementar validacoes de novo socio
	$("#newPartnerForm").submit();
};
function validateFormConfirmaPagamentoSocio(){
	//TODO: Implementar validacoes de pagamento
	$("#confirmPaymentForm").submit();
}
function validateFormNovoProdutoClube(){
	var flagOk = true;
	
	if($("#titulo").value == ''){
		flagOk = false;
	}
	if($("#value").value == ''){
		flagOk = false;
	}
	
	if( flagOk )
		$("#newProductForm").submit();
	else
		alert("Informacoes invalidas, favor corrigir.");
}

function validateFormNovaDoacaoCesta(){
	var flagOk = true;
	
	if($("#novoCodCesta").value == ''){
		flagOk = false;
	}
	if($("#novoQuantidade").value == ''){
		flagOk = false;
	}
	
	if( flagOk )
		$("#newDonationAssocForm").submit();
	else
		alert("Informacoes invalidas, favor corrigir.");
}

function goBack()
{
	window.history.back();
}