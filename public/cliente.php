<?php include('layouts/header.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap.min.css">  
<?php include('partials/header-lib.php') ?>
<style>
    #example_length{
        margin-top:20px !important;
    }
</style>
</head>
<body>
<!-- navbar -->
<?php  include('partials/navbar.php');  ?>
<!-- Page Content -->
<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="text-left">
                                <button type="button" class="btn btn-info" id="createCliente">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true">
                                        <strong> Agregar Cliente</strong>
                                    </span>
                                </button>     
                                <!--button type="button" class="btn btn-info" data-toggle="modal" data-target="#clienteModal" data-backdrop="static">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true">
                                        <strong> Agregar Cliente</strong>
                                    </span>
                                </button-->             
                            </div><!-- text-left -->
                        </div><!-- ./col -->
                        </div><!-- ./row -->
                    </div><!-- ./panel-header -->
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Direccion</th>
                                    <th>Barrio</th>
                                    <th>Comunidad</th>
                                    <th>Celular</th>
                                    <th>MB</th>
                                    <th>Pago</th>
                                    <th>Fecha de<br>contrato</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>                                
                            </tbody>
                        </table><!-- ./table -->
                    </div><!-- ./panel-body -->
                </div><!--./panel -->
                <hr>
            </div><!--./well -->
            <hr>
        </div><!--./col -->
    </div><!--./row -->
</div><!--./container -->
<!-- **************************** -->
<?php  include('_cliente-nuevo-modal.php');  ?>  
<?php  include('_estado-cliente-modal.php');  ?>  
         <!-- jQuery -->
   <script src="../assets/js/jquery-1.11.1.min.js"></script>
   <!-- App -->
   <!--script src="../app/model/cliente.js"></script-->
   
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>      
    <!-- Bootstrap Core JavaScript -->
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>  
   <script src="../assets/js/notify.min.js"></script>   
   <script src="../assets/js/caja.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js" ></script>
    <script src="../assets/lib/jquery.mask.js" ></script>
    <script>      
function nuevoCliente(){
   var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Procesando...';
    $("#btn-accion").html(loadingText);    
    $("#btn-accion").prop("onclick", null).off("click");
    let data = $('#clienteForm').serialize();  
    $.ajax({
		type: "POST",
		url: "<?php echo $url_main;  ?>/app/actions/cliente-crud.php",
		data: data,
        dataType: 'json',
        success:function(data){
            $.notify(data.msg, "success");
           setTimeout(() => {
            window.location.reload();
           }, 1000);
            
        },error: function(x,s,m){
            alert(x.responseJSON.msg);
        }
    });
}

function updateCliente(){
   var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Procesando...';
    $("#btn-accion").html(loadingText);    
    $("#btn-accion").prop("onclick", null).off("click");
    let data = $('#clienteForm').serialize();  
    $.ajax({
		type: "POST",
		url: "<?php echo $url_main;  ?>/app/actions/cliente-crud.php?cedula="+$("#cedula").val(),
		data: data,
        dataType: 'json',
        success:function(data){
            $.notify(data.msg, "success");
           setTimeout(() => {
            window.location.reload();
           }, 1000);
            
        },error: function(x,s,m){
            alert(x.responseJSON.msg);
        }
    });
}
function actualizarEstado(){
   var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Procesando...';
    $("#btn-accion").html(loadingText);    
    $("#btn-accion").prop("onclick", null).off("click");
    let data = {accion:"estado",method:$("#methode").val()};
    $.ajax({
		type: "POST",
		url: "<?php echo $url_main;  ?>/app/actions/cliente-crud.php?cedula="+$("#cedulae").val(),
		data: data,
        dataType: 'json',
        success:function(data){
            $.notify(data.msg, "success");
           setTimeout(() => {
            window.location.reload();
           }, 1000);
            
        },error: function(x,s,m){
            alert(x.responseJSON.msg);
        }
    });
}

function editCliente(cedula){
    $.ajax({
		type: "POST",
		url: '<?php echo $url_main;  ?>/app/api/get-cliente.php',
		data: {ced:cedula},
        dataType: 'json',
        success:function(data){
            $('#clienteForm').trigger("reset");
            $("#btn-accion").html("Actualizar Informacion"); 
            $("#clienteModalLabel").html("Actualizar Informacion");
            
            let value = data.data[0];
            $('#cedula').val(value.cedula);
            $('#nombre').val(value.nombre);
            $('#apellido').val(value.apellido);
            $('#direccion').val(value.direccion);
            $('#barrio').val(value.barrio);
            $('#comunidad').val(value.comunidad);
            $('#celular').val(value.celular);
            $('#direccion').val(value.direccion);
            $('#internet').val(value.mb);
            $('#pago').val(value.pago);
            $('#cedula').prop('disabled',true);
            $("#method").val("update");
            $("#btn-accion").attr("onclick","updateCliente()");        
            $('#clienteModal').modal({
                show:true,
                backdrop:'static'
            });
            
        },error: function(x,s,m){
            
        }
    });
    
}

function estadoCliente(cedula){
    $.ajax({
		type: "POST",
		url: '<?php echo $url_main;  ?>/app/api/get-cliente.php',
		data: {ced:cedula},
        dataType: 'json',
        success:function(data){
            $('#estadoClienteForm').trigger("reset");
            let value = data.data[0];
            let estado = value.estado;
            $('#cedulae').val(value.cedula);
            $('#nombree').val(value.nombre);
            $('#apellidoe').val(value.apellido);
            $('#internete').val(value.mb);
            $('#pagoe').val(value.pago);
            let method = 0;
            let accion = "";
            if(estado == 1){
                $("#methode").val("baja");
                $("#est-accion-btn").removeAttr("class");
                $("#est-accion-btn").attr("class","btn btn-warning");
                 $("#est-accion-btn").html("Dar de baja");
            }else{
                $("#methode").val("alta");
                $("#est-accion-btn").removeAttr("class");
                $("#est-accion-btn").attr("class","btn btn-success");
                $("#est-accion-btn").html("Dar de alta");
            }            
            $("#est-accion-btn").val(value.cedula);  
            $('#modalEstadoCliente').modal({
                show:true,
                backdrop:'static'
            });
            
        },error: function(x,s,m){
            
        }
    });
}

        $(document).ready(function() {
            $('.cedula').mask('000-000000-0000Z', {
                translation: {
                    'Z': {
                        pattern: /[A-Z]/, optional: false
                    }
                }
            });
            $('#comunidad').cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
			$('#barrio').cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
			$('#apellido').cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
			$('#nombre').cajavalid('abcdefghijklmnñopqrstuvwxyzáéóíúiou ');
			//Para escribir solo numeros    
			$('#internet').cajavalid('0123456789'); 
			$('#pago').cajavalid('0123456789');
			$('#celular').cajavalid('0123456789');  


            var table = $('#example').DataTable( {
                ajax: {
                     url: '<?php echo $url_main;  ?>/app/api/get-cliente.php',
                     dataSrc: 'data'
                },columns: [
                    { data: "cedula" },
                    { data: "nombre" },
                    { data: "apellido" },
                    { data: "direccion" },
                    { data: "barrio" },
                    { data: "comunidad" },
                    { data: "celular" },
                    { data: "mb" },
                    { data: "pago" },
                    { data: "fecha" },
                    {data:null,
                        render: function(data,type){
                            return (data.estado == 1)?'Activo':'Inactivo';
                        }
                    },
                    {data:null,
                        render: function(data,type){
                            let render =  '<button type="button" class="btn btn-success btn-xs" onclick="editCliente(this.value)" value="'+data.cedula+'"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button><br><br>';
                                render += '<button type="button" class="btn btn-warning btn-xs" onclick="estadoCliente(this.value)" value="'+data.cedula+'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Estado</button><br><br>';
                                render += '<a class="btn btn-info btn-xs" href="../app/controller/contrato.php?id='+data.cedula+'" target="_blank" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Contrato</a><br>';
                                return render;
                        }
                    }
                ],
                "lengthMenu": [[ 10, 25, 50, -1], [10,25,50,"Todos"]],
                "language": {
                 "lengthMenu": "Mostrar _MENU_ registros por pagina",
                 "zeroRecords": "No hay resultado",
                 "info": "Mostrando pagina _PAGE_ de _PAGES_",
                 "infoEmpty": "Registros no disponibles",
                 "infoFiltered": "(Filtrado de _MAX_ total registros)",
                 "search":         "Buscar:",
                 "paginate": {
                       "first":      "Primero",
                       "last":       "Ultimo",
                       "next":       "Siguiente",
                       "previous":   "Anterior"
                 },
             },
             "ordering": false,
             dom: 'Blfrtip',
                buttons: [
                  {  
                     extend: 'copy'
                  },
                  {
                     extend: 'pdf',
                     exportOptions: {
                       columns: [0,1,2,3,6,7,8,9,10] // Column index which needs to export
                     }
                  },
                  {
                     extend: 'csv',
                  },
                  {
                     extend: 'excel',
                  } 
                ]
            } );


    $("#createCliente").on('click', function(e){
        e.preventDefault();
        $('#clienteForm').trigger("reset");
        $("#btn-accion").html("Agregar Cliente");   
        $("#clienteModalLabel").html("Agregar Informacion");
        $("#method").val("create");
        $("#btn-accion").attr("onclick","nuevoCliente()");        
        $('#clienteModal').modal({
            show:true,
            backdrop:'static'
        });

    });        

    

    } );
    </script>


<?php  include('layouts/footer.php');  ?>  