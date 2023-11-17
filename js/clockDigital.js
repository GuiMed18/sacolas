//RELOGIO DIGITAL
function proximo_segundo( id )
{
	momentoAtual=new Date,
	hora=momentoAtual.getHours(),
	minuto=momentoAtual.getMinutes(),
	segundo=momentoAtual.getSeconds(),
	str_segundo=new String(segundo),
	1==str_segundo.length&&(segundo="0"+segundo),
	str_minuto=new String(minuto),
	1==str_minuto.length&&(minuto="0"+minuto),
	str_hora=new String(hora),
	1==str_hora.length&&(hora="0"+hora),
	relogio=document.getElementById( id ),
	relogio.value=hora+":"+minuto+":"+segundo,
	setTimeout(function(){
		proximo_segundo( id );
	},1e3);
}