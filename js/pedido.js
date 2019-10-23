var pedido = [];

function inicio() {
	productos();
}

function productos() {
	$.ajax({
		url: 'php/productos.php',
		dataType: 'text',
		type: 'post',
		data: {},
		success: function(data) {
			$('#divlista').html(data);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});

	if (localStorage.getItem('pedido') != null) {
		pedido = JSON.parse(localStorage.getItem('pedido'));
	}
}

function agregar(id, precio) {
	var elemento = '[' + id + ']';
	var cantidad = parseInt(
		document.getElementById('txtcantidad' + elemento).value
	);
	let idproducto = pedido.findIndex(p => p.id == id);
	let foto = document.getElementById(`foto[${id}]`).src;
	let nombre = document.getElementById(`nombre[${id}]`).innerText;

	let producto = {
		id: id,
		nombre: nombre,
		precio: precio,
		cantidad: cantidad,
		foto: foto
	};

	if (idproducto != -1) {
		pedido.splice(idproducto, 1, producto);
	} else {
		pedido.push(producto);
	}

	localStorage.setItem('pedido', JSON.stringify(pedido));
	console.log(pedido);
}
