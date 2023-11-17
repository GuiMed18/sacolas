//PEGAR HORA E MINUTO ATUAIS
function horaAtual(e,o)
{
	momentoAtual=new Date,
	hora=momentoAtual.getHours(),
	minuto=momentoAtual.getMinutes();
	horaSeg = hora + 1;
	if(hora < 10){hora = '0' + hora;}
	if(minuto < 10){minuto = '0' + minuto;}
	if(horaSeg < 10){horaSeg = '0' + horaSeg;}
	document.getElementById(e).value = hora + ":" + minuto
	document.getElementById(e).focus()
	if(o!='') {
		document.getElementById(o).value = horaSeg +":"+minuto
		document.getElementById(o).focus()
	}
}