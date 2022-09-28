$(document).ready(function() 
{
	
	$('body').load(listar_pagos());
	$('body').load(listar_mora());


	
});

				

				function listar_pagos()
					{

								var url = '../app/controller/listar_pago.php';
								$.ajax({type: "POST",url: url,}).done(function( data ) {$('#pagos').html(data);});
						
				   };
				   function listar_pagos_like()
					{			
								var datos = $('#buscar_clientes_pago').val();
								var datas ='data='+datos;
								var url   = '../app/controller/listar_pago_like.php';
								$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {$('#pagos').html(data);});
						
				   };
				   function listar_mora()
					{

								var url = '../app/controller/listar_mora.php';
								$.ajax({type: "POST",url: url}).done(function( data ) {$('#mora').html(data);});
						
				   };
				   

				   function facturar (str) 
				   {	

				   		var nif      = $('#cedula'+str).val();
				   		var internet = $('#internet'+str).val();
				   		var pago     = $('#pago'+str).val();
				   		var n_pago   = $('#n_pago'+str).val();

				   		



				      	var url = '../app/controller/facturar.php';
				  	    var datas='cedula='+nif+'&internet='+internet+'&pago='+pago+'&n_pago='+n_pago;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Mes cancelado...', "success");listar_mora(); $('#btn_factura'+str).attr('disabled',true);$('#btn_imprimir'+str).show();$('#buscar_clientes_pago').val('');} else{$.notify(data, "success");}  });
   			


				   };

				    function imprimir (str) 
				   {	

				   		var nif = $('#cedula_print'+str).val();
				   		var imp = $('#n_pago_print'+str).val();	
				  	   
     					 window.open('../app/controller/factura.php?cedula='+nif+'&&pago='+imp,'_blank');    			


				   };
				   function ocultar (str) {
				   	$('#btn_imprimir'+str).hide();
				   }

				 





			