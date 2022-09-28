  function upd_name () 
				   {	

				   		var nif = $('#name_upd').val();
				      	var url = '../app/controller/name.php';
				  	    var datas ='nombre='+nif;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Nombre de usuario actualizado...', "success");} else{$.notify(data, "success");}  });
				   };
  function upd_pass () 
				   {	

				   		var nif = $('#pass_upd').val();
				      	var url = '../app/controller/pass.php';
				  	    var datas='nombre='+nif;
			   			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Contraseña de usuario actualizado...', "success");} else{$.notify(data, "success");}  });
				   };
