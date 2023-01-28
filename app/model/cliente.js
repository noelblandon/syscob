$(document).ready(function(){	
	$('body').load(listar_cliente());
});

function reportes_cliente(){			
	var anio  = $('#anio').val();
	var datas = 'anio='+anio;
	var url   = '../app/controller/reportes.php';
	$.ajax({type: "POST",url: url,data:datas}).done(function( data ) {$('#reportes').html(data);});
}

function enviar_reporte(){			
	var url   = '../app/controller/respaldo2.php';
	$.ajax({type: "POST",url: url}).done(function( data ) {$.notify(data,'success');  });
}

function desactivar_cliente(str){
	var id = str;
	var datas = 'cedula='+id;
	var url = '../app/controller/listar_cliente.php';
	$.ajax({type: "POST",url: url}).done(function( data ) {$('#tabla').html(data);});
}
				
function listar_cliente(){
	var url = '../app/controller/listar_cliente.php';
	$.ajax({type: "POST",url: url}).done(function( data ) {$('#tabla').html(data);});
}

function listar_cliente_like()					{			
	var datas = $('#buscar_clientes').val();
	var datas='data='+datas;
	var url = '../app/controller/listar_cliente_like.php';
	$.ajax({type: "POST",url: url,data:datas}).done(function( data ) {$('#tabla').html(data);});
}
				   
function agregarCliente (){
	var nif       = $('#cedula').val();
	var nombre    = $('#nombre').val();
	var apellido  = $('#apellido').val();
	var direccion = $('#direccion').val();
	var barrio    = $('#barrio').val();
	var comunidad = $('#comunidad').val();				   		
	var celular   = $('#celular').val();
	var internet  = $('#internet').val();
	var pago      = $('#pago').val();
	if(nif.length < 16){
		alert("El numero de cedula no es valido");
		return false;
	}
   var url = '../app/controller/add_cliente.php';
   var data={
		cedula:nif,nombre:nombre,apellido:apellido,direccion:direccion,
		barrio:barrio,comunidad:comunidad,pago:pago,celular:celular,internet:internet
	};
	$.ajax({
		type: "POST",
		url: url,
		data: data
	}).done(function( data ) {
		if (data == 1) {$.notify('Cliente agregado con exito...', "success");
	    }else{$.notify(data, "success");} 
	});
}



				   function upd_cliente (str) 
				   {	

				   		var nif       = $('#cedula'+str).val();
				   		var nombre    = $('#nombre'+str).val();
				   		var apellido  = $('#apellido'+str).val();
				   		var direccion = $('#direccion'+str).val();
				   		var barrio    = $('#barrio'+str).val();
				   		var comunidad = $('#comunidad'+str).val();
				   		var celular   = $('#celular'+str).val();
				   		var pago      = $('#pago'+str).val();				   		
				   		var internet  = $('#internet'+str).val();



				      	var url = '../app/controller/upd_cliente.php';
				  	    var datas='cedula='+nif+'&nombre='+nombre+'&apellido='+apellido+'&direccion='+direccion+'&barrio='+barrio+'&comunidad='+comunidad+'&pago='+pago+'&celular='+celular+'&internet='+internet;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Datos actualizados...', "success");} else{$.notify(data, "success");}  });
				   };

				    function del_cliente (str) 
				   {	

				   		var nif   = $('#cedula'+str).val();
				      	var url   = '../app/controller/del_cliente.php';
				  	    var datas ='cedula='+nif;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Cliente Eliminado...', "success");} else{$.notify(data, "success");} });
				   };

				     function alta_cliente (str) 
				   {	

				   		var nif   = $('#cedula'+str).val();
				   		var net   = $('#act_mb'+str).val();
				   		var pag   = $('#act_pago'+str).val();

				      	var url   = '../app/controller/alta_cliente.php';
				  	    var datas ='cedula='+nif+'&pago='+pag+'&internet='+net;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Cliente Activo...', "success");} else{$.notify(data, "success");} });
				   };

				     function baja_cliente (str) 
				   {	

				   		var nif   = $('#cedula'+str).val();
				      	var url   = '../app/controller/baja_cliente.php';
				  	    var datas ='cedula='+nif;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Cliente Dado de baja...', "success");} else{$.notify(data, "success");} });
				   };


				   function valid (str) 
				   {	
				   			$(document).ready(function() 
				   			{

				   			$('#comunidad'+str).cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
							$('#barrio'+str).cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
							$('#apellido'+str).cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
							$('#nombre'+str).cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
							//Para escribir solo numeros    
							$('#internet'+str).cajavalid('0123456789'); 
							$('#pago'+str).cajavalid('0123456789');
							$('#celular'+str).cajavalid('0123456789');  
							});  
				   };

				   function valid_cedula () 
				   {	

				   			var id = $('#cedula').val();
				         	var datas = 'cedula='+id;	
				         	if (id.length < 15) {						
							$("#btn_add").attr("disabled",true);	
							
							}
							

							if (id.length >= 15) {
								//$("#btn_add").attr("disabled",false);
								var urls = '../app/controller/cedula.php';
							$.ajax({type:"POST",url:urls,data: datas}).done(function(data) {if (data == 1) {$.notify('Numero de Cedula Correcto','success');
							$("#btn_add").attr("disabled",false);} });
							}
							
				   };