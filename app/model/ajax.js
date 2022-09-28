$(document).ready(function(){
	$( ".clear" ).click(function() {alert('Nobody Wins!');
	});
	//alert($('#control').text());
	$(".inventario").css("display", "none");
	$(".compra").css("display", "none");
	if ($('#control').text()==4) {
	$(".inventario").show();
	$(".compra").show();
	}
	$(document).on('click', ".producto", function (e){/*ACTUALIZARPRODUCTO*/
		$('#inventario').attr('disabled', false);
		console.log("actualizar producto");
		$("#estado").show();
		$("#idinventario").show();
		var product = document.getElementById("product");
		if (product = true) {
			var valores="";
			$(this).parents("tr").find("td").each(function(){
			valores+=$(this).html()+"\n";
			});
			var valores="";
		 $(this).parents("tr").find("td").each(function(){
		 valores+=$(this).html()+"\n";
		 });
			var arreglo = valores.split("\n", 11);
			$('input:text[name=idp]').val(arreglo[0]);
			$('input:text[name=cod]').val(arreglo[1]);
			$('input:text[name=prod]').val(arreglo[2]);
			$('input:text[name=precioc]').val(arreglo[3]);
			$('input:text[name=iprecioA]').val(arreglo[4]);
			$('input:text[name=iprecioB]').val(arreglo[5]);
			$('input:text[name=iprecioC]').val(arreglo[6]);
			$('input:text[name=iprecioD]').val(arreglo[7]);
			$('input:text[name=cant]').val(arreglo[8]);
			$('input:text[name=estado]').val(arreglo[9]);
			$('input:text[name=idinventario]').val(arreglo[10]);
			$("#inventario").attr("onclick","upProducto()");
			$("#inventario").html('Actualizar');
		}
	});
	$(document).on('click', ".producto", function (e){/*ACTUALIZARPRODUCTOenCompra*/
		$('#inventario').attr('disabled', false);
		console.log("actualizar producto");
		$("#estado").show();
		$("#idinventario").show();
		var product = document.getElementById("product");
		if (product = true) {
			var valores="";
			$(this).parents("tr").find("td").each(function(){
			valores+=$(this).html()+"\n";
			});
			var valores="";
		 $(this).parents("tr").find("td").each(function(){
		 valores+=$(this).html()+"\n";
		 });
			var arreglo = valores.split("\n", 11);
			$('input:text[name=idp]').val(arreglo[0]);
			$('input:text[name=cod]').val(arreglo[1]);
			$('input:text[name=prod]').val(arreglo[2]);
			$('input:text[name=precioc]').val(arreglo[3]);
			$('input:text[name=precioA]').val(arreglo[4]);
			$('input:text[name=precioB]').val(arreglo[5]);
			$('input:text[name=precioC]').val(arreglo[6]);
			$('input:text[name=precioD]').val(arreglo[7]);
			$('input:text[name=cant]').val(arreglo[8]);
			$('input:text[name=estado]').val(arreglo[9]);
			$('input:text[name=idinventario]').val(arreglo[10]);
			$("#inventario").attr("onclick","upProducto()");
			$("#inventario").html('Actualizar');
		}
	});
	$(document).on('click', ".obtenP", function (e){/*ActualizaProveedor*/
		console.log("actualizar proveedor");
		$("#estado").show();
		var pro = document.getElementById("pro");
		if (pro = true) {
			var valores="";
			$(this).parents("tr").find("td").each(function(){
			valores+=$(this).html()+"\n";
			});
			 var arreglo = valores.split("\n", 6);
			 $('input:text[name=id]').val(arreglo[0]);
			 $('input:text[name=nombre]').val(arreglo[1]);
			 $('input:text[name=dir]').val(arreglo[2]);
			 $('input:text[name=tel]').val(arreglo[3]);
			 $('input:text[name=correo]').val(arreglo[4]);
			 $('input:text[name=estado]').val(arreglo[5]);
			 $("#provee").attr("onclick","upProveedor()");
			 $("#provee").html('Actualizar');
		}
	});
	$(document).on('click', "#pro", function (e){/*agrega proveedor a compra*/
		console.log("agrega proveedor a compra");
		var droo = document.getElementById("droo");
		if (droo = true) {
			var valores="";
			$(this).parents("tr").find("td").each(function(){
			valores+=$(this).html()+"\n";
			});
			 var arreglo = valores.split("\n", 6);
			 $('input:text[name=proveedorID]').val(arreglo[0]);
			 $('input:text[name=proveedor]').val(arreglo[1]);
			 $("#compra").attr("onclick","addCompra()");
			 $("#compra").html('Guardar');
		}
	});
	$(document).on('click', ".client", function (e){/*ACTUALIZARCLIENTE*/
		console.log("actualiza clientes");
		$("#estado").show();
		var valores="";
		$(this).parents("tr").find("td").each(function(){
		valores+=$(this).html()+"\n";
		});
		 var arreglo = valores.split("\n", 7);
		 $('input:text[name=id]').val(arreglo[0]);
		 $('input:text[name=nombre]').val(arreglo[1]);
		 $('input:text[name=dir]').val(arreglo[2]);
		 $('input:text[name=tel]').val(arreglo[3]);
		 $('input:text[name=desc]').val(arreglo[4]);
		 $('input:text[name=estado]').val(arreglo[5]);
		 $('.mostraritem').load(Cliente());
		 $("#cliente").attr("onclick","upCliente()");
		 $("#cliente").html('Actualizar');
	});
	$(document).on('click', "#precioIVA", function (e){/*PRECIO+IVA*/
		var iva = parseFloat(parseFloat($('input:text[name=precioc]').val()) * parseFloat(0.15));
			 $('input:text[name=precioIVA]').val(parseFloat(parseFloat($('input:text[name=precioc]').val()) + iva).toFixed(2));
	});
	$(document).on('click', "#precioA", function (e){/*PRECIOA*///Audifonos Axxis 767 Flat Gris
		if ($("#combo").is(':checked')) {
			var d1 = parseFloat($('#sel').find('option:selected').val() / 100);
			var iva1 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d1);
			$('input:text[name=precioA]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva1).toFixed(2));
		} else {
			if ($("#texto").is(':checked')) {
				var d12 = parseFloat($('input:text[name=cal]').val() / 100);
				console.log(d12);
				var iva12 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d12);
				console.log(iva12);
				$('input:text[name=precioA]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva12).toFixed(2));
			} else {
					alert("Seleccione un Check para calcular el Precio A");
			}
		}
		/*var d1 = parseFloat($('#sel').find('option:selected').val() / 100);
		var iva1 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d1);
		$('input:text[name=precioA]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva1).toFixed(2));*/
	});
	$(document).on('click', "#precioB", function (e){/*PRECIOB*/
		if ($("#combo").is(':checked')) {
			var d2 = parseFloat($('#sel').find('option:selected').val() / 100);
			var iva2 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d2);
				 $('input:text[name=precioB]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva2).toFixed(2));
		} else {
			if ($("#texto").is(':checked')) {
				var d2 = parseFloat($('input:text[name=cal]').val() / 100);
				console.log(d2);
				var iva2 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d2);
				console.log(iva2);
				$('input:text[name=precioB]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva2).toFixed(2));
			} else {
					alert("Seleccione un Check para calcular el Precio B");
			}
		}
	});
	$(document).on('click', "#precioC", function (e){/*PRECIOC*/
		if ($("#combo").is(':checked')) {
		var d3 = parseFloat($('#sel').find('option:selected').val() / 100);
		var iva3 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d3);
			 $('input:text[name=precioC]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva3).toFixed(2));
		} else {
			if ($("#texto").is(':checked')) {
				var d3 = parseFloat($('input:text[name=cal]').val() / 100);
				console.log(d3);
				var iva3 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d3);
				console.log(iva3);
				$('input:text[name=precioC]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva3).toFixed(2));
			} else {
					alert("Seleccione un Check para calcular el Precio C");
			}
		}
	});
	$(document).on('click', "#precioD", function (e){/*PRECIOD*/
		if ($("#combo").is(':checked')) {
		var d4 = parseFloat($('#sel').find('option:selected').val() / 100);
		var iva4 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d4);
			 $('input:text[name=precioD]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva4).toFixed(2));
		} else {
			if ($("#texto").is(':checked')) {
				var d4 = parseFloat($('input:text[name=cal]').val() / 100);
				console.log(d4);
				var iva4 = parseFloat(parseFloat($('input:text[name=precioIVA]').val()) * d4);
				console.log(iva4);
				$('input:text[name=precioD]').val(parseFloat(parseFloat($('input:text[name=precioIVA]').val()) + iva4).toFixed(2));
			} else {
					alert("Seleccione un Check para calcular el Precio D");
			}
		}
	});
	$(document).on('click', ".obtenC", function (e){/*ACTUALIZARCOMPRA*/
		var pro = document.getElementById("pro");
		if (pro = true) {
			$('input:text[name=fcompra]').val('');
			var valores="";
			$(this).parents("tr").find("td").each(function(){
			valores+=$(this).html()+"\n";
			});
			 var arreglo = valores.split("\n", 13);
			 $('input:text[name=idcompra]').val(arreglo[0]);
			 $('input:text[name=proveedorID]').val(arreglo[1]);
			 $('input:text[name=proveedor]').val(arreglo[2]);
			 $('input:text[name=prod]').val(arreglo[3]);
			 $('input:text[name=precioc]').val(arreglo[11]);
			 $('input:text[name=precioIVA]').val(arreglo[4]);
			 $('input:text[name=precioA]').val(arreglo[5]);
			 $('input:text[name=precioB]').val(arreglo[6]);
			 $('input:text[name=precioC]').val(arreglo[7]);
			 $('input:text[name=precioD]').val(arreglo[8]);
			 $('input:text[name=cant]').val(arreglo[9]);
			 $('input:text[name=fcompra]').val(arreglo[10]);
			 $("#compra").attr("onclick","upCompra()");
			 $("#compra").html('Actualizar');
		}
	});
	$(document).on('click', "#recibo", function (e){/*CARGARRECIBO*/
		venta();
		$('input:text[name=recibo]').val(parseInt($('#v').text()) + 1);
		//console.log($('input:text[name=recibo]').val($('#v').text()));
		//console.log(parseInt($('#v').text()) + 1);
	});
	$(document).on('click', "#vcliente", function (e){/*agregaclienteVENTA*/
		var loadC = document.getElementById("loadC");
		if (loadC = true) {
		var valores="";
		$(this).parents("tr").find("td").each(function(){
		valores+=$(this).html()+"\n";
		});
		 var arreglo = valores.split("\n", 5);
		 $('input:text[name=nombreC]').val(arreglo[1]);
		 var d = arreglo[4];
		 $('input:text[name=vdesc]').val(d / 100);
		 console.log(d);
		 //$(".mostraritem").empty();
		 $("#exampleModal").modal('hide');
	 }
	});
	$(document).on('click', "#fcompra", function (e){/*fecha*/
		var fullDate = new Date();
		var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
		var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();
		$('input:text[name=fcompra]').val(currentDate);
	});
	$(document).on('click', "#fventa", function (e){/*fechaventa*/
		var fullDate = new Date();
		var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
		var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();
		$('input:text[name=fventa]').val(currentDate);
	});
	$("#dos").change(function () {
		alert("afuera");
		$("#tres").prop('checked', false);
		$("#cuatro").prop('checked', false);
			if ($(this).is(':checked')) {	alert("adentro");
				$('input:text[name=vdesc1]').val(25 / 100);
				console.log("25%  "+d);
					//$("input[type=checkbox]").prop('checked', true); //todos los check
					$("#cuatro").prop('checked', false);
					$("#tres").prop('checked', false); //solo los del objeto #diasHabilitados
			} else {
					//$("input[type=checkbox]").prop('checked', false);//todos los check
					//$("#diasHabilitados input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
			}
	});
	$(document).on('click', "#sele", function (e){/*cargaPreciounidadVENTAoculto*/
	$(".lvacio").text($( "select option:selected" ).text());
	});

		$(document).on('click', ".lproducto", function (e){/*agregaproductosventaREVISAR*/
			/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
				//$( "#mod td" ).css( "cursor", "not-allowed" );

			/*REVISAR
			$( "#mod tr" ).css('cursor', 'pointer)');
			$( "#mod tr" ).parent().css('color', 'blue)');
			$(this.parentNode).css('color', 'blue)');
			CAMBIAR LOS INT POR float+++++++++++++++
			SEGUIR PROBANDO
			HACIENDO CALCULOS
			ocultar campos en appednd++++++++++++++++++
			agregar no factura a recibo+++++++++++++
			check en compra++++++++++++
			control de usuario
			*/
			var valores="";
			$(this).parents("tr").find("td").each(function(){
			valores+=$(this).html()+"\n";
			});
			 var arreglo = valores.split("\n", 29);
			 switch (count) {
				case 1:
				console.log("click en producto "+count);//$( "#sele option:selected" ).text()

					$("#prod").text(arreglo[2]);
					$("#pc").text(arreglo[3]);
					$("#existencia").text(arreglo[4]);
					$("#preciop").text(arreglo[6]);
					$("#preciounidad").text(arreglo[6]);
					//$("#preciop").text($( "#sele option:selected" ).text());
					//$("#preciounidad").text($( "#sele option:selected" ).text());
					//$("#gana").text(arreglo[5]);
					$("#id").text(arreglo[7]);
					//$(".mostraritem").empty();
					$("#exampleModal").modal('hide');
					$(document).on('click', "#total", function (e){/*ventatotal*/
						$("#gane").val(parseFloat($("#ganancias").text()).toFixed(2) - parseFloat($('input:text[name=vdesc1]').val()).toFixed(2));
						var uno=0;
						uno=parseFloat($("#preciop").html()).toFixed(2) * parseFloat($('input:text[name=vcant]').val()).toFixed(2);
						$('input:text[name=total]').val((uno)-(uno * parseFloat($('input:text[name=vdesc]').val()).toFixed(2)));
						$('input:text[name=vdesc1]').val($('input:text[name=vdesc]').val() * uno);
						console.log(parseFloat($('input:text[name=vdesc]').val()).toFixed(2));
						console.log($('input:text[name=vdesc]').val() * uno);
						console.log("uno"+uno);
					});
					break;
					case 2:
						$("#prod1").text(arreglo[2]);
						$("#pc1").text(arreglo[3]);
						$("#existencia1").text(arreglo[4]);
						$("#preciop1").text(arreglo[6]);
						$("#preciounidad1").text(arreglo[6]);
						console.log(arreglo[6]);
						$("#gana1").text(arreglo[5]);
						$("#id1").text(arreglo[7]);
						//$(".mostraritem").empty();
						$("#exampleModal").modal('hide');
						$(document).on('click', "#total", function (e){/*ventatotal*/
							var g2 = parseFloat($("#ganancias").text()) + parseFloat($("#ganancias1").text());
							$("#gane").val(parseFloat(g2 - parseFloat($('input:text[name=vdesc1]').val())).toFixed(2));
							var dos=0;
							dos=(parseFloat($("#preciop").html()) * parseFloat($('input:text[name=vcant]').val())) + (parseFloat($("#preciop1").html()) * parseFloat($('input:text[name=vcant1]').val()));
							$('input:text[name=total]').val((dos)-(dos * parseFloat($('input:text[name=vdesc]').val())));
							parseFloat($('input:text[name=vdesc1]').val($('input:text[name=vdesc]').val() * dos)).toFixed(2);
							$('input:text[name=vdesc1]').val($('input:text[name=vdesc]').val() * dos);
							console.log("dos"+dos);
							console.log("vdesc1"+parseFloat($('input:text[name=vdesc1]').val($('input:text[name=vdesc]').val() * dos)).toFixed(2));
						});
						break;
						case 3:
							$("#prod2").text(arreglo[2]);
							$("#pc2").text(arreglo[3]);
							$("#existencia2").text(arreglo[4]);
							$("#preciop2").text(arreglo[6]);
							$("#preciounidad2").text(arreglo[6]);
							$("#gana2").text(arreglo[5]);
							$("#id2").text(arreglo[7]);
							$(".mostraritem").empty();
							$("#exampleModal").modal('hide');
							$(document).on('click', "#total", function (e){/*ventatotal*/
								var g3 =parseFloat($("#ganancias").text()) + parseFloat($("#ganancias1").text()) + parseFloat($("#ganancias2").text());
								$("#gane").val(parseFloat(g3 - parseFloat($('input:text[name=vdesc1]').val())).toFixed(2));
								var tres=0;
								tres=(parseFloat($("#preciop").html()) * parseFloat($('input:text[name=vcant]').val())) + (parseFloat($("#preciop1").html()) * parseFloat($('input:text[name=vcant1]').val())) + (parseFloat($("#preciop2").html()) * parseFloat($('input:text[name=vcant2]').val()));
								$('input:text[name=total]').val((tres)-(tres * parseFloat($('input:text[name=vdesc]').val())));
								$('input:text[name=vdesc1]').val($('input:text[name=vdesc]').val() * tres);
								console.log("tres"+tres);
							});
							break;
							case 4:
								$("#prod3").text(arreglo[2]);
								$("#pc3").text(arreglo[3]);
								$("#existencia3").text(arreglo[4]);
								$("#preciop3").text(arreglo[6]);
								$("#preciounidad3").text(arreglo[6]);
								$("#gana3").text(arreglo[5]);
								$("#id3").text(arreglo[7]);
								$(".mostraritem").empty();
								$("#exampleModal").modal('hide');
								$(document).on('click', "#total", function (e){/*ventatotal*/
									var g4 = parseFloat($("#ganancias").text()) + parseFloat($("#ganancias1").text()) + parseFloat($("#ganancias2").text()) + parseFloat($("#ganancias3").text());
									$("#gane").val(g4 - parseFloat($('input:text[name=vdesc1]').val()));
									var cuatro=0;
									cuatro=(parseFloat($("#preciop").html()) * parseFloat($('input:text[name=vcant]').val())) + (parseFloat($("#preciop1").html()) * parseFloat($('input:text[name=vcant1]').val())) + (parseFloat($("#preciop2").html()) * parseFloat($('input:text[name=vcant2]').val())) + (parseFloat($("#preciop3").html()) * parseFloat($('input:text[name=vcant3]').val()));
									$('input:text[name=total]').val((cuatro)-(cuatro * parseFloat($('input:text[name=vdesc]').val())));
									$('input:text[name=vdesc1]').val($('input:text[name=vdesc]').val() * cuatro);
									console.log("cuatro"+cuatro);
								});
								break;
								case 5:
									$("#prod4").text(arreglo[2]);
									$("#pc4").text(arreglo[3]);
									$("#existencia4").text(arreglo[4]);
									$("#preciop4").text(arreglo[6]);
									$("#preciounidad4").text(arreglo[6]);
									$("#gana4").text(arreglo[5]);
									$("#id4").text(arreglo[7]);
									$(".mostraritem").empty();
									$("#exampleModal").modal('hide');
									$(document).on('click', "#total", function (e){/*ventatotal*/
										var g5 = parseFloat($("#ganancias").text()) + parseFloat($("#ganancias1").text()) + parseFloat($("#ganancias2").text()) + parseFloat($("#ganancias3").text()) + parseFloat($("#ganancias4").text());
										$("#gane").val(g5 - parseFloat($('input:text[name=vdesc1]').val()));
										var cinco=0;
										cinco=(parseFloat($("#preciop").html()) * parseFloat($('input:text[name=vcant]').val())) + (parseFloat($("#preciop1").html()) * parseFloat($('input:text[name=vcant1]').val())) + (parseFloat($("#preciop2").html()) * parseFloat($('input:text[name=vcant2]').val())) + (parseFloat($("#preciop3").html()) * parseFloat($('input:text[name=vcant3]').val())) + (parseFloat($("#preciop4").html()) * parseFloat($('input:text[name=vcant4]').val()));
										$('input:text[name=total]').val((cinco)-(cinco * parseFloat($('input:text[name=vdesc]').val())));
										$('input:text[name=vdesc1]').val($('input:text[name=vdesc]').val() * cinco);
										console.log("cinco"+cinco);
									});
									break;
									case 6:
									alert('Nobody Wins!');
										setTimeout(location.reload.bind(location), 2000);
										break;
				default:
				//alert('Nobody Wins!');
				//setTimeout(location.reload.bind(location), 2000);
			}
		});

	//$("#venta").attr('disabled', false);
	$(document).on('click', "#total", function (e){/*comprobar cantidad existencia venta*/
		//console.log(parseInt($('#existencia').html()) +" "+ (parseInt($('#icant').val())));
		if (!$('#total').val()=="")  {//ESTO NO FUNCIONA TODAVIA
			//alert("No hay suficientes existencias de este artículo");
			//$('#total').val("");
			$("#venta").attr('disabled', false);
		}else {$("#venta").attr('disabled', true);}
	});
	$(document).on('change', "#icant", function (e){/*comprobar cantidad existencia venta*/
		//console.log(parseInt($('#existencia').html()) +" "+ (parseInt($('#icant').val())));
		if (parseInt($('#existencia').html()) < (parseInt($('#icant').val())))  {
			alert("No hay suficientes existencias de este artículo");
			$('#icant').val("0");
		}
	});
	$(document).on('change', "#icant1", function (e){/*comprobar cantidad existencia venta*/
		if (parseInt($('#existencia1').html()) < parseInt($('#icant1').val())) {
			alert("No hay suficientes existencias de este artículo");
			$('#icant1').val("0");
		}
	});
	$(document).on('change', "#icant2", function (e){/*comprobar cantidad existencia venta*/
			if (parseInt($('#existencia2').html()) < parseInt($('#icant2').val())) {
				alert("No hay suficientes existencias de este artículo");
				$('#icant2').val("0");
			}
		});
		$(document).on('change', "#icant3", function (e){/*comprobar cantidad existencia venta*/
			if (parseInt($('#existencia3').html()) < parseInt($('#icant3').val())) {
				alert("No hay suficientes existencias de este artículo");
				$('#icant3').val("0");
			}
		});
		$(document).on('change', "#icant4", function (e){/*comprobar cantidad existencia venta*/
			if (parseInt($('#existencia4').html()) < parseInt($('#icant4').val())) {
				alert("No hay suficientes existencias de este artículo");
				$('#icant4').val("0");
			}
		});
	$(document).on('click', "#precioU", function (e){/*ACTUALIZARCOMPRA*/
		alert("donde estoy ajax linea 271 por ahi");
		$('input:text[name=precioU]').val($('input:text[name=cant]').val()/$('input:text[name=precio]').val());
	});
/*disparadores cambiar valores de precios en venta y ganancias*/
	$(document).on('change', "#vcant", function (e){/*vcant1*/
		$("#ganancias").text(parseFloat($('input:text[name=vcant]').val() * (parseFloat($("#preciop").text() - $("#pc").text()))).toFixed(2));
//$("#ganancias").text($('input:text[name=vcant]').val() * parseInt($("#gana").html()) );
		$("#precio").text(parseFloat($('input:text[name=vcant]').val() * $("#preciop").html()).toFixed(2));
		console.log("precio"+$("#preciop").html());
	});
	$(document).on('change', "#vcant1", function (e){/*vcant2*/
		$("#ganancias1").text(parseFloat($('input:text[name=vcant1]').val() * (parseFloat($("#preciop1").text() - $("#pc1").text()))).toFixed(2) );
		//$("#ganancias1").text($('input:text[name=vcant1]').val() * parseInt($("#gana1").html()) );
		$("#precio1").text(parseFloat($('input:text[name=vcant1]').val() * $("#preciop1").html()).toFixed(2));
		console.log($("#preciop1").html());
	});
	$(document).on('change', "#vcant2", function (e){/*vcant3*/
		$("#ganancias2").text(parseFloat($('input:text[name=vcant2]').val() * parseFloat($("#preciop2").text() - $("#pc2").text())).toFixed(2) );
		//$("#ganancias2").text($('input:text[name=vcant2]').val() * parseInt($("#gana2").html()) );
		$("#precio2").text(parseFloat($('input:text[name=vcant2]').val() * $("#preciop2").html()).toFixed(2));
		console.log($("#preciop2").html());
	});
	$(document).on('change', "#vcant3", function (e){/*vcant4*/
		$("#ganancias3").text(parseFloat($('input:text[name=vcant3]').val() * parseFloat($("#preciop3").text() - $("#pc3").text())).toFixed(2) );
		//$("#ganancias3").text($('input:text[name=vcant3]').val() * parseInt($("#gana").html()) );
		$("#precio3").text(parseFloat($('input:text[name=vcant3]').val() * $("#preciop3").html()).toFixed(2));
		console.log($("#preciop3").html());
	});
	$(document).on('change', "#vcant4", function (e){/*vcant5*/
		$("#ganancias4").text(parseFloat($('input:text[name=vcant4]').val() * parseFloat($("#preciop4").text() - $("#pc4").text())).toFixed(2) );
		//$("#ganancias4").text($('input:text[name=vcant4]').val() * parseInt($("#gana4").html()) );
		$("#precio4").text(parseFloat($('input:text[name=vcant4]').val() * $("#preciop4").html()).toFixed(2));
		console.log($("#preciop4").html());
	});
	$(document).on('click', ".lventa", function (e){/*listarventa_VERFACTURAS*/
		$('input:text[name=fcompra]').val('');
		var valores="";
		$(this).parents("tr").find("td").each(function(){
		valores+=$(this).html()+"\n";
		});
		 var arreglo = valores.split("\n", 7);
		 $('input:text[name=idventa]').val(arreglo[0]);
		 $('input:text[name=recib]').val(arreglo[1]);
		 $('input:text[name=nombreC]').val(arreglo[2]);
		 $('input:text[name=fventa]').val(arreglo[3]);
		 $('input:text[name=vdesc1]').val(arreglo[4]);
		 $('input:text[name=total]').val(arreglo[5]);
		 $("#exampleModal").modal('hide');
});
});/*fin del documet*/
function prod() {
$("#loadC").css("display", "none");
$("#load").show();
$('#lmodal').show();
$(".mostraritem").empty();
}
function clie() {
	$(".mostraritem").empty();
	$("#loadC").show();
$("#load").css("display", "none");
$('#lmodal').css("display", "none");
}
var count=0;
function loader(){
	if (count>5) {
		setTimeout(location.reload.bind(location), 2000);
	}else {
		count++;
		$('#lmodal').text("Productos Agregados "+ count);
		console.log(count+"contador");

	}
}
function loaderC(){
	Cliente();
}
function loaderV(){
		listVenta();
}
function loaderD(){
	listDetalle();
}
function Titems(){
        var url = '../app/controller/titems.php';
        $.ajax({type: "POST",url: url}).done(function( data ) {$('.mostraritem').html(data);});
   };
   function addTitems(){
      var cod = $('#cod').val();
      var nombre = $('#nombre').val();
      var desc  = $('#desc').val();
      var precio  = $('#precio').val();
        var url = '../app/controller/addTitems.php';
        var datas='cod='+cod+'&nombre='+nombre+'&desc='+desc+'&precio='+precio;
      $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
			$('.mostraritem').load(Titems());
			$('input[type="text"]').val('');
};
function upTitems(){
	var id = $('#id').val();
	var cod = $('#cod').val();
	var nombre = $('#nombre').val();
	var desc  = $('#desc').val();
	var precio  = $('#precio').val();
		var url = '../app/controller/upTitems.php';
		var datas='id='+id+'&cod='+cod+'&nombre='+nombre+'&desc='+desc+'&precio='+precio;
	$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
	$('.mostraritem').load(Titems());
	$('input[type="text"]').val('');
	$("#item").attr("onclick","addTitems()");
	$("#item").html('Guardar');
};
function Cliente(){
        var url = '../app/controller/Cliente.php';
        $.ajax({type: "POST",url: url}).done(function( data ) {$(".mostraritem").empty(); $('.mostraritem').html(data);});
   };

   function addCliente(){
      var nombre = $('#nombre').val();
      var dir = $('#dir').val();
      var tel  = $('#tel').val();
      var desc  = $('#desc').val();
        var url = '../app/controller/addCliente.php';
        var datas='nombre='+nombre+'&dir='+dir+'&tel='+tel+'&desc='+desc;
      $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
			$('.mostraritem').load(Cliente());
			$('input[type="text"]').val('');
};
function upCliente(){
	var id = $('#id').val();
	 var nombre = $('#nombre').val();
	 var dir = $('#dir').val();
	 var tel  = $('#tel').val();
	 var desc  = $('#desc').val();
	 var estado  = $('#estado').val();
		 var url = '../app/controller/upCliente.php';
		 var datas='&id='+id+'&nombre='+nombre+'&dir='+dir+'&tel='+tel+'&desc='+desc+'&estado='+estado;
	 $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
	 $('.mostraritem').load(Cliente());
	 $('input[type="text"]').val('');
	 $("#cliente").attr("onclick","addCliente()");
	$("#cliente").html('Guardar');
};
function addproducto(){/*addproducto*/
	$(document).on('click', "#inventario", function (e){/*validar*/
		//$('#inventario').attr('disabled', true);
			 var producto = 7;
				if($("#prod").val() == ""){ producto = producto-1;}
				if($("#precioc").val() == ""){ producto = producto-1;}
				if($("#iprecioA").val() == ""){ producto = producto-1;}
				if($("#iprecioB").val() == ""){ producto = producto-1;}
				if($("#iprecioC").val() == ""){ producto = producto-1;}
				if($("#iprecioD").val() == ""){ producto = producto-1;}
				if($("#cant").val() == ""){ producto = producto-1;}
				if(producto == 0){
						$('#inventario').attr('disabled', false);
				} else {
					if(producto == 7){
						$('#inventario').attr('disabled', true);
						var cant  = $('#cant').val();
						 var cod = $('#cod').val();
						 var nombre = $('#prod').val();
						 var precioc  = $('#precioc').val();
						 var precioA  = $('#iprecioA').val();
						 var precioB  = $('#iprecioB').val();
						 var precioC  = $('#iprecioC').val();
						 var precioD  = $('#iprecioD').val();
							 var url = '../app/controller/addproducto.php';
							 var  datas='&cant='+cant+'&cod='+cod+'&nombre='+nombre+'&precioc='+precioc+'&precioA='+precioA+'&precioB='+precioB+'&precioC='+precioC+'&precioD='+precioD;
						 $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
						 $('.mostraritem').load(Producto());
						 $('input[type="text"]').val('');
					 }else {alert("Datos incompletos");}
				}
	});
};
function addproducto2(){
	var cant  = $('#cant').val();
	 var cod = $('#cod').val();
	 var nombre = $('#prod').val();
	 var precioc  = $('#precioc').val();
	 var precioA = $('#precioA').val();
	 var precioB = $('#precioB').val();
	 var precioC = $('#precioC').val();
	 var precioD = $('#precioD').val();
		 var url = '../app/controller/addproducto.php';
		 var  datas='&cant='+cant+'&cod='+cod+'&nombre='+nombre+'&precioc='+precioc+'&precioA='+precioA+'&precioB='+precioB+'&precioC='+precioC+'&precioD='+precioD;
	 $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
	 $('.mostraritem').load(Producto());
	 $('input[type="text"]').val('');
};
function Producto(){
        var url = '../app/controller/Producto.php';
        $.ajax({type: "POST",url: url}).done(function( data ) {$('.mostraritem').html(data);});
};
function listProducto(){/*listaproductoventa*/
	if ($("#sele").val('0') == 0) {
		$( "#mod td" ).css( "cursor", "not-allowed" );
	}
        var url = '../app/controller/listProducto.php';
        $.ajax({type: "POST",url: url}).done(function( data ) {$(".mostraritem").empty(); $('.mostraritem').html(data);});
				//$( "#mod tr:nth-child(2)" ).css( "display", "none" );
};
function clear(){alert('Nobody Wins!');
};
function listVenta(){/*verfactura*/
        var url = '../app/controller/listVenta.php';
        $.ajax({type: "POST",url: url}).done(function( data ) {$(".mostraritem").empty(); $('.mostraritem').html(data);});
};
function listDetalle(){/*verfactura*/
		var idventa = $('#idventa').val();
		console.log(idventa);
        var url = '../app/controller/listDetalle.php';
				var datas='idventa='+idventa;
        $.ajax({type: "POST",url: url, data: datas}).done(function( data ) {$(".mostrar").empty(); $('.mostrar').html(data); });
};
function upProducto(){
	var id = $('#idp').val();
	var cod = $('#cod').val();
	var nombre = $('#prod').val();
	var precioc  = $('#precioc').val();
	var precioA  = $('#iprecioA').val();
	var precioB  = $('#iprecioB').val();
	var precioC  = $('#iprecioC').val();
	var precioD  = $('#iprecioD').val();
	 var estado  = $('#estado').val();
	 var idinventario = $('#idinventario').val();
		 var url = '../app/controller/upProducto.php';
		 var datas='&id='+id+'&cod='+cod+'&nombre='+nombre+'&precioc='+precioc+'&precioA='+precioA+'&precioB='+precioB+'&precioC='+precioC+'&precioD='+precioD+'&estado='+estado+'&idinventario='+idinventario;
	 $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
	 $('.mostraritem').load(Producto());
	 $('input[type="text"]').val('');
	 $("#inventario").attr("onclick","addproducto()");
	 $("#inventario").html('Guardar');
};
function upProducto2(){
	var id = $('#idp').val();
	var cod = $('#cod').val();
	var nombre = $('#prod').val();
	var precioc  = $('#precioc').val();
	var precioA = $('#precioA').val();
	var precioB = $('#precioB').val();
	var precioC = $('#precioC').val();
	var precioD = $('#precioD').val();
	 var estado  = $('#estado').val();
	 var idinventario = $('#idinventario').val();
		 var url = '../app/controller/upProducto.php';
		 var datas='&id='+id+'&cod='+cod+'&nombre='+nombre+'&precioc='+precioc+'&precioA='+precioA+'&precioB='+precioB+'&precioC='+precioC+'&precioD='+precioD+'&estado='+estado+'&idinventario='+idinventario;
	 $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
	 $('.mostraritem').load(Producto());
	 $('input[type="text"]').val('');
	 //alert("sali");
};
function upCantidad(){
	var cant = $('#cant').val();
	 var idinventario = $('#idinventario').val();
		 var url = '../app/controller/upCantidad.php';
		 var datas='&cant='+cant+'&idinventario='+idinventario;
	 $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
};
function addProveedor(){
	 var nombre = $('#nombre').val();
	 var dir = $('#dir').val();
	 var tel  = $('#tel').val();
	 var correo  = $('#correo').val();
		 var url = '../app/controller/addProveedor.php';
		 var datas='nombre='+nombre+'&dir='+dir+'&tel='+tel+'&correo='+correo;
	 $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
	 $('.mostraritem').load(Proveedor());
	 $('input[type="text"]').val('');
};
function Proveedor(){
        var url = '../app/controller/Proveedor.php';
        $.ajax({type: "POST",url: url}).done(function( data ) {$('.mostraritem').html(data);});
   };
	 function upProveedor(){
		 var id = $('#id').val();
	 	 var nombre = $('#nombre').val();
	 	 var dir = $('#dir').val();
	 	 var tel  = $('#tel').val();
	 	 var correo  = $('#correo').val();
		 var estado  = $('#estado').val();
	 		 var url = '../app/controller/upProveedor.php';
	 		 var datas='id='+id+'&nombre='+nombre+'&dir='+dir+'&tel='+tel+'&correo='+correo+'&estado='+estado;
	 	 $.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
	 	 $('.mostraritem').load(Proveedor());
	 	 $('input[type="text"]').val('');
		 $("#provee").attr("onclick","addProveedor()");
		 $("#provee").html('Guardar');
	 };
	 function addCompra(){/*addcompra*/
		 $(document).on('click', "#compra", function (e){/*validar*/
	 		//$('#inventario').attr('disabled', true);
			$("#checkbox1").prop('checked', false);
			$("#checkbox2").prop('checked', false);
			$("#combo").prop('checked', false);
			$("#texto").prop('checked', false);
	 			 var producto = 8;
	 				if($("#prod").val() == ""){ producto = producto-1;}
	 				if($("#precioc").val() == ""){ producto = producto-1;}
	 				if($("#precioIVA").val() == ""){ producto = producto-1;}
	 				if($("#precioA").val() == ""){ producto = producto-1;}
	 				if($("#precioB").val() == ""){ producto = producto-1;}
	 				if($("#precioC").val() == ""){ producto = producto-1;}
	 				if($("#precioD").val() == ""){ producto = producto-1;}
	 				if($("#cant").val() == ""){ producto = producto-1;}
	 				if(producto == 0){
	 						$('#inventario').attr('disabled', false);
	 				} else {
	 					if(producto == 8){
	 						$('#inventario').attr('disabled', true);
							var prod  = $('#prod').val();
						 var cod = $('#cod').val();
						 var cant = $('#cant').val();
						 var precioc  = $('#precioc').val();
						 var precioIVA  = $('#precioIVA').val();
							 var precioA = $('#precioA').val();
							 var precioB = $('#precioB').val();
							 var precioC = $('#precioC').val();
							 var precioD = $('#precioD').val();
						 var fcompra  = $('#fcompra').val();
						 var proveedorID  = $('#proveedorID').val();
							 var url = '../app/controller/addCompra.php';
							 var datas='&prod='+prod+'&cant='+cant+'&precioc='+precioc+'&precioIVA='+precioIVA+'&precioA='+precioA+'&precioB='+precioB+'&precioC='+precioC+'&precioD='+precioD+'&fcompra='+fcompra+'&proveedorID='+proveedorID;
						 $.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
						 addproducto2();
						 $('.mostraritem').load(Compra());
						 $('input[type="text"]').val('');
	 					 }else {alert("Datos incompletos");}
	 				}
					$("#checkbox1").prop('checked', false);
					$("#checkbox2").prop('checked', false);
					$("#combo").prop('checked', false);
					$("#texto").prop('checked', false);
	 	});
	 };
	 function addCompra2(){/*upcompra*/
	 	var prod  = $('#prod').val();
		 var cod = $('#cod').val();	2
	 	 var cant = $('#cant').val();
	 	 var precioc = $('#precioc').val();
		 var precioIVA  = $('#precioIVA').val();
		 var precioA = $('#precioA').val();
		 var precioB = $('#precioB').val();
		 var precioC = $('#precioC').val();
		 var precioD = $('#precioD').val();
	 	 var fcompra  = $('#fcompra').val();
	 	 var proveedorID  = $('#proveedorID').val();
	 		 var url = '../app/controller/addCompra.php';
	 		 var datas='&prod='+prod+'&cant='+cant+'&precioc='+precioc+'&precioIVA='+precioIVA+'&precioA='+precioA+'&precioB='+precioB+'&precioC='+precioC+'&precioD='+precioD+'&fcompra='+fcompra+'&proveedorID='+proveedorID;
	 	 $.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
		 upCantidad();
		 upProducto2();
	 	 $('.mostraritem').load(Compra());
	 	 $('input[type="text"]').val('');
		 $("#checkbox1").prop('checked', false);
		 $("#checkbox2").prop('checked', false);
		 $("#combo").prop('checked', false);
		 $("#texto").prop('checked', false);
	 };
	 function Compra(){/*compra*/
	         var url = '../app/controller/Compra.php';
	         $.ajax({type: "POST",url: url}).done(function( data ) {$('.mostraritem').html(data);});
	    };
			function upCompra(){
				var idcompra = $('#idcompra').val();
				var prod  = $('#prod').val();
			 	 var cant = $('#cant').val();
			 	 var precioc = $('#precioc').val();
				 var precioIVA  = $('#precioIVA').val();
				 var precioA = $('#precioA').val();
				 var precioB = $('#precioB').val();
				 var precioC = $('#precioC').val();
				 var precioD = $('#precioD').val();
			 	 var fcompra  = $('#fcompra').val();
			 	 var proveedorID  = $('#proveedorID').val();
					var url = '../app/controller/upCompra.php';
					var datas='idcompra='+idcompra+'&prod='+prod+'&cant='+cant+'&precioc='+precioc+'&precioIVA='+precioIVA+'&precioA='+precioA+'&precioB='+precioB+'&precioC='+precioC+'&precioD='+precioD+'&fcompra='+fcompra+'&proveedorID='+proveedorID;
				$.ajax({type: "POST",url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}  });
				$('.mostraritem').load(Compra());
				$('input[type="text"]').val('');
				$("#compra").attr("onclick","addCompra()");
				$("#compra").html('Guardar');
			};
			function venta(){
	 	         var url = '../app/controller/venta.php';
	 	         $.ajax({type: "POST",url: url}).done(function( data ) {$('.label').html(data);});
	 	    };

				function addventa(){
					//$(document).on('click', "#venta", function (e){/*validarventa*/
					console.log(count);
					switch (count) {
		 		 	case 1:
			         var venta = 4;
			          if($("#recibo").val() == ""){ venta = venta-1;}
			          if($("#fventa").val() == ""){ venta = venta-1;}
			          if($("#icant").val() == ""){ venta = venta-1;}
			          if($("#total").val() == ""){ venta = venta-1;}
			          if(venta == 0){
			              $('#venta').attr('disabled', false);
			          } else {
									if(venta === 4){
			              $('#venta').attr('disabled', true);
										console.log("case1"+count);
										var recibo  = $('#recibo').val();
										var nombrec = $('#nombreC').val();
										var fventa = $('#fventa').val();
										var prod  = $('#prod').text();
										var vcant  = $('#icant').val();
										var precio  = $('#precio').text();
										 var vdesc1  = $('#vdesc1').val();
										 var total  = $('#total').val();
										 var gane  = $('#gane').val();
										 var ex = parseInt($('#existencia').text() - $('#icant').val());
										 var id = $('#id').text();
										 console.log("ER"+ex);
									 var cont = count;
									 console.log("count_var "+count);
											var url = '../app/controller/addventa.php';
											var datas='&recibo='+recibo+'&nombrec='+nombrec+'&fventa='+fventa+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont+'&ex='+ex+'&id='+id+'&gane='+gane;
										$.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
										$("#fact").show();
									/*	$('input[type="text"]').val('');
										var win = window.open('http://localhost/htdocs/app/controller/factventa.php', '_blank');
					if (win) {
					    //Browser has allowed it to be opened
					    win.focus();
					} else {
					    //Browser has blocked it
					    alert('Please allow popups for this website');
					}
										setTimeout(location.reload.bind(location), 2000);*/
									}else {alert("Datos incompletos");alert("Se actualizara el navegador :(");setTimeout(location.reload.bind(location), 1000);}
			          }
		 		 		break;
		 				case 2:
						console.log("case2"+count);
						var recibo  = $('#recibo').val();
						var nombrec = $('#nombreC').val();
						var fventa = $('#fventa').val();
						var prod  = $('#prod').text();
						var vcant  = $('#icant').val();
						var precio  = $('#precio').text();
						var prod1  = $('#prod1').text();
						var vcant1  = $('#icant1').val();
						var precio1  = $('#precio1').text();
						 var vdesc1  = $('#vdesc1').val();
						 var total  = $('#total').val();
						 var gane  = $('#gane').val();
					 var cont = count;
							var url = '../app/controller/addventa1.php';
							var datas='&recibo='+recibo+'&nombrec='+nombrec+'&fventa='+fventa+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&prod1='+prod1+'&vcant1='+vcant1+'&precio1='+precio1+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont+'&gane='+gane;
						$.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
						$("#fact").show();
					/*	$('input[type="text"]').val('');
						var win = window.open('http://localhost/htdocs/app/controller/factventa.php', '_blank');
	if (win) {
			//Browser has allowed it to be opened
			win.focus();
	} else {
			//Browser has blocked it
			alert('Please allow popups for this website');
	}
						setTimeout(location.reload.bind(location), 2000);*/
		 			 		break;
		 					case 3:
							var recibo  = $('#recibo').val();
							var nombrec = $('#nombreC').val();
							var fventa = $('#fventa').val();
							var prod  = $('#prod').text();
							var vcant  = $('#icant').val();
							var precio  = $('#precio').text();
							var prod1  = $('#prod1').text();
							var vcant1  = $('#icant1').val();
							var precio1  = $('#precio1').text();
							var prod2  = $('#prod2').text();
							var vcant2  = $('#icant2').val();
							var precio2  = $('#precio2').text();
							 var vdesc1  = $('#vdesc1').val();
							 var total  = $('#total').val();
							 var gane  = $('#gane').val();
						 var cont = count;
								var url = '../app/controller/addventa2.php';
								var datas='&recibo='+recibo+'&nombrec='+nombrec+'&fventa='+fventa+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&prod1='+prod1+'&vcant1='+vcant1+'&precio1='+precio1+'&prod2='+prod2+'&vcant2='+vcant2+'&precio2='+precio2+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont+'&gane='+gane;
							$.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
							$("#fact").show();
							/*$('input[type="text"]').val('');
							setTimeout(location.reload.bind(location), 2000);*/
		 				 		break;
								case 4:
								var recibo  = $('#recibo').val();
								var nombrec = $('#nombreC').val();
								var fventa = $('#fventa').val();
								var prod  = $('#prod').text();
								var vcant  = $('#icant').val();
								var precio  = $('#precio').text();
								var prod1  = $('#prod1').text();
								var vcant1  = $('#icant1').val();
								var precio1  = $('#precio1').text();
								var prod2  = $('#prod2').text();
								var vcant2  = $('#icant2').val();
								var precio2  = $('#precio2').text();
								var prod3  = $('#prod3').text();
								var vcant3  = $('#icant3').val();
								var precio3  = $('#precio3').text();
								 var vdesc1  = $('#vdesc1').val();
								 var total  = $('#total').val();
								 var gane  = $('#gane').val();
							 var cont = count;
									var url = '../app/controller/addventa3.php';
									var datas='&recibo='+recibo+'&nombrec='+nombrec+'&fventa='+fventa+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&prod1='+prod1+'&vcant1='+vcant1+'&precio1='+precio1+'&prod2='+prod2+'&vcant2='+vcant2+'&precio2='+precio2+'&prod3='+prod3+'&vcant3='+vcant3+'&precio3='+precio3+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont+'&gane='+gane;
								$.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
								$("#fact").show();
							//	$('input[type="text"]').val('');
							/*	var win = window.open('http://localhost/htdocs/app/controller/factventa.php', '_blank');
			if (win) {
					//Browser has allowed it to be opened
					win.focus();
			} else {
					//Browser has blocked it
					alert('Please allow popups for this website');
			}
								setTimeout(location.reload.bind(location), 2000);*/
			 				 		break;
									case 5:
									var recibo  = $('#recibo').val();
									var nombrec = $('#nombreC').val();
									var fventa = $('#fventa').val();
									var prod  = $('#prod').text();
									var vcant  = $('#icant').val();
									var precio  = $('#precio').text();
									var prod1  = $('#prod1').text();
									var vcant1  = $('#icant1').val();
									var precio1  = $('#precio1').text();
									var prod2  = $('#prod2').text();
									var vcant2  = $('#icant2').val();
									var precio2  = $('#precio2').text();
									var prod3  = $('#prod3').text();
									var vcant3  = $('#icant3').val();
									var precio3  = $('#precio3').text();
									var prod4  = $('#prod4').text();
									var vcant4  = $('#icant4').val();
									var precio4  = $('#precio4').text();
									 var vdesc1  = $('#vdesc1').val();
									 var total  = $('#total').val();
									 var gane  = $('#gane').val();
								 var cont = count;
										var url = '../app/controller/addventa4.php';
										var datas='&recibo='+recibo+'&nombrec='+nombrec+'&fventa='+fventa+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&prod1='+prod1+'&vcant1='+vcant1+'&precio1='+precio1+'&prod2='+prod2+'&vcant2='+vcant2+'&precio2='+precio2+'&prod3='+prod3+'&vcant3='+vcant3+'&precio3='+precio3+'&prod4='+prod4+'&vcant4='+vcant4+'&precio4='+precio4+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont+'&gane='+gane;
									$.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
									$("#fact").show();
									//$('input[type="text"]').val('');
									/*var win = window.open('http://localhost/htdocs/app/controller/factventa.php', '_blank');
				if (win) {
						//Browser has allowed it to be opened
						win.focus();
				} else {
						//Browser has blocked it
						alert('Please allow popups for this website');
				}
									setTimeout(location.reload.bind(location), 2000);*/
				 				 		break;
		 		 	default:
		 			alert('Nobody Wins!');
		 		 }
 		 			//});
				};
				function imp(){

					switch (count) {
		 		 	case 1:
					var recibo  = $('#recibo').val();
					var nombrec = $('#nombreC').val();
					var prod  = $('#prod').text();
					var vcant  = $('#icant').val();
					var precio  = $('#precio').text();
					 var vdesc1  = $('#vdesc1').val();
					 var total  = $('#total').val();
					window.open('../app/controller/factventa.php?&recibo='+recibo+'&nombrec='+nombrec+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&vdesc1='+vdesc1+'&total='+total,'_blank');
		 		 		break;
						case 2:
						var recibo  = $('#recibo').val();
						var nombrec = $('#nombreC').val();
						var prod  = [$('#prod').text(), $('#prod1').text()];
						var vcant  = [$('#icant').val(), $('#icant1').val()];
						var precio  = [$('#precio').text(), $('#precio1').text()];
						 var vdesc1  = $('#vdesc1').val();
						 var total  = $('#total').val();
						 var cont = count;
						window.open('../app/controller/factventa1.php?&recibo='+recibo+'&nombrec='+nombrec+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont,'_blank');
			 		 		break;
							case 3:
							var recibo  = $('#recibo').val();
							var nombrec = $('#nombreC').val();
							var prod  = [$('#prod').text(), $('#prod1').text(), $('#prod2').text()];
							var vcant  = [$('#icant').val(), $('#icant1').val(), $('#icant2').val()];
							var precio  = [$('#precio').text(), $('#precio1').text(), $('#precio2').text()];
							 var vdesc1  = $('#vdesc1').val();
							 var total  = $('#total').val();
							 var cont = count;
							window.open('../app/controller/factventa1.php?&recibo='+recibo+'&nombrec='+nombrec+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont,'_blank');
				 		 		break;
								case 4:
								var recibo  = $('#recibo').val();
								var nombrec = $('#nombreC').val();
								var prod  = [$('#prod').text(), $('#prod1').text(), $('#prod2').text(), $('#prod3').text()];
								var vcant  = [$('#icant').val(), $('#icant1').val(), $('#icant2').val(), $('#icant3').val()];
								var precio  = [$('#precio').text(), $('#precio1').text(), $('#precio2').text(), $('#precio3').text()];
								 var vdesc1  = $('#vdesc1').val();
								 var total  = $('#total').val();
								 var cont = count;
								window.open('../app/controller/factventa1.php?&recibo='+recibo+'&nombrec='+nombrec+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont,'_blank');
					 		 		break;
									case 5:
									var recibo  = $('#recibo').val();
									var nombrec = $('#nombreC').val();
									var prod  = [$('#prod').text(), $('#prod1').text(), $('#prod2').text(), $('#prod3').text(), $('#prod4').text()];
									var vcant  = [$('#icant').val(), $('#icant1').val(), $('#icant2').val(), $('#icant3').val(), $('#icant4').val()];
									var precio  = [$('#precio').text(), $('#precio1').text(), $('#precio2').text(), $('#precio3').text(), $('#precio4').text()];
									 var vdesc1  = $('#vdesc1').val();
									 var total  = $('#total').val();
									 var cont = count;
									window.open('../app/controller/factventa1.php?&recibo='+recibo+'&nombrec='+nombrec+'&prod='+prod+'&vcant='+vcant+'&precio='+precio+'&vdesc1='+vdesc1+'&total='+total+'&cont='+cont,'_blank');
						 		 		break;
						default:
						alert('Nobody Wins!');
					 }

				};
				function imp2(){
					var idventa = $('#idventa').val();
					var nombrec = $('#nombreC').val();
					 var vdesc1  = $('#vdesc1').val();
					 var total  = $('#total').val();
					window.open('../app/controller/factventa2.php?idventa='+idventa+'&nombrec='+nombrec+'&vdesc1='+vdesc1+'&total='+total,'_blank');
				};
				function valid(){
						 var id = $('#recibo').val();
							 if (id.length <= 0) {
					 $("#venta").attr("disabled",true);
					 }
					 if (id.length >= 0) {
						 $("#venta").attr("disabled",false);
					 }
				};
				function valid1(){
						 var id = $('#fventa').val();
							 if (id.length <= 0) {
					 $("#venta").attr("disabled",true);
					 }
					 if (id.length >= 0) {
						 $("#venta").attr("disabled",false);
					 }
				};
				function valid2(){
						 var id = $('#total').val();
							 if (id.length <= 0) {
					 $("#venta").attr("disabled",true);
					 }
					 if (id.length >= 0) {
						 $("#venta").attr("disabled",false);
					 }
				};
function report(){
	var fechai = $('#fechai').val();
	var fechaf = $('#fechaf').val();
	window.open('../app/controller/reporte2.php?fechai='+fechai+'&fechaf='+fechaf,'_blank');
};
function updateventa(){/*Actualiza inventario en ventas*/
	//$(document).on('click', "#venta", function (e){/*validar*/
	switch (count) {
	case 1:
			 var venta = 4;
				if($("#recibo").val() == ""){ venta = venta-1;}
				if($("#fventa").val() == ""){ venta = venta-1;}
				if($("#icant").val() == ""){ venta = venta-1;}
				if($("#total").val() == "NaN" && $("#total").val() == ""){ venta = venta-1;}
				if(venta == 0){
						$('#venta').attr('disabled', false);
				} else {
					if(venta == 4){
						$('#venta').attr('disabled', true);
			 var ex = parseInt($('#existencia').text() - $('#icant').val());
			 var id = $('#id').text();
			 var cont = count;
			 console.log("ER"+ex+ " id "+id);
				var url = '../app/controller/updateventa.php';
				var datas='&ex='+ex+'&id='+id+'&cont='+cont;
			$.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
					}else {alert("Datos incompletos");}
				}
	break;
	case 2:
	var ex = parseInt($('#existencia').text() - $('#icant').val());
	var id = $('#id').text();
	var ex1 = parseInt($('#existencia1').text() - $('#icant1').val());
	var id1 = $('#id1').text();
	var cont = count;
	console.log("ER"+ex+ " id "+id);
	 var url = '../app/controller/updateventa1.php';
	 var datas='&ex='+ex+'&id='+id+'&ex1='+ex1+'&id1='+id1+'&cont='+cont;
 $.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
		break;
		case 3:
		var ex = parseInt($('#existencia').text() - $('#icant').val());
		var id = $('#id').text();
		var ex1 = parseInt($('#existencia1').text() - $('#icant1').val());
		var id1 = $('#id1').text();
		var ex2 = parseInt($('#existencia2').text() - $('#icant2').val());
		var id2 = $('#id2').text();
		var cont = count;
		console.log("ER"+ex+ " id "+id);
		 var url = '../app/controller/updateventa2.php';
		 var datas='&ex='+ex+'&id='+id+'&ex1='+ex1+'&id1='+id1+'&ex2='+ex2+'&id2='+id2+'&cont='+cont;
	 $.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
			break;
			case 4:
			var ex = parseInt($('#existencia').text() - $('#icant').val());
			var id = $('#id').text();
			var ex1 = parseInt($('#existencia1').text() - $('#icant1').val());
			var id1 = $('#id1').text();
			var ex2 = parseInt($('#existencia2').text() - $('#icant2').val());
			var id2 = $('#id2').text();
			var ex3 = parseInt($('#existencia3').text() - $('#icant3').val());
			var id3 = $('#id3').text();
			var cont = count;
			console.log("ER"+ex+ " id "+id);
			 var url = '../app/controller/updateventa3.php';
			 var datas='&ex='+ex+'&id='+id+'&ex1='+ex1+'&id1='+id1+'&ex2='+ex2+'&id2='+id2+'&ex3='+ex3+'&id3='+id3+'&cont='+cont;
		 $.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
				break;
				case 5:
				var ex = parseInt($('#existencia').text() - $('#icant').val());
				var id = $('#id').text();
				var ex1 = parseInt($('#existencia1').text() - $('#icant1').val());
				var id1 = $('#id1').text();
				var ex2 = parseInt($('#existencia2').text() - $('#icant2').val());
				var id2 = $('#id2').text();
				var ex3 = parseInt($('#existencia3').text() - $('#icant3').val());
				var id3 = $('#id3').text();
				var ex4 = parseInt($('#existencia4').text() - $('#icant4').val());
				var id4 = $('#id4').text();
				var cont = count;
				console.log("ER"+ex+ " id "+id);
				 var url = '../app/controller/updateventa4.php';
				 var datas='&ex='+ex+'&id='+id+'&ex1='+ex1+'&id1='+id1+'&ex2='+ex2+'&id2='+id2+'&ex3='+ex3+'&id3='+id3+'&ex4='+ex4+'&id4='+id4+'&cont='+cont;
			 $.ajax({type: "POST", url: url,data: datas}).done(function( data ) {if (data == 1) {$.notify('Exito...', "success");} else{$.notify(data, "success");}});
					break;
default:
alert('Nobody Wins!');
}
//});
};
function saveinventario(){

};
