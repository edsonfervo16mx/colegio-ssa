<script>
	function loadMonto(){
		var id = document.getElementById('cve_precio_inscripcion');
		var load = id.options[id.selectedIndex].value;
		//var load = id.options[id.selectedIndex].text;
		//alert(load);
		var monto = document.getElementById(load).value;		
		document.getElementById('monto').value = monto;
	}
</script>