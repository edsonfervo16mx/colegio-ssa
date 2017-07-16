<script>
	function loadMonto(){
		var id = document.getElementById('cve_precio_inscripcion');
		var load = id.options[id.selectedIndex].value;
		//var load = id.options[id.selectedIndex].text;
		//alert(load);
		var monto = document.getElementById(load).value;		
		document.getElementById('monto').value = monto;
	}

	function loadAdeudo(){

		if(document.getElementById('monto').value){
			var monto = document.getElementById('monto').value;
			var abono = document.getElementById('abono').value;
			document.getElementById('adeudo').value = monto - abono;
		}else{
			var id = document.getElementById('cve_precio_inscripcion');
			var load = id.options[id.selectedIndex].value;
			var monto = document.getElementById(load).value;
			var abono = document.getElementById('abono').value;

			document.getElementById('adeudo').value = monto - abono;
		}
	}

	function loadAdeudoUpdate(){
		var monto = document.getElementById('monto').value;
		var abono = document.getElementById('abono').value;
		document.getElementById('adeudo').value = monto - abono;
	}

</script>