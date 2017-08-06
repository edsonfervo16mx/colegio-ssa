/**/
var carrito = [];
function addProducto(clave,nombre,precio,cantidad){
	producto = [];
	producto.push(clave,nombre,precio,cantidad);
	carrito.push(producto);
	//
	renderList();
}

function renderList(){
	/**/
	var render = "";
	for (var i = carrito.length - 1; i >= 0; i--) {
		//console.log(carrito[i][0]+'|||'+carrito[i][1]+'|||'+carrito[i][2]+'|||'+carrito[i][3]+'|||');
		render = render + '<tr id="productoID'+carrito[i][0]+'"><td>'+carrito[i][1]+'</td><td>'+carrito[i][2]+'</td><td><input type="number" name="cantidadID'+carrito[i][0]+'" id="cantidadID'+carrito[i][0]+'" value="'+carrito[i][3]+'" onchange="changeCantidad('+i+','+carrito[i][0]+');"></td><td><input type="text" name="importeID" id="importeID" value="'+carrito[i][2]+'"></td><td><a href="#" onclick="dropProducto();"><i class="material-icons">delete</i></a></td></tr>';
	}
	document.getElementById('listacompra').innerHTML = render;
	/**/
}

function changeCantidad(id_array,clave){
	var identificador = 'cantidadID'+clave;
	var cantidad = parseInt(document.getElementById(identificador).value);
	carrito[id_array][3] = cantidad;
}

function updateImporte(){
	
}

function dropProducto(){
	carrito.pop();
}

function imprimir(){
	console.log(carrito);
}
/**/