<?php
function printDatePtBr(){
	// Leandro Alexandre
	// Colabora‹o para o Open Source para comunidade Linux do Brasil

	// leitura das datas automaticamente
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');
	$semana = date('w');
	$cidade = "Rio de Janeiro";

	// configura‹o mes

	switch ($mes){

		case 1: $mes = "Janeiro"; break;
		case 2: $mes = "Fevereiro"; break;
		case 3: $mes = "Mar&ccedil;o"; break;
		case 4: $mes = "Abril"; break;
		case 5: $mes = "Maio"; break;
		case 6: $mes = "Junho"; break;
		case 7: $mes = "Julho"; break;
		case 8: $mes = "Agosto"; break;
		case 9: $mes = "Setembro"; break;
		case 10: $mes = "Outubro"; break;
		case 11: $mes = "Novembro"; break;
		case 12: $mes = "Dezembro"; break;

	}


	// configura‹o semana

	switch ($semana) {

		case 0: $semana = "Domingo"; break;
		case 1: $semana = "Segunda Feira"; break;
		case 2: $semana = "Ter&ccedil;a Feira"; break;
		case 3: $semana = "Quarta Feira"; break;
		case 4: $semana = "Quinta Feira"; break;
		case 5: $semana = "Sexta Feira"; break;
		case 6: $semana = "S&aacute;bado"; break;

	}
	//Agora basta imprimir na tela...
	echo ("$cidade, $semana, $dia de $mes de $ano");
}
?>