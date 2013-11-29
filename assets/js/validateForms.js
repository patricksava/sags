function validateFormAssociado(){
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
	$("#donationForm").submit();
};
function validateFormDonation(){
	$("#donationForm").submit();
};
function validateFormNovoSocio(){
	$("#newPartnerForm").submit();
};
function validateFormConfirmaPagamentoSocio(){
	$("#confirmPaymentForm").submit();
}

function goBack()
{
	window.history.back();
}