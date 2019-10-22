function inicio(){
    listar();
	// detalle();
}

function detalle(){
	var idusuario = sessionStorage.getItem("idcliente");
	$.ajax({
        url: 'php/detalle.php',
        dataType: 'text',
        type: 'post',
        data: { 'idusuario': idusuario },
        success: function( data ){
            $("#detalle").html(data);
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
}

function listar() {
    let pedido = JSON.parse(localStorage.getItem('pedido'));
    var html = "";
    pedido.forEach(producto => {
        html += `<tr class="bg-warning text-dark">
            <td>${producto.nombre}</td>
            <td>${producto.precio}</td>
            <td><img src="${producto.foto}" height="50" /></td>
            <td><input type="text" id="txtcantidad[${producto.id}]" value="${producto.cantidad}" size="4"></td>
            <td><button type="button" onclick="agregar(${producto.id},${producto.precio})" class="btn btn-success">Agregar</button></td>
        </tr>`;
    });
    document.getElementById('detalle').innerHTML = html;
}
