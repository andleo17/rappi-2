function inicio(){
	registrar();
}

function registrar(){
	var idusuario = sessionStorage.getItem("idcliente");
	$.ajax({
        url: 'php/registrar.php',
        dataType: 'text',
        type: 'post',
        data: { 'idusuario': idusuario, 'pedido': JSON.parse(localStorage.getItem('pedido')) },
        success: function( data ){
            if(data==1){
            	$("#resultado").html("Su pedido fue enviado!!");
            } else {
            	$("#resultado").html(data);
            }
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
}