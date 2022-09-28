$(document).ready(function(){
	
	$("#btn-login").click(function(e){
       var user = $('#form-username').val();
		var pass = $('#form-password').val();

		if (user == "") {e.preventDefault(); alert("El campo usuario esta vacio"); return null;}
		if (pass == "") {e.preventDefault(); alert("El campo contraseña esta vacio"); return null;}
			var url = 'app/controller/login.php';
			var datas="user="+user+"&pass="+pass;
			$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Ingrese Usuario y Contraseña Correctos...', "success");} else{$('#msg').html(data);}});
	});

	$(document).keypress(function(e) {
		if(e.which == 13) {
			e.preventDefault();
			$("#btn-login").trigger('click');
		}
	  });
});