$(document).ready(function(){
$( ".catalogo" ).click(function() {/*ITEMS-CATALOGO*/
  $('.mostraritem').load(Titems());
       $(".contenido").empty();
  $( ".contenido" ).append( ' <div class="catalogodiv"><div class="item"><label class="lcatalogo">Catálogo</label><br><input id="id" type="text" name="id" value="" size="30" placeholder="Id" style="display:none"><input id="cod" type="text" name="cod" value="" size="30" placeholder="Código"><br><input id="nombre" type="text" name="nombre" value="" size="30" placeholder="Nombre"><br><input id="desc" type="text" name="desc" value="" size="30" placeholder="Descripción"><br><input id="precio" type="text" name="precio" value="" size="30" placeholder="Precio"><br><button id="item" class="btng" type="button" name="button" onclick="addTitems();">Guardar</button><br></div><div class="mostraritem"></div></div> ' );
$('.mostraritem').load(Titems());
});

$( ".cliente" ).click(function() {/*CLIENTE*/
$('.mostraritem').load(Cliente());
       $(".contenido").empty();
  $( ".contenido" ).append( ' <div class="catalogodiv">      <div class="item">      <label class="lcatalogo">Cliente</label><br>      <label id="itkcli"></label>      <input id="id" type="text" name="id" value="" size="30" placeholder="Id" style="display:none"><br>      <label id="itkcli">Nombre</label>      <input id="nombre" type="text" name="nombre" value="" size="30" placeholder="Nombre"><br>      <label id="itkcli">Dirección</label>      <input id="dir" type="text" name="dir" value="" size="30" placeholder="Dirección"><br>      <label id="itkcli">Teléfono</label>      <input id="tel" type="text" name="tel" value="" size="30" placeholder="Teléfono"><br>      <label id="itkcli" style="display:none">Descuento</label>      <input id="desc" type="text" name="desc" value="0" size="30" placeholder="Descuento" style="display:none"><br>      <label id="itkcli"></label>      <input id="estado" type="text" name="estado" value="" size="30" placeholder="estado" style="display:none"><br>      <button id="cliente" class="btng" type="button" name="button" onclick="addCliente();">Guardar</button><br>      </div>      <div class="mostraritem">      </div>      </div> ' );
$('.mostraritem').load(Cliente());
});

$( ".inventario" ).click(function() {/*PRODUCTO*/
$('.mostraritem').load(Producto());
       $(".contenido").empty();
  $( ".contenido" ).append( ' <div class="catalogodiv">    <div class="item">      <label id="product" style="display:none"></label>      <label class="lcatalogo">Producto</label><br>      <input id="idp" type="text" name="idp" value="" size="30" placeholder="Id" style="display:none">      <label id="itkpro">Código</label>      <input id="cod" type="text" name="cod" value="" size="30" placeholder="Código">      <button id="buscar" type="button" name="button" onclick="Titems();" style="display:none">...</button><br>      <label id="itkpro">Nombre</label>      <input id="prod" type="text" name="prod" value="" size="30" placeholder="Nombre"><br>      <label id="itkpro">P Compra</label>      <input id="precioc" type="text" name="precioc" value="" size="30" placeholder="Precio de Compra"><br>      <label id="itkpro">Precio A</label>      <input id="iprecioA" type="text" name="iprecioA" value="" size="30" placeholder="Precio A"><br>      <label id="itkpro">Precio B</label>      <input id="iprecioB" type="text" name="iprecioB" value="" size="30" placeholder="Precio B"><br>      <label id="itkpro">Precio C</label>      <input id="iprecioC" type="text" name="iprecioC" value="" size="30" placeholder="Precio C"><br>      <label id="itkpro">Preicio D</label>      <input id="iprecioD" type="text" name="iprecioD" value="" size="30" placeholder="Precio D"><br>      <label id="itkpro">Existencias</label>      <input id="cant" type="text" name="cant" value="" size="30" placeholder="Existencias"><br>      <label id="itkpro"></label>      <input id="estado" type="text" name="estado" value="" size="30" placeholder="estado" style="display:none"><br>      <label id="itkpro"></label>      <input id="idinventario" type="text" name="idinventario" value="1" size="30" placeholder="IdInventario" style="display:none"><br>      <button id="inventario" class="btng" type="button" name="button" onclick="addproducto();">Guardar</button><br></div><div class="mostraritem"></div></div> ' );
  //$('#inventario').attr('disabled', true);
$('.mostraritem').load(Producto());

});

$( ".proveedor" ).click(function() {/*PROVEEDOR*/
$('.mostraritem').load(Proveedor());
       $(".contenido").empty();
  $( ".contenido" ).append( ' <div class="catalogodiv">      <div class="item">      <label id="pro" style="display:none"></label>      <label class="lcatalogo">Proveedor</label><br>       <label id="itkprov"></label>      <input id="id" type="text" name="id" value="" size="30" placeholder="Id" style="display:none"><br>       <label id="itkprov">Nombre</label>      <input id="nombre" type="text" name="nombre" value="" size="30" placeholder="Nombre"><br>       <label id="itkprov">Dirección</label>      <input id="dir" type="text" name="dir" value="" size="30" placeholder="Dirección"><br>       <label id="itkprov">Teléfono</label>      <input id="tel" type="text" name="tel" value="" size="30" placeholder="Teléfono"><br>       <label id="itkprov">Correo</label>      <input id="correo" type="text" name="correo" value="" size="30" placeholder="Correo"><br>       <label id="itkprov"></label>      <input id="estado" type="text" name="estado" value="" size="30" placeholder="estado" style="display:none"><br>      <button id="provee" class="btng" type="button" name="button" onclick="addProveedor();">Guardar</button><br>      </div>      <div class="mostraritem">      </div>      </div> ' );
$('.mostraritem').load(Proveedor());
});
$( ".compra" ).click(function() {/*COMPRA*/
$('.mostraritem').load(Compra());
       $(".contenido").empty();

  $( ".contenido" ).append('<div class="catalogodiv">    <div class="item">      <label id="droo" style="display:none"></label>      <label class="lcatalogo">Compra</label><br>      <label id="itkcom"></label>      <input id="idcompra" type="text" name="idcompra" value="" size="30" placeholder="Id" style="display:none">      <label id="itkcom"></label>      <input id="proveedorID" type="text" name="proveedorID" value="" size="30" placeholder="IdProveedor" style="display:none"><br>      <label id="itkcom"></label>      <input id="proveedor" type="text" name="proveedor" value="" size="30" placeholder="Proveedor">      <button id="buscar" type="button" name="button" onclick="Proveedor();">...</button><br>      <div class="check">        <input id="checkbox1" type="checkbox" name="nuevo" value="nuevo" > Nuevo        <input id="checkbox2" type="checkbox" name="existente" value="existente"> Existente<br>      </div>      <label id="itkcom"></label>      <input id="idp" type="text" name="idp" value="" size="30" placeholder="IdProducto" style="display:none"><br>      <label id="itkcom">Código</label>      <input id="cod" type="text" name="cod" value="" size="30" placeholder="Código"><br>      <label id="itkcom">Producto</label>      <input id="prod" type="text" name="prod" value="" size="30" placeholder="Producto">      <button id="buscar" type="button" name="button" onclick="Producto();">...</button><br>      <label id="itkcom">P Compra</label>      <input id="precioc" type="text" name="precioc" value="" size="30" placeholder="Precio de Compra"><br>      <label id="itkcom">Precio + IVA</label>      <input id="precioIVA" type="text" name="precioIVA" value="" size="30" placeholder="Precio + IVA"><br>      <div class="por">        <label id="itkcom"></label>      <input id="combo" type="checkbox" name="combo" value="combo" > Combobox        <input id="texto" type="checkbox" name="texto" value="texto"> Porciento Numérico<br>      </div>      <label id="itkcom"></label>      <select id="sel" name="sel" >    <option value=""></option>    <option value="15">15%</option>    <option value="20">20%</option>    <option value="25">25%</option>    <option value="30">30%</option>    <option value="35">35%</option>    <option value="40">40%</option>    <option value="45">45%</option>    <option value="50">50%</option>    <option value="55">55%</option>    <option value="60">60%</option>    </select>      <input id="cal" type="text" name="cal" value="" size="14" placeholder="Porciento"><br>      <label id="itkcom">Precio A</label>      <input id="precioA" type="text" name="precioA" value="" size="30" placeholder="Precio A"><br>      <label id="itkcom">Precio B</label>      <input id="precioB" type="text" name="precioB" value="" size="30" placeholder="Precio B"><br>      <label id="itkcom">Precio C</label>      <input id="precioC" type="text" name="precioC" value="" size="30" placeholder="Precio C"><br>      <label id="itkcom">Preicio D</label>      <input id="precioD" type="text" name="precioD" value="" size="30" placeholder="Preicio D"><br>      <label id="itkcom">Existencias</label>      <input id="cant" type="text" name="cant" value="" size="30" placeholder="Existencias"><br>      <label id="itkcom">Fecha</label>      <input id="fcompra" type="text" name="fcompra" value="" size="30" placeholder="Fecha de Compra"><br>      <label id="itkcom"></label>      <input id="estado" type="text" name="estado" value="1" size="30" style="display:none" placeholder="estado" ><br>      <label id="itkcom"></label>      <input id="idinventario" type="text" name="idinventario" value="1" size="30" placeholder="IdInventario" style="display:none"><br>      <button id="compra" class="btng" type="button" name="button" onclick="addCompra();">Guardar</button><br>    </div>    <div class="mostraritem"></div>  </div>');
  $("#combo").change(function () {
    $("#texto").prop('checked', false);
    $("#sel").attr('disabled', false);
    $("#cal").attr('disabled', true);
      if ($(this).is(':checked')) {
        $("#texto").prop('checked', false);
        $("#sel").attr('disabled', false);
        $("#cal").attr('disabled', true);
      } else {
          //$("input[type=checkbox]").prop('checked', false);//todos los check
          //$("#diasHabilitados input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
      }
  });
  $("#texto").change(function () {
    $("#combo").prop('checked', false);
    $("#sel").attr('disabled', true);
    $("#cal").attr('disabled', false);
      if ($(this).is(':checked')) {
        $("#combo").prop('checked', false);
        $("#sel").attr('disabled', true);
        $("#cal").attr('disabled', false);
      } else {
          //$("input[type=checkbox]").prop('checked', false);//todos los check
          //$("#diasHabilitados input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
      }
  });
  //$("#checkbox1").attr('checked','checked');
//$('#checkbox1').prop('checked',true);
  $("#checkbox1").change(function () {
    $("#checkbox2").prop('checked', false);
    $("#compra").attr("onclick","addCompra()");
      if ($(this).is(':checked')) {
          //$("input[type=checkbox]").prop('checked', true); //todos los check
          $("#compra").attr("onclick","addCompra()");
          $("#checkbox2").prop('checked', false); //solo los del objeto #diasHabilitados
      } else {
          //$("input[type=checkbox]").prop('checked', false);//todos los check
          //$("#diasHabilitados input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
      }
  });
  $("#checkbox2").change(function () {
    $("#checkbox1").prop('checked', false);
    $("#compra").attr("onclick","addCompra2()");
      if ($(this).is(':checked')) {
          //$("input[type=checkbox]").prop('checked', true); //todos los check
          $("#compra").attr("onclick","addCompra2()");
          $("#checkbox1").prop('checked', false); //solo los del objeto #diasHabilitados
      } else {
          //$("input[type=checkbox]").prop('checked', false);//todos los check
          //$("#diasHabilitados input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
      }
  });

$('.mostraritem').load(Compra());
});
$( ".venta" ).click(function() {/*VENTA*/
  count=0;console.log("cont_append "+count);
       $(".contenido").empty();
    $( ".contenido" ).append('<div class="catalogodiv">      <div class="comp" >      <label id="lventa" class="lventa" >Venta</label><br>      <div class="label" style="display:none"></div>      <input id="recibo" type="text" name="recibo" value="" size="30" placeholder="N° Recibo" style="color:#000;" readonly onkeypress="valid();"><br>      <input id="nombreC" type="text" name="nombreC" value="" size="30" placeholder="Nombre">      <button id="buscar" type="button" name="button" data-toggle="modal" data-target="#exampleModal" onclick="clie();">...</button><br>      <button id="add" type="button" name="button" data-toggle="modal" data-target="#exampleModal" onclick="prod()";>Agregar producto</button>      <input id="fventa" type="text" name="fventa" value="" size="30" placeholder="Fecha de Venta" onkeypress="valid1();"><br>      <table class="table table-striped table-hover">      <thead>      <tr>      <th>N°</th>      <th>Producto</th>      <th>Cantidad</th>      <th>Precio Unidad</th>      <th>Existencia</th>      <th>Precio</th>      <th>Ganancias</th></tr></thead>      <tbody>      <tr>      <td>1</td>      <td id="id" style="display:none" name="id"></td>      <td id="prod" name="prod"></td>      <td id="vcant">      <input id="icant" type="text" name="vcant" value="" size="10"></input></td>      <td id="preciounidad" name="preciounidad"></td>      <td id="existencia" name="existencia"></td>      <td id="precio" name="precio"></td>      <td id="ganancias" name="ganancias"></td><td id="gana" style="display:none"name="gana"></td>      <td id="preciop" name="preciop" style="display:none"></td>      <td id="idinv" name="idinv">      <td id="pc" name="pc" style="display:none"></td></tr>      <tr><td>2</td>      <td id="id1" style="display:none"></td>      <td id="prod1" name="prod"></td>      <td id="vcant1">      <input id="icant1" type="text" name="vcant1" value="" size="10"></input></td>      <td id="preciounidad1" name="preciounidad1"></td>      <td id="existencia1" name="existencia1"></td>      <td id="precio1" name="precio1"></td>      <td id="ganancias1" name="ganancias1"></td><td id="gana1" style="display:none"name="gana1"></td>      <td id="preciop1" name="preciop" style="display:none"></td>      <td id="idinv1" name="idinv1">      <td id="pc1" name="pc1" style="display:none"></td></tr>      <tr>      <td>3</td>      <td id="id2" style="display:none"></td>      <td id="prod2" name="prod"></td>      <td id="vcant2">      <input id="icant2" type="text" name="vcant2" value="" size="10"></input></td>      <td id="preciounidad2" name="preciounidad2"></td>      <td id="existencia2" name="existencia2"></td>      <td id="precio2" name="precio2"></td>      <td id="ganancias2" name="ganancias2"></td><td id="gana2" style="display:none"name="gana2"></td>      <td id="preciop2" name="preciop" style="display:none"></td>      <td id="idinv2" name="idinv2">      <td id="pc2" name="pc2" style="display:none"></td></tr>      <tr>      <td>4</td>      <td id="id3" style="display:none"></td>      <td id="prod3" name="prod"></td>      <td id="vcant3">      <input id="icant3" type="text" name="vcant3" value="" size="10"></input></td>      <td id="preciounidad3" name="preciounidad3"></td>      <td id="existencia3" name="existencia3"></td>      <td id="precio3" name="precio3"></td>      <td id="ganancias3" name="ganancias3"></td><td id="gana3" style="display:none"name="gana3"></td>      <td id="preciop3" name="preciop" style="display:none"></td>      <td id="idinv3" name="idinv3">      <td id="pc3" name="pc3" style="display:none"></td></tr>      <tr>      <td>5</td>      <td id="id4" style="display:none"></td>      <td id="prod4" name="prod"></td>      <td id="vcant4">      <input id="icant4" type="text" name="vcant4" value="" size="10"></input></td>      <td id="preciounidad4" name="preciounidad4"></td>      <td id="existencia4" name="existencia4"></td>      <td id="precio4" name="precio4"></td>      <td id="ganancias4" name="ganancias4"></td><td id="gana4" style="display:none"name="gana4"></td>      <td id="preciop4" name="preciop" style="display:none"></td>      <td id="idinv4" name="idinv4">      <td id="pc4" name="pc4" style="display:none"></td></tr></tbody></table>      <button id="clear" type="button" name="button" onclick="clear();">Limpiar Tabla</button>      <div class="checkv" style="display:none">    <label>Descuento</label>    <input id="dos" type="checkbox" name="dos" value="dos" > 25%        <input id="tres" type="checkbox" name="tres" value="tres"> 35%        <input id="cuatro" type="checkbox" name="cuatro" value="tres"> 45%      </div>      <input id="vdesc" type="text" name="vdesc" value="0" size="15" placeholder="Descuento" style="display:none"><br><br>      <select id="libre" name="libre" style="display:none">    <option value=""></option>    <option value="5">5%</option>    <option value="10">10%</option>    <option value="15">15%</option>    <option value="20">20%</option>    <option value="25">25%</option>    <option value="30">30%</option>    <option value="35">35%</option>    <option value="40">40%</option>    <option value="45">45%</option>    <option value="50">50%</option>    <option value="55">55%</option>  </select>      <input id="vdesc1" type="text" name="vdesc1" value="0" size="15" placeholder="Descuento" style="display:none"><br><br>      <input id="gane" type="text" name="gane" value="" size="15" placeholder="Ganancias" ><input id="total" type="text" name="total" value="" size="15" placeholder="Total" onkeypress="valid2();"><br><br><br>      <button id="fact" class="btng" type="button" name="button"  onclick="imp();" style="display:none">Imprimir</button><br>      <button id="venta" class="btng" type="button" name="button" onclick="addventa();updateventa();">Guardar</button><br><br></div>      <!-- Button trigger modal -->      <!-- Modal -->      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">      <div class="modal-dialog" role="document">      <div class="modal-content">      <div class="modal-header">      <h5 class="modal-title" id="exampleModalLabel">Lista de Productos</h5></div>      <button id="loadC" type="button" name="buttonC" onclick="loaderC();">Cargar cliente</button>      <button id="load" type="button" name="button" onclick="listProducto();">Cargar Producto</button>      <label id="lmodal">Productos Agregados 0</label>      <div class="modal-body mostraritem"></div></div></div></div><div class="" ></div></div>');
    //alert($('#libre').find('option:selected').val());
    $( "#clear" ).click(function() {//alert('Nobody Wins!');
    $('.table tbody').remove();
      count=0;console.log("cont_append "+count);
    $( ".table " ).append('<tbody>      <tr>      <td>1</td>      <td id="id" style="display:none" name="id"></td>      <td id="prod" name="prod"></td>      <td id="vcant">      <input id="icant" type="text" name="vcant" value="" size="10"></input></td>      <td id="preciounidad" name="preciounidad"></td>      <td id="existencia" name="existencia"></td>      <td id="precio" name="precio"></td>      <td id="ganancias" name="ganancias"></td><td id="gana" style="display:none"name="gana"></td>      <td id="preciop" name="preciop" style="display:none"></td>      <td id="idinv" name="idinv">      <td id="pc" name="pc" style="display:none"></td></tr>      <tr><td>2</td>      <td id="id1" style="display:none"></td>      <td id="prod1" name="prod"></td>      <td id="vcant1">      <input id="icant1" type="text" name="vcant1" value="" size="10"></input></td>      <td id="preciounidad1" name="preciounidad1"></td>      <td id="existencia1" name="existencia1"></td>      <td id="precio1" name="precio1"></td>      <td id="ganancias1" name="ganancias1"></td><td id="gana1" style="display:none"name="gana1"></td>      <td id="preciop1" name="preciop" style="display:none"></td>      <td id="idinv1" name="idinv1">      <td id="pc1" name="pc1" style="display:none"></td></tr>      <tr>      <td>3</td>      <td id="id2" style="display:none"></td>      <td id="prod2" name="prod"></td>      <td id="vcant2">      <input id="icant2" type="text" name="vcant2" value="" size="10"></input></td>      <td id="preciounidad2" name="preciounidad2"></td>      <td id="existencia2" name="existencia2"></td>      <td id="precio2" name="precio2"></td>      <td id="ganancias2" name="ganancias2"></td><td id="gana2" style="display:none"name="gana2"></td>      <td id="preciop2" name="preciop" style="display:none"></td>      <td id="idinv2" name="idinv2">      <td id="pc2" name="pc2" style="display:none"></td></tr>      <tr>      <td>4</td>      <td id="id3" style="display:none"></td>      <td id="prod3" name="prod"></td>      <td id="vcant3">      <input id="icant3" type="text" name="vcant3" value="" size="10"></input></td>      <td id="preciounidad3" name="preciounidad3"></td>      <td id="existencia3" name="existencia3"></td>      <td id="precio3" name="precio3"></td>      <td id="ganancias3" name="ganancias3"></td><td id="gana3" style="display:none"name="gana3"></td>      <td id="preciop3" name="preciop" style="display:none"></td>      <td id="idinv3" name="idinv3">      <td id="pc3" name="pc3" style="display:none"></td></tr>      <tr>      <td>5</td>      <td id="id4" style="display:none"></td>      <td id="prod4" name="prod"></td>      <td id="vcant4">      <input id="icant4" type="text" name="vcant4" value="" size="10"></input></td>      <td id="preciounidad4" name="preciounidad4"></td>      <td id="existencia4" name="existencia4"></td>      <td id="precio4" name="precio4"></td>      <td id="ganancias4" name="ganancias4"></td><td id="gana4" style="display:none"name="gana4"></td>      <td id="preciop4" name="preciop" style="display:none"></td>      <td id="idinv4" name="idinv4">      <td id="pc4" name="pc4" style="display:none"></td></tr></tbody>');
    });
  	$("#venta").attr('disabled', true);
    $("#libre").change(function () {
      if ($("#dos").prop('checked', false) && $("#tres").prop('checked', false) && $("#cuatro").prop('checked', false)) {
          var d = parseFloat($('#libre').find('option:selected').val());
          $('input:text[name=vdesc]').val(d / 100);
      }
  	});
    $("#dos").change(function () {
  		$("#tres").prop('checked', false);
  		$("#cuatro").prop('checked', false);
  			if ($(this).is(':checked')) {
          $("#libre").val($("option:first").val());
  				$('input:text[name=vdesc]').val(25 / 100);
  					$("#cuatro").prop('checked', false);
  					$("#tres").prop('checked', false);
  			} else {$('input:text[name=vdesc]').val(0);}
  	});
    $("#tres").change(function () {
  		$("#dos").prop('checked', false);
  		$("#cuatro").prop('checked', false);
  			if ($(this).is(':checked')) {
          $("#libre").val($("option:first").val());
  				$('input:text[name=vdesc]').val(35 / 100);
  					$("#cuatro").prop('checked', false);
  					$("#dos").prop('checked', false);
  			} else {$('input:text[name=vdesc]').val(0);}
  	});
    $("#cuatro").change(function () {
  		$("#tres").prop('checked', false);
  		$("#dos").prop('checked', false);
  			if ($(this).is(':checked')) {
          $("#libre").val($("option:first").val());
  				$('input:text[name=vdesc]').val(45 / 100);
  					$("#dos").prop('checked', false);
  					$("#tres").prop('checked', false);
  			} else {$('input:text[name=vdesc]').val(0);}
  	});
});

$( ".vfact" ).click(function() {/*VERFACTURA*/
       $(".contenido").empty();
  $( ".contenido" ).append('<div class="catalogodiv"><div class="comp" ><label id="lventa" class="lventa" >Venta</label><br><div class="label" style="display:none"></div><input id="idventa" type="text" name="idventa" value="" size="30" placeholder="IdVenta" style="display:none"><input id="recib" type="text" name="recib" value="" size="30" placeholder="N° Recibo" style="color:#000;" readonly><br><input id="nombreC" type="text" name="nombreC" value="" size="30" placeholder="Nombre"><button id="buscar" type="button" name="button" data-toggle="modal" data-target="#exampleModal" onclick="clie();">...</button><br><button id="add" type="button" name="button"  onclick="listDetalle();">Agregar detalle</button><input id="fventa" type="text" name="fventa" value="" size="30" placeholder="Fecha de Venta"  disabled><br><div class="mostrar" ><table class="table table-striped table-hover"><thead><tr><th>N°</th><th>Producto</th><th>Cantidad</th><th>Precio</th></tr></thead><tbody><tr><td>1</td><td id="id" style="display:none" name="id"></td><td id="prod" name="prod"></td><td id="vcant"><input id="icant" type="text" name="vcant" value="" size="10"></input></td><td id="precio" name="precio"></td><td id="preciop" name="preciop" style="display:none"></td></tr><tr><td>2</td><td id="id1" style="display:none"></td><td id="prod1" name="prod"></td><td id="vcant1"><input  id="icant1" type="text" name="vcant1" value="" size="10"></input></td><td id="precio1" name="precio"></td><td id="preciop1" name="preciop" style="display:none"></td></tr><tr><td>3</td><td id="id2" style="display:none"></td><td id="prod2" name="prod"></td><td id="vcant2"><input id="icant2" type="text" name="vcant2" value="" size="10"></input></td><td id="precio2" name="precio"></td><td id="preciop2" name="preciop" style="display:none"></td></tr><tr><td>4</td><td id="id3" style="display:none"></td><td id="prod3" name="prod"></td><td id="vcant3"><input id="icant3" type="text" name="vcant3" value="" size="10"></input></td><td id="precio3" name="precio"></td><td id="preciop3" name="preciop" style="display:none"></td></tr><tr><td>5</td><td id="id3" style="display:none"></td><td id="prod4" name="prod"></td><td id="vcant4"><input id="icant4" type="text" name="vcant4" value="" size="10"></input></td><td id="precio4" name="precio"></td><td id="preciop4" name="preciop" style="display:none"></td></tr></tbody></table></div><input id="vdesc" type="text" name="vdesc" value="0" size="15" placeholder="Descuento" style="display:none"><br><br><input id="vdesc1" type="text" name="vdesc1" value="0" size="15" placeholder="Descuento"><br><br><input id="total" type="text" name="total" value="" size="15" placeholder="Total"><br><br><br><button id="fact1" class="btng" type="button" name="button"  onclick="imp2();" style="display:none">Imprimir</button><br><br></div><!-- Button trigger modal --><!-- Modal --><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Lista de Productos</h5></div><button id="loadC" type="button" name="buttonC" onclick="loaderV();">Cargar Venta</button><label id="modal"></label><div class="modal-body mostraritem"></div></div></div></div></div>');
});
$( ".reportes" ).click(function() {/*REPORTES*/
  var fullDate = new Date();
	var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
	var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();
	$('input:text[name=fventa]').val(currentDate);
       $(".contenido").empty();
      $( ".contenido" ).append('<div class="catalogodiv">    <div class="comp" style="height:500px">      <label id="lreporte" class="lreporte" >Reportes por fecha</label><br>      <label>Desde</label>      <input id="fechai" type="text" name="fechai" value="" size="30" placeholder="">      <label>Hasta</label>      <input id="fechaf" type="text" name="fechaf" value="" size="30" placeholder=""><br><br><br>      <button id="fact2" class="btng" type="button" name="button"  onclick="report();" >ver</button><br><br>    </div>  </div>');
      $('#fechai').attr('placeholder',currentDate);
      $('#fechaf').attr('placeholder',currentDate);
});
});
