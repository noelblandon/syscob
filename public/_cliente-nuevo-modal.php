<!-- Modal -->
<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="clienteModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="clienteModalLabel" align="center"><strong>Nuevo Cliente</strong> </h4>
            </div>
            <div class="modal-body">
                            <form class="form-horizontal" role="form" id="clienteForm">
                                <input type="hidden" id="method" name="method" value="create"> 
                                <div class="form-group">
                                <label class="control-label col-sm-4 " for="cedula">N° de Cédula:</label>
                                <div class="col-sm-8">
                                    <input class="form-control cedula" type="text" placeholder="000-000000-0000A" id="cedula" name="cedula" maxlength="16">
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Nombre" id="nombre" name="nombre">
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-sm-4" for="apellido">Apellido:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Apellido" id="apellido" name="apellido">
                                </div>
                                </div>

                                    <div class="form-group">
                                <label class="control-label col-sm-4" for="direccion">Dirección:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Direccion" id="direccion" name="direccion">
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-sm-4" for="comunidad">Barrio:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Barrio" id="barrio" name="barrio">
                                </div>

                                </div>
                                <div class="form-group">
                                <label class="control-label col-sm-4" for="comunidad">Comunidad:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Comunidad" id="comunidad" name="comunidad">
                                </div>

                                </div>

                                <div class="form-group">
                                <label class="control-label col-sm-4" for="celular">N° de celular:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="85555555" id="celular" name="celular" maxlength="8" >
                                </div>
                                </div>
                                    <div class="form-group">
                                <label class="control-label col-sm-4" for="correo">Megas a contratar:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="1Mb" id="internet" name="internet" maxlength="3" >
                                </div>
                                </div>
                                    <div class="form-group">
                                <label class="control-label col-sm-4" for="correo">Pago:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Pago por internet contratado" id="pago" name="pago" maxlength="4" >
                                </div>
                                </div>

                            </form>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-accion" onclick="agregarCliente();">Guardar Cliente</button>
            </div>
        </div>
        </div>
</div>