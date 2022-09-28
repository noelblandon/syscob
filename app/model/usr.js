$(document).ready(function() 
{
	
	$('body').load(listar_user());

							$('#comunidad').cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
							$('#barrio').cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
							$('#apellido').cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
							$('#nombre').cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
							//Para escribir solo numeros    
							$('#internet').cajavalid('0123456789'); 
							$('#pago').cajavalid('0123456789');
							$('#celular').cajavalid('0123456789');    
							$("#btn_add").attr("disabled",true);
	 
	 

	
});

			
				
				function listar_user()
					{

								var url = '../app/controller/listar_usr.php';
								$.ajax({type: "POST",url: url}).done(function( data ) {$('#tabla').html(data);});
								
						
				   };

;
				   

				   function add_user () 
				   {	

				   		var name = $('#name_user').val();
				   		var pass = $('#pass_user').val();
				   		var rol  = $('#rol_user').val();


				      	var url = '../app/controller/add_user.php';
				  	    var datas='name='+name+'&pass='+pass+'&rol='+rol;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Usuario agregado con exito...', "success");} else{$.notify(data, "success");}  });
			  };



				   function upd_user (str) 
				   {	
				   		var id   = $('#id_user'+str).val();
				   		var name = $('#name_user'+str).val();
				   		var pass = $('#pass_user'+str).val();
				   		var rol  = $('#rol_user'+str).val();

				   		if (pass == "") 
				   		{
				   			
				   			var url = '../app/controller/upd_user.php';
				  	   		var datas='id='+id+'&name='+name+'&rol='+rol;
			   				$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Datos actualizados...', "success");} else{$.notify(data, "success");}  });
				   		
				   		}
				   		else
				   		{
				   			
				      	var url = '../app/controller/upd_user.php';
				  	    var datas='id='+id+'&pass='+pass;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Contraseña de usuario actualizado...', "success");} else{$.notify(data, "success");}  });
				   		}


				      	
				   };

				    function del_user (str) 
				   {	

				   		var nif   = $('#id_user'+str).val();
				      	var url   = '../app/controller/del_user.php';
				  	    var datas ='cedula='+nif;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Usuario Eliminado...', "success");} else{$.notify(data, "success");} });
				   };