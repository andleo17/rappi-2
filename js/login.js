function login() {
	var dni = $('#txtusuario').val();
	var pas = $('#txtpassword').val();
	$.ajax({
		url: 'php/login.php',
		dataType: 'text',
		type: 'post',
		data: { usuario: dni, pass: pas },
		success: function(data) {
			console.log(data);
			var datos = JSON.parse(data);
			sessionStorage.setItem('idcliente', datos.idcliente);
			sessionStorage.setItem('nombres', datos.nombres);
			if (datos.ok == 1) {
				window.location = 'pedido.html';
			} else {
				alert('Datos incorrectos');
			}
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}
