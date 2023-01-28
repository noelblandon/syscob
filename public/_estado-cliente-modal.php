<div class="modal fade" id="modalEstadoCliente" tabindex="-1" role="dialog" aria-labelledby="labelEstadoCliente">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="labelEstadoCliente" align="center"><strong>Acciones para el cliente</strong> </h4>
                                  </div>
                                  <div class="modal-body">
                                                 <form class="form-horizontal" role="form" id="estadoClienteForm">


                                                         <input type="hidden" id="methode" name="method"  >
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="cedula">N° de Cédula:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="###-######-####A" id="cedulae" name="cedula"  disabled="disabled">
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Nombre"  id="nombree" name="nombre" disabled="disabled">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Apellido:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Apellido"  id="apellidoe" name="apellido" disabled="disabled">
                                                        </div>
                                                        </div>

                                                          <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Megas a contratar:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="10 MB"   id="internete" name="internet" disabled="disabled">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Pago ($):</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="$30" id="pagoe" name="pago"  disabled="disabled">
                                                        </div>
                                                        </div>


                                                 </form>

                                  </div>
                                  <div class="modal-footer">';

                            
                                   	<button type="button" class="btn btn-warning" id="est-accion-btn" onclick="actualizarEstado()" >Dar de baja</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" >Salir</button>
                                  </div>
                                </div>
                              </div>
                            </div>
