function calculate(){
	var saldopendiente = document.getElementById('saldopendiente').value;
	var deposito = document.getElementById('deposito').value;
	document.getElementById('adeudo').value = saldopendiente - deposito;
	console.log(saldopendiente);
	console.log(deposito);
	console.log(saldopendiente - deposito);
}