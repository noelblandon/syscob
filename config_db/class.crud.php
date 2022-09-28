<?php
date_default_timezone_set("America/Managua");
class crud{
	private $db;
    private $idproveedores;

	function __construct($DB_con){
		$this->db = $DB_con;
	}


	public function conex(){
		return $this->db;
	}

	public function login($name,$pass){
		try{
			$stmt = $this->db->prepare("SELECT id_user, nombre_user, contrasena_user,id_rol, id_casa, rol FROM usuarios_rol LEFT JOIN rol  ON id_rol = id WHERE nombre_user=:name AND contrasena_user=:pass ");
			$stmt->bindparam(":name",$name);
			$stmt->bindparam(":pass",$pass);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {

			   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

				  session_start();
			      $_SESSION['rol_user']   = $row['id_rol'] ;
			      $_SESSION['casa_user']  = $row['id_casa'] ;
			      $_SESSION['id_usuario'] = $row['id_user'] ;
			      $_SESSION['name_usuario'] = $row['rol'] ;
			      echo 'Usuario logeado exitosamente ..... <script>window.location = "public/index.php"';
			   }
			}else{
				echo "1";
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}

	}


	/*ingresar cliente*/

			public function nuevo_cliente ($cedula,$nombre,$apellido,$direccion,$barrio,$comunidad,$celular,$pago,$internet)
			{

				try {
						session_start();

						$date   = date('U');
									$fecha3  = strtotime ( '-0 days' , ( $date ));
									$fecha4  = $fecha3;
						$estado  = '1';
						$estado1 = '0';
						$casa    = $_SESSION['casa_user'] ;
						$fecha   = date('d-m-Y');
						$fecha1  = strtotime ( '+1 month' , strtotime ( $fecha ));
						$fecha2  = date('U', strtotime($fecha1));

						$stmt = $this->db->prepare("INSERT INTO clientes (`n_cedula`, `nombres`, `apellidos`, `direccion`, `barrio`, `comunidad`,  `celular`,`fecha_contrato`, `pago`, `internet_contratado`, `id_casa_matriz`,  `estado`) VALUES (:cedula, :nombre, :apellido, :direccion, :barrio, :comunidad, :celular,  :fecha, :pago, :internet,:casa, :estado);");
						$stmt->bindparam(":cedula",$cedula);
						$stmt->bindparam(":nombre",$nombre);
						$stmt->bindparam(":apellido",$apellido);
						$stmt->bindparam(":direccion",$direccion);
						$stmt->bindparam(":barrio",$barrio);
						$stmt->bindparam(":comunidad",$comunidad);
						$stmt->bindparam(":celular",$celular);
						$stmt->bindparam(":fecha",$fecha4);
						$stmt->bindparam(":pago",$pago);
						$stmt->bindparam(":internet",$internet);
						$stmt->bindparam(":casa",$casa);
						$stmt->bindparam(":estado",$estado);
						$stmt->execute();

						$stmt1 = $this->db->prepare("INSERT INTO detalles_pago (`id_cliente`, `fecha_pago`, `internet`, `pago`,`estado`) VALUES (:nif,:fecha_pago,:internet, :pago, :estado );");
						$stmt1->bindparam(":nif",$cedula);
						$stmt1->bindparam(":fecha_pago",$fecha1);
						$stmt1->bindparam(":internet",$internet);
						$stmt1->bindparam(":pago",$pago);
						$stmt1->bindparam(":estado",$estado1);
						$stmt1->execute();



						echo "1";

				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin ingresar cliente*/



	/*actualizar cliente*/

			public function actualizar_cliente ($cedula,$nombre,$apellido,$direccion,$barrio,$comunidad,$celular,$pago,$internet)
			{

				try {

					$stmt1 = $this->db->prepare("SELECT  pago  FROM clientes  WHERE  n_cedula = :cedula ;");
					$stmt1->bindparam(":cedula",$cedula);
						$stmt1->execute();

						while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
						{
								$pago2 = $row1['pago'];

								if ($pago2 == $pago)
								{
										$stmt = $this->db->prepare("UPDATE clientes SET nombres = :nombre,  apellidos = :apellido, direccion = :direccion, barrio = :barrio, comunidad = :comunidad,  celular = :celular, internet_contratado = :internet, pago = :pago WHERE  n_cedula = :cedula ;");

										$stmt->bindparam(":nombre",$nombre);
										$stmt->bindparam(":apellido",$apellido);
										$stmt->bindparam(":direccion",$direccion);
										$stmt->bindparam(":barrio",$barrio);
										$stmt->bindparam(":comunidad",$comunidad);
										$stmt->bindparam(":celular",$celular);
										$stmt->bindparam(":internet",$internet);
										$stmt->bindparam(":pago",$pago);
										$stmt->bindparam(":cedula",$cedula);
										$stmt->execute();

								}
								else
								{

									$fecha   = date('U');
									$fecha1  = strtotime ( '-0 days' , ( $fecha ));
									$fecha2  = $fecha1;

									$stmt = $this->db->prepare("UPDATE clientes SET nombres = :nombre,  apellidos = :apellido, direccion = :direccion, barrio = :barrio, comunidad = :comunidad,  celular = :celular, internet_contratado = :internet, pago = :pago,fecha_contrato = :fecha WHERE  n_cedula = :cedula ;");

										$stmt->bindparam(":nombre",$nombre);
										$stmt->bindparam(":apellido",$apellido);
										$stmt->bindparam(":direccion",$direccion);
										$stmt->bindparam(":barrio",$barrio);
										$stmt->bindparam(":comunidad",$comunidad);
										$stmt->bindparam(":celular",$celular);
										$stmt->bindparam(":internet",$internet);
										$stmt->bindparam(":pago",$pago);
										$stmt->bindparam(":cedula",$cedula);
										$stmt->bindparam(":fecha",$fecha2);
										$stmt->execute();



										$stmt2 = $this->db->prepare("UPDATE detalles_pago SET internet= :internet,pago=:pago WHERE  estado='0' AND  id_cliente = :nif;");
										$stmt2->bindparam(":internet",$internet);
										$stmt2->bindparam(":pago",$pago);
										$stmt2->bindparam(":nif",$cedula);
										$stmt2->execute();



								}






								echo "1";



						}







				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin actualizar cliente*/



/*eliminan cliente*/

			public function eliminar_cliente ($cedula)
			{

				try {
							$this->db->beginTransaction();


					$stmt1 = $this->db->prepare("SELECT id_pc FROM detalles_pago WHERE id_cliente=:cedula AND estado = '0' ");
					$stmt1->bindparam(":cedula",$cedula);
						$stmt1->execute();

						while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
						{

										$id = $row1['id_pc'];
									    $stmt = $this->db->prepare("DELETE FROM clientes WHERE n_cedula = :cedula ;");
										$stmt->bindparam(":cedula",$cedula);
										$stmt->execute();

										$stmt2 = $this->db->prepare("DELETE FROM detalles_pago WHERE  id_pc = :nif;");
										$stmt2->bindparam(":nif",$id);
										$stmt2->execute();
										$this->db->commit();
								echo "1";

						}


				} catch (PDOException $e) {
					$this->db->rollBack();
					echo $e->getMessage();

				}
			}
	/* fin eliminan cliente*/

	/*activar cliente*/

			public function activar_cliente ($cedula,$internet,$pago)
			{

				try {
							$this->db->beginTransaction();


										$date   = date('U');
										$fecha3  = strtotime ( '-0 days' , ( $date ));
										$fecha4  = $fecha3;
										$estado  = '1';
										$estado1 = '0';

										$fecha   = date('d-m-Y');
										$fecha1  = strtotime ( '+1 month' , strtotime ( $fecha ));
										$fecha2  = date('U', strtotime($fecha1));


									    $stmt = $this->db->prepare("UPDATE clientes SET fecha_contrato = :fecha , estado = :estado, pago = :pago, internet_contratado = :internet WHERE n_cedula = :cedula ;");
										$stmt->bindparam(":fecha",$fecha4);
										$stmt->bindparam(":estado",$estado);
										$stmt->bindparam(":pago",$pago);
										$stmt->bindparam(":internet",$internet);
										$stmt->bindparam(":cedula",$cedula);
										$stmt->execute();

										$stmt1 = $this->db->prepare("INSERT INTO detalles_pago (`id_cliente`, `fecha_pago`, `internet`, `pago`,`estado`) VALUES (:nif,:fecha_pago,:internet, :pago, :estado );");
										$stmt1->bindparam(":nif",$cedula);
										$stmt1->bindparam(":fecha_pago",$fecha1);
										$stmt1->bindparam(":internet",$internet);
										$stmt1->bindparam(":pago",$pago);
										$stmt1->bindparam(":estado",$estado1);
										$stmt1->execute();
										$this->db->commit();
								echo "1";




				} catch (PDOException $e) {
					$this->db->rollBack();
					echo $e->getMessage();

				}
			}
	/* fin activar cliente*/

		/*desactivar cliente*/

			public function desactivar_cliente ($cedula)
			{

				try {
							$this->db->beginTransaction();


					$stmt1 = $this->db->prepare("SELECT id_pc FROM detalles_pago WHERE id_cliente=:cedula AND estado = '0' ");
					$stmt1->bindparam(":cedula",$cedula);
						$stmt1->execute();

						while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
						{

										$id = $row1['id_pc'];
									    $stmt = $this->db->prepare("UPDATE clientes SET estado = '0'  WHERE n_cedula = :cedula ;");
										$stmt->bindparam(":cedula",$cedula);
										$stmt->execute();

										$stmt2 = $this->db->prepare("DELETE FROM detalles_pago WHERE  id_pc = :nif;");
										$stmt2->bindparam(":nif",$id);
										$stmt2->execute();
										$this->db->commit();
								echo "1";

						}


				} catch (PDOException $e) {
					$this->db->rollBack();
					echo $e->getMessage();

				}
			}
	/* fin desactivar cliente*/

	/*  listar cliente*/
		public function listar_cliente ()
	{
		try
		{
			session_start();
			$casa = $_SESSION['casa_user'] ;
			$stmt = $this->db->prepare("SELECT n_cedula, nombres, apellidos, direccion, barrio, comunidad,  celular, pago, internet_contratado,fecha_contrato, estado FROM clientes WHERE id_casa_matriz= :casa ;");
			$stmt->bindparam(":casa",$casa);
			$stmt->execute();


			echo '<div class="span3">
                            <div class="table-responsive"><!-- table -->
                            <table class="table table-striped table-hover ">
                              <thead>
                              <tr>
                                  <th>Cedula</th>
                                  <th>Nombre</th>
                                  <th>Apellido</th>
                                  <th>Direccion</th>
                                  <th>Barrio</th>
                                  <th>Comunidad</th>
                                  <th>Celular</th>
                                  <th> Mb </th>
                                  <th>Pago</th>
                                  <th>Fecha de Contrato</th>
                                  <th>Estado</th>
                                  <th colspan="2" align="center">Acciones</th>
                                  </tr>
                              </thead>  <tbody>';
			$contador = 0;
			if ($stmt->rowCount() > 0) {
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$contador = $contador + 1;
					$estado = $row['estado'];
					$fecha  = $row['fecha_contrato'];
					$fecha1 = 0;
					if ($estado == 1)
					{
						$estado = 'Activo';
						$fecha1 = date('d-m-Y',($fecha));
					}
					else
					{
						$estado = 'Inactivo';
						$fecha1 = date('d-M-Y',($fecha));
					}


				echo '<tr>';
	            echo '<td>'.$row['n_cedula'].'</td>';
	            echo '<td>'.$row['nombres'].'</td>';
	            echo '<td>'.$row['apellidos'].'</td>';
	            echo '<td>'.$row['direccion'].'</td>';
	            echo '<td>'.$row['barrio'].'</td>';
	            echo '<td>'.$row['comunidad'].'</td>';
	            echo '<td>'.$row['celular'].'</td>';
	            echo '<td align="center">'.$row['internet_contratado'].'</td>';
	            echo '<td align="center">'.$row['pago'].'</td>';
	            echo '<td align="center"> '.$fecha1.'</td>';
	            echo '<td>'.$estado.'</td>';
	            echo'<td>     <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_upd'.$contador.'" id="upd_cliente_modal" onclick="valid('.$contador.');"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
                    <!-- inicio del modal-->
                        <!-- Modal -->
                            <div class="modal fade" id="modal_upd'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label_upd'.$contador.'">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="label_upd'.$contador.'" align="center"><strong>actualizar Cliente</strong> </h4>
                                  </div>
                                  <div class="modal-body">
                                                 <form class="form-horizontal" role="form">



                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="cedula">N° de Cédula:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="###-######-####A" id="cedula'.$contador.'" value="'.$row['n_cedula'].'" disabled="disabled">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Nombre" id="nombre'.$contador.'" value="'.$row['nombres'].'">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Apellido:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Apellido" id="apellido'.$contador.'" value="'.$row['apellidos'].'">
                                                        </div>
                                                        </div>

                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="direccion">Dirección:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Direccion" id="direccion'.$contador.'" value="'.$row['direccion'].'">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="comunidad">Barrio:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Barrio" id="barrio'.$contador.'" value="'.$row['barrio'].'">
                                                        </div>

                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="comunidad">Comunidad:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Comunidad" id="comunidad'.$contador.'" value="'.$row['comunidad'].'" >
                                                        </div>

                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="celular">N° de celular:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="8555-5555" id="celular'.$contador.'" value="'.$row['celular'].'">
                                                        </div>
                                                        </div>
                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="correo">Megas a contratar::</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="0000" id="internet'.$contador.'" value="'.$row['internet_contratado'].'" maxlength="2">
                                                        </div>
                                                        </div>
                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="correo">Pago:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="00000" id="pago'.$contador.'" value="'.$row['pago'].'" maxlength="4">
                                                        </div>
                                                        </div>

                                                 </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setTimeout(function () {listar_cliente();},500);">Cerrar</button>
                                    <button type="button" class="btn btn-primary" onclick="upd_cliente ('.$contador.');">Actualizar Cliente</button>
                                  </div>
                                </div>
                              </div>
                            </div>



                      <!-- fin del modal-->
                        <a class="btn btn-info btn-xs" href="../app/controller/contrato.php?id='.$row['n_cedula'].'" target="_blank" id="contrato_cliente" onclick="valid('.$contador.');">Contrato</a></td>';

	           			echo'<td>     <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal'.$contador.'" id="upd_cliente_modal" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                    <!-- inicio del modal-->
                        <!-- Modal -->
                            <div class="modal fade" id="modal'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label'.$contador.'">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="label'.$contador.'" align="center"><strong>Acciones para el cliente</strong> </h4>
                                  </div>
                                  <div class="modal-body">
                                                 <form class="form-horizontal" role="form">



                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="cedula">N° de Cédula:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="###-######-####A" id="cedula_extra'.$contador.'" value="'.$row['n_cedula'].'" disabled="disabled">
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Nombre"  value="'.$row['nombres'].'" disabled="disabled">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Apellido:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Apellido"  value="'.$row['apellidos'].'" disabled="disabled">
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Megas a contratar:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="10 MB" id="act_mb'.$contador.'" value="'.$row['internet_contratado'].'"  maxlength="2">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Pago ($):</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="$30" id="act_pago'.$contador.'" value="'.$row['pago'].'" maxlength="4">
                                                        </div>
                                                        </div>


                                                 </form>

                                  </div>
                                  <div class="modal-footer">';

                                   if ($estado == 'Activo') {
                                   	echo'<button type="button" class="btn btn-warning" onclick="baja_cliente('.$contador.');">Dar de baja</button> ';
                                   }
                                   else
                                   {
                                   	echo '<button type="button" class="btn btn-success" onclick="alta_cliente('.$contador.');">Dar de alta</button> ';
                                   }


                                    echo'<button type="button" class="btn btn-danger"  onclick="del_cliente('.$contador.');">Eliminar Cliente</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setTimeout(function(){listar_cliente();},500); ">Salir</button>
                                  </div>
                                </div>
                              </div>
                            </div>



                      <!-- fin del modal-->
                       </td>';


	             echo '</tr>';


			}
			}
			else
			{
		    echo '<tr>';
            echo '<td colspan=11><center>No Existe Informacion</center></td>';
            echo '</tr>';
			}
			echo "</tbody>
			      </table>
                  </div><!-- table -->";


		}
		catch(PDOException $e)
		{
			echo $e->getMessage();

		}

	}

/* fin listar cliente*/


/*  listar cliente like*/
		public function listar_cliente_like ($data)
	{
		try
		{
			session_start();
			$casa = $_SESSION['casa_user'] ;
			$stmt = $this->db->prepare("SELECT n_cedula, nombres, apellidos, direccion, barrio, comunidad,  celular, pago, internet_contratado,fecha_contrato, estado FROM clientes WHERE id_casa_matriz= :casa  AND  nombres LIKE '%$data%' OR apellidos LIKE '%$data%' OR barrio LIKE '%$data%' OR comunidad LIKE '%$data%' ORDER BY nombres ASC ;");
			$stmt->bindparam(":casa",$casa);
			$stmt->execute();


			echo '<div class="span3">
                            <div class="table-responsive"><!-- table -->
                            <table class="table table-striped table-hover ">
                              <thead>
                              <tr>
                                  <th>Cedula</th>
                                  <th>Nombre</th>
                                  <th>Apellido</th>
                                  <th>Direccion</th>
                                  <th>Barrio</th>
                                  <th>Comunidad</th>
                                  <th>Celular</th>
                                  <th> Mb </th>
                                  <th>Pago</th>
                                  <th>Fecha de Contrato</th>
                                  <th>Estado</th>
                                  <th colspan="2" align="center">Acciones</th>
                                  </tr>
                              </thead>  <tbody>';
			$contador = 0;
			if ($stmt->rowCount() > 0) {
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$contador = $contador + 1;
					$estado = $row['estado'];
					$fecha  = $row['fecha_contrato'];
					$fecha1 = 0;
					if ($estado == 1)
					{
						$estado = 'Activo';
						$fecha1 = date('d-m-Y',($fecha));
					}
					else
					{
						$estado = 'Inactivo';
						$fecha1 = date('d-M-Y',($fecha));
					}


				echo '<tr>';
	            echo '<td>'.$row['n_cedula'].'</td>';
	            echo '<td>'.$row['nombres'].'</td>';
	            echo '<td>'.$row['apellidos'].'</td>';
	            echo '<td>'.$row['direccion'].'</td>';
	            echo '<td>'.$row['barrio'].'</td>';
	            echo '<td>'.$row['comunidad'].'</td>';
	            echo '<td>'.$row['celular'].'</td>';
	            echo '<td align="center">'.$row['internet_contratado'].'</td>';
	            echo '<td align="center">'.$row['pago'].'</td>';
	            echo '<td align="center">'.$fecha1.'</td>';
	            echo '<td>'.$estado.'</td>';
	            echo'<td>     <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_upd'.$contador.'" id="upd_cliente_modal" onclick="valid('.$contador.');"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
                    <!-- inicio del modal-->
                        <!-- Modal -->
                            <div class="modal fade" id="modal_upd'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label_upd'.$contador.'">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="label_upd'.$contador.'" align="center"><strong>actualizar Cliente</strong> </h4>
                                  </div>
                                  <div class="modal-body">
                                                 <form class="form-horizontal" role="form">



                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="cedula">N° de Cédula:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="###-######-####A" id="cedula'.$contador.'" value="'.$row['n_cedula'].'" disabled="disabled">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Nombre" id="nombre'.$contador.'" value="'.$row['nombres'].'">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Apellido:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Apellido" id="apellido'.$contador.'" value="'.$row['apellidos'].'">
                                                        </div>
                                                        </div>

                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="direccion">Dirección:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Direccion" id="direccion'.$contador.'" value="'.$row['direccion'].'">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="comunidad">Barrio:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Barrio" id="barrio'.$contador.'" value="'.$row['barrio'].'">
                                                        </div>

                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="comunidad">Comunidad:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Comunidad" id="comunidad'.$contador.'" value="'.$row['comunidad'].'">
                                                        </div>

                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="celular">N° de celular:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="8555-5555" id="celular'.$contador.'" value="'.$row['celular'].'">
                                                        </div>
                                                        </div>
                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="correo">MB:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="00000" id="internet'.$contador.'" value="'.$row['internet_contratado'].'" maxlength="2">
                                                        </div>
                                                        </div>
                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="telefono">Pago:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="00000" id="pago'.$contador.'" value="'.$row['pago'].'" maxlength="4">
                                                        </div>
                                                        </div>

                                                 </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setTimeout(function () {listar_cliente();},500);">Cerrar</button>
                                    <button type="button" class="btn btn-primary" onclick="upd_cliente ('.$contador.');">Actualizar Cliente</button>
                                  </div>
                                </div>
                              </div>
                            </div>

   						  <!-- fin del modal-->
                        <a class="btn btn-info btn-xs" href="../app/controller/contrato.php?id='.$row['n_cedula'].'" target="_blank" id="contrato_cliente" onclick="valid('.$contador.');">Contrato</a></td>';
	           	echo'<td>     <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal'.$contador.'" id="upd_cliente_modal" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                    <!-- inicio del modal-->
                        <!-- Modal -->
                            <div class="modal fade" id="modal'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label'.$contador.'">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="label'.$contador.'" align="center"><strong>Acciones para el cliente</strong> </h4>
                                  </div>
                                  <div class="modal-body">
                                                 <form class="form-horizontal" role="form">



                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="cedula">N° de Cédula:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="###-######-####A" id="cedula_extra'.$contador.'" value="'.$row['n_cedula'].'" disabled="disabled">
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Nombre"  value="'.$row['nombres'].'" disabled="disabled">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Apellido:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Apellido"  value="'.$row['apellidos'].'" disabled="disabled">
                                                        </div>
                                                        </div>

                                                          <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Megas a contratar:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="10 MB" id="act_mb'.$contador.'" value="'.$row['internet_contratado'].'"  maxlength="2">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Pago ($):</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="$30" id="act_pago'.$contador.'" value="'.$row['pago'].'" maxlength="4">
                                                        </div>
                                                        </div>


                                                 </form>

                                  </div>
                                  <div class="modal-footer">';

                                   if ($estado == 'Activo') {
                                   	echo'<button type="button" class="btn btn-warning" onclick="baja_cliente('.$contador.');">Dar de baja</button> ';
                                   }
                                   else
                                   {
                                   	echo '<button type="button" class="btn btn-success" onclick="alta_cliente('.$contador.');">Dar de alta</button> ';
                                   }


                                    echo'<button type="button" class="btn btn-danger"  onclick="del_cliente('.$contador.');">Eliminar Cliente</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setTimeout(function(){listar_cliente();},500); ">Salir</button>
                                  </div>
                                </div>
                              </div>
                            </div>



                      <!-- fin del modal-->
                       </td>';
	             echo '</tr>';

			}
			}
			else
			{
		    echo '<tr>';
            echo '<td colspan=11><center>No Existe Informacion</center></td>';
            echo '</tr>';
			}
			echo "</tbody>
			      </table>
                  </div><!-- table -->";


		}
		catch(PDOException $e)
		{
			echo $e->getMessage();

		}

	}

/* fin listar cliente like*/


/*ingresar user*/

			public function nuevo_user ($name,$pass,$rol)
			{

				try {
						session_start();
						$ksa = $_SESSION['casa_user'];

						$stmt = $this->db->prepare("INSERT INTO usuarios_rol(nombre_user, contrasena_user, id_rol, id_casa) VALUES (:name,:pass,:rol,:ksa);");
						$stmt->bindparam(":name",$name);
						$stmt->bindparam(":pass",$pass);
						$stmt->bindparam(":rol",$rol);
						$stmt->bindparam(":ksa",$ksa);
						$stmt->execute();
						echo "1";

				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin ingresar user*/


	/*actualizar actualizar_nombre*/

			public function actualizar_nombre ($nombre)
			{

				try {

					session_start();

			     $cedula =  $_SESSION['id_usuario']  ;

				$stmt2 = $this->db->prepare("UPDATE usuarios_rol SET nombre_user=:nombre WHERE   id_user = :nif ;");
				$stmt2->bindparam(":nombre",$nombre);
				$stmt2->bindparam(":nif",$cedula);
				$stmt2->execute();
				echo "1";





				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin actualizar actualizar_nombre*/
	/*actualizar user*/

			public function upd_user ($id,$name,$rol)
			{

				try {


				$stmt2 = $this->db->prepare("UPDATE usuarios_rol SET  nombre_user=:nombre, id_rol=:rol WHERE   id_user = :nif ;");
				$stmt2->bindparam(":nombre",$name);
				$stmt2->bindparam(":rol",$rol);
				$stmt2->bindparam(":nif",$id);
				$stmt2->execute();
				echo "1";





				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin actualizar user*/

	/*actualizar actualizar_pass*/

			public function upd_pass ($id,$pass)
			{

				try {


				$stmt2 = $this->db->prepare("UPDATE usuarios_rol SET contrasena_user=:nombre WHERE   id_user = :nif ;");
				$stmt2->bindparam(":nombre",$pass);
				$stmt2->bindparam(":nif",$id);
				$stmt2->execute();
				echo "1";





				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin actualizar actualizar_pass*/
	/*actualizar actualizar_pass*/

			public function actualizar_pass ($nombre)
			{

				try {

					session_start();

			     $cedula =  $_SESSION['id_usuario']  ;

				$stmt2 = $this->db->prepare("UPDATE usuarios_rol SET contrasena_user=:nombre WHERE   id_user = :nif ;");
				$stmt2->bindparam(":nombre",$nombre);
				$stmt2->bindparam(":nif",$cedula);
				$stmt2->execute();
				echo "1";





				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin actualizar actualizar_pass*/

	/*actualizar actualizar_pass*/

			public function eliminar_user ($cedula)
			{

				try {


				$stmt2 = $this->db->prepare("DELETE FROM usuarios_rol WHERE   id_user = :nif ;");
				$stmt2->bindparam(":nif",$cedula);
				$stmt2->execute();
				echo "1";

				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin actualizar actualizar_pass*/


/*  listar user*/
		public function list_user ()
	{
		try
		{
			session_start();
			$casa = $_SESSION['casa_user'] ;
			$stmt = $this->db->prepare("SELECT `id_user`, `nombre_user`, `contrasena_user`, `id_rol`, `id_casa` FROM `usuarios_rol` WHERE id_casa = :casa ;");
			$stmt->bindparam(":casa",$casa);
			$stmt->execute();


			echo '<div class="span3">
                            <div class="table-responsive"><!-- table -->
                            <table class="table table-striped table-hover ">
                              <thead>
                              <tr>
                                  <th>Nombre de Usuario</th>
                                  <th>Contraseña</th>
                                  <th>Rol</th>
                                  <th colspan="2" align="center">Acciones</th>
                                  </tr>
                              </thead>  <tbody>';
			$contador = 0;
			if ($stmt->rowCount() > 0) {
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$contador = $contador + 1;
					$estado = $row['id_rol'];

					if ($estado == 1)
					{
						$estado = 'Administrador';
					}
					else
					{
						$estado = 'Usuario';
					}


				echo '<tr>';
	            echo '<td>'.$row['nombre_user'].'</td>';
	            echo '<td>'.$row['contrasena_user'].'</td>';
	            echo '<td>'.$estado.'</td>';

	           			echo'<td>     <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal'.$contador.'" id="upd_cliente_modal" ><i class="glyphicon glyphicon-refresh" aria-hidden="true"></i></a>
	           			<button type="button" class="btn btn-danger btn-xs" onclick="del_user ('.$contador.')"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>
                    <!-- inicio del modal-->
                        <!-- Modal -->
                            <div class="modal fade" id="modal'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label'.$contador.'">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="label'.$contador.'" align="center"><strong>Actualiza Datos</strong> </h4>
                                  </div>
                                  <div class="modal-body">
                                                 <form class="form-horizontal" role="form">



                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="cedula">ID:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text"  id="id_user'.$contador.'" value="'.$row['id_user'].'" disabled="disabled">
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Nombre de Usuario:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text"   value="'.$row['nombre_user'].'" id="name_user'.$contador.'">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Contraseña :</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" id="pass_user'.$contador.'" >
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Rol:</label>
                                                        <div class="col-sm-8">
                                                           <select class="form-control" id="rol_user'.$contador.'" >
                                                           <option value="'.$row['id_rol'].'">'.$estado.'</option>
                                                            <option value="1">Administrador</option>
                                                             <option value="2">Usuario</option>
                                                           </select>
                                                        </div>
                                                        </div>


                                                 </form>

                                  </div>
                                  <div class="modal-footer">';


                                    echo'
                                    <button type="button" class="btn btn-success" onclick="upd_user('.$contador.');" >Actualizar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setTimeout(function(){listar_user();},500); ">Salir</button>
                                  </div>
                                </div>
                              </div>
                            </div>



                      <!-- fin del modal-->
                       </td>';


	             echo '</tr>';


			}
			}
			else
			{
		    echo '<tr>';
            echo '<td colspan=11><center>No Existe Informacion</center></td>';
            echo '</tr>';
			}
			echo "</tbody>
			      </table>
                  </div><!-- table -->";


		}
		catch(PDOException $e)
		{
			echo $e->getMessage();

		}

	}

/* fin listar usr*/




/* fin contrato cliente*/

			public function contrato ($id)
			{

				try {



						$stmt = $this->db->prepare("SELECT `n_cedula`, `nombres`, `apellidos`, `direccion`, `barrio`, `comunidad`, `celular`, `fecha_contrato`, `pago`, `internet_contratado` FROM `clientes` WHERE n_cedula=:id ;");
						$stmt->bindparam(":id",$id);
						$stmt->execute();

						while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
								session_start();
								$cedula      = $row ['n_cedula'];
								$nombre      = $row ['nombres'].' '.$row ['apellidos'];
								$direccion   = $row ['direccion'];
								$barrio      = $row ['barrio'];
								$comunidad   = $row ['comunidad'];
								$celular     = $row ['celular'];
								$fecha       = $row ['fecha_contrato'];
								$pago        = $row ['pago'];
								$mb          = $row ['internet_contratado'];
								$fecha1      = date('d-m-Y',($fecha));


								$_SESSION['cliente']['cedula']    = $cedula;
								$_SESSION['cliente']['nombre']    = $nombre;
								$_SESSION['cliente']['direccion'] = $direccion;
								$_SESSION['cliente']['barrio']    = $barrio;
								$_SESSION['cliente']['comunidad'] = $comunidad;
								$_SESSION['cliente']['celular']   = $celular;
								$_SESSION['cliente']['fecha']     = $fecha1;
								$_SESSION['cliente']['pago']      = $pago;
								$_SESSION['cliente']['mb']        = $mb;



							}



				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin contrato cliente*/

	/*ingresar pago*/

			public function nuevo_pago ($cedula,$internet,$pago,$n_pago)
			{

				try {
						session_start();
						$cedula   = $cedula;
						$internet = $internet;
						$pago     = $pago;
						$n_pago   = $n_pago;
						$estado_p = 1 ;
						$estado_np = 0;
						$_SESSION['n_pagos'] = $n_pago;

						for ($i=0; $i < $n_pago ; $i++)
						{


					$stmt = $this->db->prepare("SELECT MAX(id_pc) as id,fecha_pago as fecha FROM detalles_pago WHERE id_cliente='".$cedula."' AND estado='0' ;");
					$stmt->execute();
			        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{

								$id    = $row['id'];
								$fecha = $row['fecha'];
								$stmt1 = $this->db->prepare("UPDATE detalles_pago SET estado='".$estado_p."' WHERE id_pc=:id;");
								$stmt1->bindparam(":id",$id);
								$stmt1->execute();


								$fecha = date('d-m-Y',($fecha ));

								$fecha1 = strtotime ( '+1 month' , strtotime ( $fecha ));
								$stmt2 = $this->db->prepare("INSERT INTO detalles_pago (id_cliente, fecha_pago, internet, pago, estado) VALUES (:nif,:fecha_pago,:internet,:pago,:estado );");

								$stmt2->bindparam(":nif",$cedula);
								$stmt2->bindparam(":fecha_pago",$fecha1);
								$stmt2->bindparam(":internet",$internet);
								$stmt2->bindparam(":pago",$pago);
								$stmt2->bindparam(":estado",$estado_np);
								$stmt2->execute();
						}//fin del while
					}//fin del for





						echo "1";

				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin ingresar pago*/


	/*factura pago*/

			public function factura_pago ($n_pago,$cedula)
			{

				try {

						$n_pago = $n_pago;
						$cedula = $cedula;


						$stmt = $this->db->prepare("SELECT id_pc,id_cliente, fecha_pago,internet,detalles_pago.pago as pago,n_cedula, nombres, apellidos,direccion, barrio, comunidad FROM detalles_pago LEFT JOIN clientes ON n_cedula = id_cliente  WHERE id_cliente=:id AND detalles_pago.estado='1' ORDER BY id_pc DESC LIMIT ".$n_pago);
						$stmt->bindparam(":id",$cedula);
						$stmt->execute();
						$i = $_SESSION['n_pagos'];
						while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
								$cedula = $row ['id_cliente'];
								$fecha1 = $row ['fecha_pago'];
								$pago   = $row ['pago'];
								$mb     = $row ['internet'];
								$fecha2 = date('m',($fecha1));
								$fecha2 = $fecha2 - 1 ;


								switch($fecha2){
									case 0: $fecha2  = "Diciembre"; $fecha3 = date('Y',($fecha1)); $fecha3 = $fecha3 - 1; ;break;
									case 1: $fecha2  = "Enero"; $fecha3 = date('Y',($fecha1));;break;
									case 2: $fecha2  = "Febrero"; $fecha3 = date('Y',($fecha1));;break;
								    case 3: $fecha2  = "Marzo"; $fecha3 = date('Y',($fecha1));;break;
									case 4: $fecha2  = "Abril"; $fecha3 = date('Y',($fecha1));;break;
									case 5: $fecha2  = "Mayo"; $fecha3 = date('Y',($fecha1));;break;
								  	case 6: $fecha2  = "Junio"; $fecha3 = date('Y',($fecha1));;break;
								  	case 7: $fecha2  = "Julio"; $fecha3 = date('Y',($fecha1));;break;
									case 8: $fecha2  = "Agosto";$fecha3 = date('Y',($fecha1)); ;break;
								    case 9: $fecha2  = "Septiembre"; $fecha3 = date('Y',($fecha1)); ;break;
									case 10: $fecha2 = "Octubre"; $fecha3 = date('Y',($fecha1));;break;
									case 11: $fecha2 = "Noviembre"; $fecha3 = date('Y',($fecha1)); ;break;
								  	case 12: $fecha2 = "Diciembre"; $fecha3 = date('Y',($fecha1)); $fecha3 = $fecha3 - 1; ;break;

										}

								$fecha  = $fecha2.' del año '.$fecha3;


								 	$nombre    = $row['nombres'].' '.$row['apellidos'];
								 	$direccion = $row['direccion'];
								 	$ubicacion = $row['barrio'].' '.$row['comunidad'];
								    $_SESSION['fecha'][$i]     = $fecha;
								 	$_SESSION['nombre'][$i]    = $nombre;
								 	$_SESSION['direccion'][$i] = $direccion;
								 	$_SESSION['ubicacion'][$i] = $ubicacion;
								 	$_SESSION['mb'][$i]        = $mb;
								 	$_SESSION['pago'][$i]      = $pago;


								 		$i = $i - 1 ;
							}//fin del primer while



				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin factura pago*/

	/*factura pago*/

			public function factura_pago2 ($n_pago,$cedula)
			{

				try {

						$n_pago = $n_pago;
						$cedula = $cedula;


						$stmt = $this->db->prepare("SELECT id_pc,id_cliente, fecha_pago,internet,detalles_pago.pago as pago,n_cedula, nombres, apellidos,direccion, barrio, comunidad FROM detalles_pago LEFT JOIN clientes ON n_cedula = id_cliente  WHERE id_cliente=:id AND detalles_pago.estado='1' ORDER BY id_pc DESC LIMIT ".$n_pago);
						$stmt->bindparam(":id",$cedula);
						$stmt->execute();
						$i = $_SESSION['n_pagos'];
						while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
								$cedula = $row ['id_cliente'];
								$fecha1 = $row ['fecha_pago'];
								$pago   = $row ['pago'];
								$mb     = $row ['internet'];
								$fecha2 = date('m',($fecha1));
								$fecha2 = $fecha2 - 1 ;


								switch($fecha2){
									case 0: $fecha2  = "Diciembre"; $fecha3 = date('Y',($fecha1)); $fecha3 = $fecha3 - 1; ;break;
									case 1: $fecha2  = "Enero"; $fecha3 = date('Y',($fecha1));;break;
									case 2: $fecha2  = "Febrero"; $fecha3 = date('Y',($fecha1));;break;
								    case 3: $fecha2  = "Marzo"; $fecha3 = date('Y',($fecha1));;break;
									case 4: $fecha2  = "Abril"; $fecha3 = date('Y',($fecha1));;break;
									case 5: $fecha2  = "Mayo"; $fecha3 = date('Y',($fecha1));;break;
								  	case 6: $fecha2  = "Junio"; $fecha3 = date('Y',($fecha1));;break;
								  	case 7: $fecha2  = "Julio"; $fecha3 = date('Y',($fecha1));;break;
									case 8: $fecha2  = "Agosto";$fecha3 = date('Y',($fecha1)); ;break;
								    case 9: $fecha2  = "Septiembre"; $fecha3 = date('Y',($fecha1)); ;break;
									case 10: $fecha2 = "Octubre"; $fecha3 = date('Y',($fecha1));;break;
									case 11: $fecha2 = "Noviembre"; $fecha3 = date('Y',($fecha1)); ;break;
								  	case 12: $fecha2 = "Diciembre"; $fecha3 = date('Y',($fecha1)); $fecha3 = $fecha3 - 1; ;break;

										}

								$fecha  = $fecha2.' del año '.$fecha3;


								 	$nombre    = $row['nombres'].' '.$row['apellidos'];
								 	$direccion = $row['direccion'];
								 	$ubicacion = $row['barrio'].' '.$row['comunidad'];
								    $_SESSION['fecha'][$i]     = $fecha;
								 	$_SESSION['nombre'][$i]    = $nombre;
								 	$_SESSION['direccion'][$i] = $direccion;
								 	$_SESSION['ubicacion'][$i] = $ubicacion;
								 	$_SESSION['mb'][$i]        = $mb;
								 	$_SESSION['pago'][$i]      = $pago;


								 		$i = $i - 1 ;
							}//fin del primer while



				} catch (PDOException $e) {

					echo $e->getMessage();

				}
			}
	/* fin factura pago*/



	/*  listar pago*/
		public function listar_pago ()
	{
		try

		{	session_start();
			$casa = $_SESSION['casa_user'] ;
			$stmt = $this->db->prepare("SELECT  id_pc,id_cliente, fecha_pago  FROM detalles_pago WHERE estado= '0';");
			$stmt->execute();


			echo '<div class="span3">
                            <div class="table-responsive"><!-- table -->
                            <table class="table table-striped table-hover ">
                              <thead>
                              <tr>
                                  <th>Cedula</th>
                                  <th>Nombre</th>
                                  <th>Apellido</th>
                                  <th>Celular</th>
                                  <th>Factura</th>
                                  <th>Acciones</th>
                                  </tr>
                              </thead>  <tbody>';
			$contador = 0;

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				    $contador = $contador + 1;

				    $stmt1 = $this->db->prepare("SELECT n_cedula, nombres, apellidos,celular,clientes.pago as pag, clientes.internet_contratado as inter FROM clientes WHERE n_cedula ='".$row['id_cliente']."' AND estado='1' AND id_casa_matriz = '".$casa."'  ORDER BY nombres ASC;");


			        $stmt1->execute();

			        while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
							{
								$fecha  = $row['fecha_pago'];
								$cedula = $row1['n_cedula'];
								$fecha1 = date('d-m-Y',($fecha));
								$fecha2 = strtotime ( '-1 month' , strtotime ( $fecha1 ));
								$fecha3 = date('m',($fecha2));
								switch($fecha3){

									case 1: $fecha3  = "Enero"; ;break;
									case 2: $fecha3  = "Febrero"; ;break;
								    case 3: $fecha3  = "Marzo"; ;break;
									case 4: $fecha3  = "Abril"; ;break;
									case 5: $fecha3  = "Mayo"; ;break;
								  	case 6: $fecha3  = "Junio"; ;break;
								  	case 7: $fecha3  = "Julio"; ;break;
									case 8: $fecha3  = "Agosto"; ;break;
								    case 9: $fecha3  = "Septiembre"; ;break;
									case 10: $fecha3 = "Octubre"; ;break;
									case 11: $fecha3 = "Noviembre"; ;break;
								  	case 12: $fecha3 = "Diciembre"; ;break;

										}

									echo '<tr>';
						            echo '<td>'.$row1['n_cedula'].'</td>';
						            echo '<td>'.$row1['nombres'].'</td>';
						            echo '<td>'.$row1['apellidos'].'</td>';
						             echo '<td>'.$row1['celular'].'</td>';
						            echo '<td>'.$fecha3.'</td>';

						            echo'<td>     <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#pagos'.$contador.'" onclick="ocultar ('.$contador.'); ">Cancelar</a>

						                    <!-- inicio del modal-->
						                        <!-- Modal -->
						                            <div class="modal fade" id="pagos'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label'.$contador.'">
						                              <div class="modal-dialog" role="document">
						                                <div class="modal-content">
						                                  <div class="modal-header">
						                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                                    <h4 class="modal-title" id="label'.$contador.'" align="center"><strong>Facturacion</strong> </h4>
						                                  </div>
						                                  <div class="modal-body">
						                                                 <form class="form-horizontal" role="form">



						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">N° de Cédula:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="###-######-####A" id="cedula'.$contador.'" value="'.$row1['n_cedula'].'" disabled="disabled">
						                                                        </div>
						                                                        </div>
						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="Nombre" id="nombre'.$contador.'" value="'.$row1['nombres'].'">
						                                                        </div>
						                                                        </div>
						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="apellido">Apellido:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="Apellido" id="apellido'.$contador.'" value="'.$row1['apellidos'].'">
						                                                        </div>
						                                                        </div>

						                                                         <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="direccion">Mes a pagar:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text"   value="'.$fecha3.'" disabled="disabled">
						                                                        </div>
						                                                        </div>


						                                                         <input class="form-control" type="hidden"  id="fecha'.$contador.'" value="'.$fecha1.'" disabled="disabled">

						                                                         <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">Cantidad ($):</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="$00" id="pago'.$contador.'" value="'.$row1['pag'].'" disabled="disabled">
						                                                        </div>
						                                                        </div>
						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">MB contratados:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="00MB" id="internet'.$contador.'" value="'.$row1['inter'].'" disabled="disabled">
						                                                        </div>
						                                                        </div>
						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">Numero de pagos:</label>
						                                                        <div class="col-sm-8">
						                                                            <select class="form-control" id="n_pago'.$contador.'">
						                                                            <option value="1">1</option>
						                                                            <option value="2">2</option>
						                                                            <option value="3">3</option>
						                                                            <option value="4">4</option>
						                                                            <option value="5">5</option>
						                                                            <option value="6">6</option>
						                                                            <option value="7">7</option>
						                                                            <option value="8">8</option>
						                                                            <option value="9">9</option>
						                                                            <option value="10">10</option>
						                                                            <option value="11">11</option>
						                                                            <option value="12">12</option>
						                                                             </select>
						                                                        </div>
						                                                        </div>
						                                                       <input type="hidden" value="'.$row['id_pc'].'" id="mes'.$contador.'" >

						                                                 </form>

						                                  </div>
						                                  <div class="modal-footer">
						                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="setTimeout(function () {listar_pagos();},500);">Cerrar</button>
						                                    <a type="button" class="btn btn-primary" id="btn_imprimir'.$contador.'" target="_blank" href="../app/controller/pdf.php?cedula='.$cedula.'" >Imprimir Factura</a>
						                                    <button type="button" class="btn btn-warning"  id="btn_factura'.$contador.'" onclick="facturar ('.$contador.');">Facturar</button>
						                                  </div>
						                                </div>
						                              </div>
						                            </div>



						                        <!-- fin del modal--></td>';

						                          echo'<td>     <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#factura'.$contador.'" ><span class="glyphicon glyphicon-print"></span></a>

						                    <!-- inicio del modal-->
						                        <!-- Modal -->
						                            <div class="modal fade" id="factura'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label1'.$contador.'">
						                              <div class="modal-dialog" role="document">
						                                <div class="modal-content">
						                                  <div class="modal-header">
						                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                                    <h4 class="modal-title" id="label1'.$contador.'" align="center"><strong>Facturacion</strong> </h4>
						                                  </div>
						                                  <div class="modal-body">
						                                                 <form class="form-horizontal" role="form">

						                                                         <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">Numero de pagos:</label>
						                                                        <div class="col-sm-8">
						                                                            <select class="form-control" id="n_pago_print'.$contador.'">
						                                                            <option value="1">1</option>
						                                                            <option value="2">2</option>
						                                                            <option value="3">3</option>
						                                                            <option value="4">4</option>
						                                                            <option value="5">5</option>
						                                                            <option value="6">6</option>
						                                                            <option value="7">7</option>
						                                                            <option value="8">8</option>
						                                                            <option value="9">9</option>
						                                                            <option value="10">10</option>
						                                                            <option value="11">11</option>
						                                                            <option value="12">12</option>
						                                                             </select>
						                                                        </div>
						                                                        </div>
						                                                       <input type="hidden" value="'.$cedula.'" id="cedula_print'.$contador.'" >



						                                                 </form>

						                                  </div>
						                                  <div class="modal-footer">
						                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="setTimeout(function () {listar_pagos();},500);">Cerrar</button>
						                                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="imprimir('.$contador.'); ">Imprimir</button>


						                                  </div>
						                                </div>
						                              </div>
						                            </div>



						                        <!-- fin del modal--></td>';
							            echo '</tr>';

							}


				}



		}
		catch(PDOException $e)
		{
			echo $e->getMessage();

		}

	}

/* fin listar pago*/
/*  listar pago like*/
		public function listar_pago_like ($data)
	{
		try
		{
			session_start();
			$casa = $_SESSION['casa_user'] ;
			 $stmt1 = $this->db->prepare("SELECT n_cedula FROM clientes WHERE  nombres LIKE '%$data%' OR apellidos LIKE '%$data%' OR barrio LIKE '%$data%' OR comunidad LIKE '%$data%' ORDER BY nombres ASC ;");
			 $stmt1->execute();

			echo '<div class="span3">
                            <div class="table-responsive"><!-- table -->
                            <table class="table table-striped table-hover ">
                              <thead>
                              <tr>
                                  <th>Cedula</th>
                                  <th>Nombre</th>
                                  <th>Apellido</th>
                                  <th>Celular</th>
                                  <th>Factura</th>
                                  <th>Acciones</th>
                                  </tr>
                              </thead>  <tbody>';
			$contador = 0;



			while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
			{
				    $contador = $contador + 1;
				    $cedula = $row['n_cedula'];

				   $stmt = $this->db->prepare("SELECT  id_pc,id_cliente, fecha_pago,nombres, apellidos,celular,clientes.pago as pag, clientes.internet_contratado as inter  FROM detalles_pago LEFT JOIN clientes ON n_cedula = id_cliente   WHERE id_cliente='$cedula' AND  detalles_pago.estado= '0' AND id_casa_matriz='".$casa."' ;");
					$stmt->execute();

			        while($row1 = $stmt->fetch(PDO::FETCH_ASSOC))
							{
								$fecha  = $row1['fecha_pago'];
								$fecha1 = date('d-m-Y',($fecha));
								$fecha2 = strtotime ( '-1 month' , strtotime ( $fecha1 ));
								$fecha3 = date('m',($fecha2));
								switch($fecha3){

									case 1: $fecha3  = "Enero"; ;break;
									case 2: $fecha3  = "Febrero"; ;break;
								    case 3: $fecha3  = "Marzo"; ;break;
									case 4: $fecha3  = "Abril"; ;break;
									case 5: $fecha3  = "Mayo"; ;break;
								  	case 6: $fecha3  = "Junio"; ;break;
								  	case 7: $fecha3  = "Julio"; ;break;
									case 8: $fecha3  = "Agosto"; ;break;
								    case 9: $fecha3  = "Septiembre"; ;break;
									case 10: $fecha3 = "Octubre"; ;break;
									case 11: $fecha3 = "Noviembre"; ;break;
								  	case 12: $fecha3 = "Diciembre"; ;break;

										}

									echo '<tr>';
						            echo '<td>'.$row1['id_cliente'].'</td>';
						            echo '<td>'.$row1['nombres'].'</td>';
						            echo '<td>'.$row1['apellidos'].'</td>';
						             echo '<td>'.$row1['celular'].'</td>';
						            echo '<td>'.$fecha3.'</td>';

						            echo'<td>     <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#pagos'.$contador.'" onclick="ocultar ('.$contador.'); ">Cancelar</a>

						                    <!-- inicio del modal-->
						                        <!-- Modal -->
						                            <div class="modal fade" id="pagos'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label'.$contador.'">
						                              <div class="modal-dialog" role="document">
						                                <div class="modal-content">
						                                  <div class="modal-header">
						                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                                    <h4 class="modal-title" id="label'.$contador.'" align="center"><strong>Facturacion</strong> </h4>
						                                  </div>
						                                  <div class="modal-body">
						                                                 <form class="form-horizontal" role="form">



						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">N° de Cédula:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="###-######-####A" id="cedula'.$contador.'" value="'.$row1['id_cliente'].'" disabled="disabled">
						                                                        </div>
						                                                        </div>
						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="Nombre" id="nombre'.$contador.'" value="'.$row1['nombres'].'">
						                                                        </div>
						                                                        </div>
						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="apellido">Apellido:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="Apellido" id="apellido'.$contador.'" value="'.$row1['apellidos'].'">
						                                                        </div>
						                                                        </div>
						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="direccion">Mes a pagar:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text"   value="'.$fecha3.'" disabled="disabled">
						                                                        </div>
						                                                        </div>


						                                                            <input class="form-control" type="hidden"  id="fecha'.$contador.'" value="'.$fecha1.'" disabled="disabled">


						                                                         <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">Cantidad ($):</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="$00" id="pago'.$contador.'" value="'.$row1['pag'].'" disabled="disabled">
						                                                        </div>
						                                                        </div>
						                                                        <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">MB contratados:</label>
						                                                        <div class="col-sm-8">
						                                                            <input class="form-control" type="text" placeholder="00MB" id="internet'.$contador.'" value="'.$row1['inter'].'" disabled="disabled">
						                                                        </div>
						                                                        </div>
						                                                         <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">Numero de pagos:</label>
						                                                        <div class="col-sm-8">
						                                                            <select class="form-control" id="n_pago'.$contador.'">
						                                                            <option value="1">1</option>
						                                                            <option value="2">2</option>
						                                                            <option value="3">3</option>
						                                                            <option value="4">4</option>
						                                                            <option value="5">5</option>
						                                                            <option value="6">6</option>
						                                                            <option value="7">7</option>
						                                                            <option value="8">8</option>
						                                                            <option value="9">9</option>
						                                                            <option value="10">10</option>
						                                                            <option value="11">11</option>
						                                                            <option value="12">12</option>
						                                                             </select>
						                                                        </div>
						                                                        </div>
						                                                       <input type="hidden" value="'.$row1['id_pc'].'" id="mes'.$contador.'" >



						                                                 </form>

						                                  </div>
						                                  <div class="modal-footer">
						                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="setTimeout(function () {listar_pagos();},500);">Cerrar</button>
						                                    <a type="button" class="btn btn-primary" id="btn_imprimir'.$contador.'" target="_blank" href="../app/controller/pdf.php?cedula='.$cedula.'" >Imprimir Factura</a>
						                                    <button type="button" class="btn btn-warning"  id="btn_factura'.$contador.'" onclick="facturar ('.$contador.');">Facturar</button>
						                                  </div>
						                                </div>
						                              </div>
						                            </div>



						                        <!-- fin del modal--></td>';



						                       echo'<td>     <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#factura'.$contador.'" ><span class="glyphicon glyphicon-print"></span></a>

						                    <!-- inicio del modal-->
						                        <!-- Modal -->
						                            <div class="modal fade" id="factura'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="label1'.$contador.'">
						                              <div class="modal-dialog" role="document">
						                                <div class="modal-content">
						                                  <div class="modal-header">
						                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                                    <h4 class="modal-title" id="label1'.$contador.'" align="center"><strong>Facturacion</strong> </h4>
						                                  </div>
						                                  <div class="modal-body">
						                                                 <form class="form-horizontal" role="form">

						                                                         <div class="form-group">
						                                                        <label class="control-label col-sm-4" for="cedula">Numero de pagos:</label>
						                                                        <div class="col-sm-8">
						                                                            <select class="form-control" id="n_pago_print'.$contador.'">
						                                                            <option value="1">1</option>
						                                                            <option value="2">2</option>
						                                                            <option value="3">3</option>
						                                                            <option value="4">4</option>
						                                                            <option value="5">5</option>
						                                                            <option value="6">6</option>
						                                                            <option value="7">7</option>
						                                                            <option value="8">8</option>
						                                                            <option value="9">9</option>
						                                                            <option value="10">10</option>
						                                                            <option value="11">11</option>
						                                                            <option value="12">12</option>
						                                                             </select>
						                                                        </div>
						                                                        </div>
						                                                       <input type="hidden" value="'.$cedula.'" id="cedula_print'.$contador.'" >



						                                                 </form>

						                                  </div>
						                                  <div class="modal-footer">
						                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="setTimeout(function () {listar_pagos();},500);">Cerrar</button>
						                                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="imprimir('.$contador.'); ">Imprimir</button>


						                                  </div>
						                                </div>
						                              </div>
						                            </div>



						                        <!-- fin del modal--></td>';
							            echo '</tr>';

							}


				}



		}
		catch(PDOException $e)
		{
			echo $e->getMessage();

		}

	}

/* fin listar pago like*/

/*  listar cliente en mora*/
		public function listar_mora ()
	{
		try
		{
			$fecha = date('U');
			$stmt = $this->db->prepare("SELECT id_cliente, fecha_pago  FROM detalles_pago WHERE estado= '0' AND fecha_pago < '".$fecha."' ;");
			$stmt->execute();


			echo '<div class="span3">
                            <div class="table-responsive"><!-- table -->
                            <table class="table table-hover ">
                              <thead>
                                  <tr>
                                  <th>Cliente</th>
                                  <th>Factura</th>
                                  </tr>

                              </thead>  <tbody>';
			$contador = 0;

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				    $contador = $contador + 1;

				    $stmt1 = $this->db->prepare("SELECT n_cedula, nombres, apellidos FROM clientes WHERE n_cedula ='".$row['id_cliente']."' AND estado='1' ORDER BY nombres ASC;");
			        $stmt1->execute();

			        while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
							{


								$fecha1 = $row ['fecha_pago'];
								$fecha2 = date('m',($fecha1));
								$fecha ;

								switch($fecha2){

									case 1: $fecha2  = "Enero"; ;break;
									case 2: $fecha2  = "Febrero"; ;break;
								    case 3: $fecha2  = "Marzo"; ;break;
									case 4: $fecha2  = "Abril"; ;break;
									case 5: $fecha2  = "Mayo"; ;break;
								  	case 6: $fecha2  = "Junio"; ;break;
								  	case 7: $fecha2  = "Julio"; ;break;
									case 8: $fecha2  = "Agosto"; ;break;
								    case 9: $fecha2  = "Septiembre"; ;break;
									case 10: $fecha2 = "Octubre"; ;break;
									case 11: $fecha2 = "Noviembre"; ;break;
								  	case 12: $fecha2 = "Diciembre"; ;break;

										}
								$fecha3 = date('Y',($fecha1));
								$fecha4 = date('d',($fecha1));
								$fecha  = $fecha4.'-'.$fecha2.'-'.$fecha3;

									echo '<tr>';

						            echo '<td>'.$row1['nombres'].'  '.$row1['apellidos'].' </td>';

						            echo '<td>'.$fecha.'</td>';
						            echo '</tr>';

							}


				}



		}
		catch(PDOException $e)
		{
			echo $e->getMessage();

		}

	}

/* fin listar cliente en mora*/

	/*  reportes*/
		public function reporte_cliente ($anio)
	{
		try
		{

			//$date1 = date('U',strtotime('31-12-2016'));  $date2 = date('U',strtotime('01-01-2017'));  echo $date1.' - '.$date2;
			$anio = $anio;


			$anio1   = date('U', strtotime('31-01-'.$anio));
			$inicio  = $anio1;
			$anio2   = $anio + 1;
			$fin     = date('U', strtotime('31-01-'.$anio2));

		 	$stmt = $this->db->prepare("SELECT n_cedula, nombres, apellidos FROM clientes ORDER BY estado  DESC ;");
			$stmt->execute();

			echo '<div class="span3" id="tabla">
            <div class="table-responsive"><!-- table -->
            <table class="table table-striped table-hover ">
              <thead>
              <tr>
                  <th>Cliente</th>
                   <th>ENERO</th>
                   <th>FEBRERO</th>
                   <th>MARZO</th>
                   <th>ABRIL</th>
                   <th>MAYO</th>
                   <th>JUNIO</th>
                   <th>JULIO</th>
                   <th>AGOSTO</th>
                   <th>SEPTIEMBRE</th>
                   <th>OCTUBRE</th>
                   <th>NOVIEMBRE</th>
                   <th>DICIEMBRE</th>
                   <th>TOTAL</th>


                  </tr>
              </thead>  <tbody>';
              $ya = 0; $n_cliente  = 0; $total_pagot = 0;
             							$e_mt  = 0;	$f_mt  = 0; $m_mt  = 0;  $a_mt  = 0; $ma_mt = 0;  $j_mt  = 0;
										$ju_mt = 0;	$ag_mt = 0; $s_mt  = 0;  $o_mt  = 0;  $n_mt = 0;  $d_mt  = 0;
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{// inicio del while listar por cliente

				$n_cedula  = $row['n_cedula'];
				$nombres   = $row['nombres'];
				$apellidos = $row['apellidos'];
				$cliente_n   = $nombres.' '.$apellidos;

								$stmt1 = $this->db->prepare("SELECT id_cliente,fecha_pago as fecha, detalles_pago.pago as pago FROM detalles_pago WHERE id_cliente= :id_cliente AND fecha_pago BETWEEN  :inicio AND  :fin AND detalles_pago.estado = '1' ORDER BY fecha_pago ASC ;");
								$stmt1->bindparam(':id_cliente',$n_cedula);
								$stmt1->bindparam(':inicio',$inicio);
								$stmt1->bindparam(':fin',$fin);
								$stmt1->execute();



									$total_pago = 0;
										$e_m  = 0;	$f_m  = 0; $m_m  = 0;$a_m  = 0; $ma_m = 0;  $j_m  = 0;
										$ju_m = 0; 	$ag_m = 0; $s_m  = 0;$o_m = 0; $n_m = 0;$d_m = 0;
									while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
									{
										$ya = 1;
										$fecha     = $row1['fecha'];
										$pago      = $row1['pago'];
										$mes1      = date('m', ($fecha));
										$mes       = strtotime ( '-1 month' , ( $fecha ));
										$mes 	   = date('d-m-Y',($mes));
										$dia_m 	   = date('d',strtotime($mes));
										$anio_m    = date('Y',strtotime($mes));
										$fecha2    = $mes1 - 1 ;
										$fecha4    = date('m',strtotime($mes));



																switch($fecha2){
															case 0: $d_m = $pago; $total_pago = $total_pago + $pago; $d_mt = $d_mt + $pago;  ;break;
															case 1: $e_m  = $pago; $total_pago = $total_pago + $pago; $e_mt = $e_mt + $pago;  ;break;
															case 2: $f_m  = $pago; $total_pago = $total_pago + $pago; $f_mt = $f_mt + $pago;  ;break;
														    case 3: $m_m  = $pago; $total_pago = $total_pago + $pago; $m_mt = $m_mt + $pago;  ;break;
															case 4: $a_m  = $pago; $total_pago = $total_pago + $pago; $a_mt = $a_mt + $pago;  ;break;
															case 5: $ma_m = $pago; $total_pago = $total_pago + $pago; $ma_mt = $ma_mt + $pago;  ;break;
														  	case 6: $j_m  = $pago; $total_pago = $total_pago + $pago; $j_mt = $j_mt + $pago;  ;break;
														  	case 7: $ju_m = $pago; $total_pago = $total_pago + $pago; $ju_mt = $ju_mt + $pago;  ;break;
															case 8: $ag_m = $pago; $total_pago = $total_pago + $pago; $ag_mt = $ag_mt + $pago;  ;break;
														    case 9: $s_m  = $pago; $total_pago = $total_pago + $pago; $s_mt = $s_mt + $pago;  ;break;
															case 10: $o_m = $pago; $total_pago = $total_pago + $pago; $o_mt = $o_mt + $pago;  ;break;
															case 11: $n_m = $pago; $total_pago = $total_pago + $pago; $n_mt = $n_mt + $pago;  ;break;


																}




									} // fin del while de registro

												if ($ya == 1)
													{
															echo"<tr>
											                  <td>".$cliente_n."</td>
											                   <td align='center'>".$e_m."</td>
											                   <td align='center'>".$f_m."</td>
											                   <td align='center'>".$m_m."</td>
											                   <td align='center'>".$a_m."</td>
											                   <td align='center'>".$ma_m."</td>
											                   <td align='center'>".$j_m."</td>
											                   <td align='center'>".$ju_m."</td>
											                   <td align='center'>".$ag_m."</td>
											                   <td align='center'>".$s_m."</td>
											                   <td align='center'>".$o_m."</td>
											                   <td align='center'>".$n_m."</td>
											                   <td align='center'>".$d_m."</td>
											                   <td align='center'>".$total_pago."</td>
											                  </tr>";

											                  $n_cliente  = $n_cliente + 1 ;
											                  $total_pagot = $total_pagot + $total_pago;
													}











													              	$ya = 0;

			}// fin del id del while listar cliente
																	 echo "</tbody>
																		   <tfooter>
																		   <tr>
														                   <td align='center'>N°: ".$n_cliente."</td>
														                   <td align='center'>".$e_mt."</td>
														                   <td align='center'>".$f_mt."</td>
														                   <td align='center'>".$m_mt."</td>
														                   <td align='center'>".$a_mt."</td>
														                   <td align='center'>".$ma_mt."</td>
														                   <td align='center'>".$j_mt."</td>
														                   <td align='center'>".$ju_mt."</td>
														                   <td align='center'>".$ag_mt."</td>
														                   <td align='center'>".$s_mt."</td>
														                   <td align='center'>".$o_mt."</td>
														                   <td align='center'>".$n_mt."</td>
														                   <td align='center'>".$d_mt."</td>
														                   <td align='center'>".$total_pagot."</td>
														                   </tr>
																		   </tfooter>
																    	  </table>
													                  	  </div><!-- table -->";

													                  	  echo '<script>$("#imprimir").click(function(){$("#tabla").printMe({"title":"Reporte Anual"});});</script>';
													                  	  //"path":"../assets/bootstrap/css/bootstrap.min.css",
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();

		}

	}

/* fin reporte de cliente*/

/*darwing*/
public function Titems(){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT iditems, codigo, nombre,  descripcion,  precio FROM items;");
$stmt->execute();
echo '<div class="cuerpo">
<div class="table-responsive"><!-- table -->
<table class="table table-striped table-hover ">
<thead>
<tr>
<th>Código</th>
<th>Nombre</th>
<th>Descripción</th>
<th>Precio</th>
</tr>
</thead>
<tbody>';
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					echo '<tr>';
							echo '<td class="obten" style="cursor:pointer;display:none;">'.$row['iditems'].'</td>';
	            echo '<td class="obten" style="cursor:pointer;">'.$row['codigo'].'</td>';
	            echo '<td class="obten" style="cursor:pointer;">'.$row['nombre'].'</td>';
							echo '<td class="obten" style="cursor:pointer;">'.$row['descripcion'].'</td>';
	            echo '<td class="obten" style="cursor:pointer;">'.$row['precio'].'</td>';
							//echo '<td><button class="obten" type="button" name="button" onclick="bus();">...</button></td>';
							echo '</tr>';
						}
		}
		else
		{
			echo '<tr>';
					echo '<td colspan=11><center>No Existe Informacion</center></td>';
					echo '</tr>';
		}
		echo "</tbody>
					</table>
								</div><!-- table -->";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function upTitems($iditems, $codigo, $nombre, $descripcion, $precio){
	try {
		session_start();
		$stmt = $this->db->prepare("UPDATE items SET codigo=:codigo,nombre=:nombre,descripcion=:descripcion,precio=:precio WHERE iditems=:iditems;");
						$stmt->bindparam(":codigo",$codigo);
						$stmt->bindparam(":nombre",$nombre);
						$stmt->bindparam(":descripcion",$descripcion);
						$stmt->bindparam(":precio",$precio);
						$stmt->bindparam(":iditems",$iditems);
						$stmt->execute();
						echo "1";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function addTitems($codigo, $nombre, $descripcion, $precio){
	try {
		session_start();
		$stmt = $this->db->prepare("INSERT INTO items(codigo,nombre,descripcion,precio) VALUES (:codigo,:nombre,:descripcion,:precio);");
						$stmt->bindparam(":codigo",$codigo);
						$stmt->bindparam(":nombre",$nombre);
						$stmt->bindparam(":descripcion",$descripcion);
						$stmt->bindparam(":precio",$precio);
						$stmt->execute();
						echo "1";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}

public function Cliente(){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT idcliente, nombre, direccion,  telefono,  descuento, estado FROM cliente ORDER BY nombre;");
$stmt->execute();
echo '<div class="cuerpo">
<div class="table-responsive"><!-- table -->
<table class="table table-striped table-hover ">
<thead>
<tr>
<th>Nombre</th>
<th>Dirección</th>
<th>Teléfono</th>
</tr>
</thead>
<tbody>';
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					echo '<tr>';
							echo '<td class="client" id="vcliente" style="cursor:pointer; display:none">'.$row['idcliente'].'</td>';
	            echo '<td class="client" id="vcliente" style="cursor:pointer;">'.$row['nombre'].'</td>';
	            echo '<td class="client" id="vcliente" style="cursor:pointer;">'.$row['direccion'].'</td>';
							echo '<td class="client" id="vcliente" style="cursor:pointer;">'.$row['telefono'].'</td>';
	            echo '<td class="client" id="vcliente" style="cursor:pointer;display:none"">'.$row['descuento'].'</td>';
							echo '<td class="client" style="cursor:pointer; display:none">'.$row['estado'].'</td>';
							echo '</tr>';
						}
		}
		else
		{
			echo '<tr>';
					echo '<td colspan=11><center>No Existe Informacion</center></td>';
					echo '</tr>';
		}
		echo "</tbody>
					</table>
								</div><!-- table -->";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}

public function addCliente($nombre, $direccion, $telefono, $descuento){
		$est=1;
	try {
		session_start();
		$stmt = $this->db->prepare("INSERT INTO cliente(nombre,direccion,telefono,descuento,estado) VALUES (:nombre,:direccion,:telefono,:descuento,:estado);");
						$stmt->bindparam(":nombre",$nombre);
						$stmt->bindparam(":direccion",$direccion);
						$stmt->bindparam(":telefono",$telefono);
						$stmt->bindparam(":descuento",$descuento);
						$stmt->bindparam(":estado",$est);
						$stmt->execute();
						echo "1";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function upCliente($idcliente, $nombre, $direccion, $telefono, $descuento,$estado){
	try {
		session_start();
		$stmt = $this->db->prepare("UPDATE cliente SET nombre=:nombre,direccion=:direccion,telefono=:telefono,descuento=:descuento,estado=:estado WHERE idcliente=:idcliente;");
						$stmt->bindparam(":idcliente",$idcliente);
						$stmt->bindparam(":nombre",$nombre);
						$stmt->bindparam(":direccion",$direccion);
						$stmt->bindparam(":telefono",$telefono);
						$stmt->bindparam(":descuento",$descuento);
						$stmt->bindparam(":estado",$estado);
						$stmt->bindparam(":idcliente",$idcliente);
						$stmt->execute();
						echo "1";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function addproducto($cantidad,$codigo,$nombre,$precio_compra,$precioA,$precioB,$precioC,$precioD){
	$est=1;
	$date = date('d-m-Y H:i:s');
	$date =	strtotime("-0 days",strtotime($date) );
	$date =	date('d-m-Y H:i:s',($date));
	try {
		session_start();
			$stmt = $this->db->prepare("INSERT INTO inventario(cantidad,estado) VALUES (:cantidad,:estado);");
			$stmt->bindparam(":cantidad",$cantidad);
			$stmt->bindValue(":estado",$est);
			$stmt->execute();
			$id = $this->db->lastInsertId();
			//echo "1";
			//try {
				//$stmt0 = $this->db->prepare("SELECT MAX(idinventario) AS idinventario FROM inventario;");
				//$stmt0->execute();

				////echo "$id";
				$stmt1 = $this->db->prepare("INSERT INTO producto(codigo, nombre, precio_compra,precioA,precioB,precioC,precioD,estado, idinventario) VALUES (:codigo,:nombre,:precio_compra, :precioA,:precioB, :precioC,:precioD,:estado, :idinventario );");
						$stmt1->bindparam(":codigo",$codigo);
						$stmt1->bindparam(":nombre",$nombre);
						$stmt1->bindparam(":precio_compra",$precio_compra);
						$stmt1->bindparam(":precioA",$precioA);
						$stmt1->bindparam(":precioB",$precioB);
						$stmt1->bindparam(":precioC",$precioC);
						$stmt1->bindparam(":precioD",$precioD);
						$stmt1->bindValue(":estado",$est);
						$stmt1->bindValue(":idinventario",$id);
						$stmt1->execute();
					//	$this->db->commit();
						echo "1";

		//echo "fin";
		//	} catch (PDOException $e) {
		//echo "error producto";
				//echo $e->getMessage();
		//$this->db->rollback();
	//	}
} catch (PDOException $e) {echo "err";
//echo "error inventario";
		echo $e->getMessage();
//$this->db->rollback();
	}
}

public function Producto(){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT idproducto, codigo,	nombre,	precio_compra, precioA, precioB, precioC,precioD, cantidad,	producto.estado, producto.idinventario FROM inventario INNER JOIN producto ON inventario.idinventario = producto.idinventario ORDER BY nombre;");
$stmt->execute();
echo '<div class="cuerpo">
<div class="table-responsive"><!-- table -->
<table class="table table-striped table-hover ">
<thead>
<tr>
<th>Código</th>
<th>Nombre</th>
<th>Precio Compra</th>
<th>precio A</th>
<th>Precio B</th>
<th>Precio C</th>
<th>Precio D</th>
<th>Existencias</th>
</tr>
</thead>
<tbody>';
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					echo '<tr>';
							echo '<td class="producto" style="cursor:pointer;display:none;">'.$row['idproducto'].'</td>';
	            echo '<td class="producto" style="cursor:pointer;">'.$row['codigo'].'</td>';
	            echo '<td class="producto" style="cursor:pointer;">'.$row['nombre'].'</td>';
							echo '<td class="producto" style="cursor:pointer;">'.$row['precio_compra'].'</td>';
	            echo '<td class="producto" style="cursor:pointer;">'.$row['precioA'].'</td>';
	            echo '<td class="producto" style="cursor:pointer;">'.$row['precioB'].'</td>';
	            echo '<td class="producto" style="cursor:pointer;">'.$row['precioC'].'</td>';
	            echo '<td class="producto" style="cursor:pointer;">'.$row['precioD'].'</td>';
	            echo '<td class="producto" style="cursor:pointer;">'.$row['cantidad'].'</td>';
							echo '<td class="producto" style="cursor:pointer;" style="cursor:pointer;display:none;">'.$row['estado'].'</td>';
							echo '<td class="producto" style="cursor:pointer;display:none;">'.$row['idinventario'].'</td>';
							echo '</tr>';
						}
		}
		else
		{
			echo '<tr>';
					echo '<td colspan=11><center>No Existe Informacion</center></td>';
					echo '</tr>';
		}
		echo "</tbody>
					</table>
								</div><!-- table -->";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function listProducto(){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT idproducto, codigo,	nombre,	precio_compra, cantidad,	precioA,precioB,precioC,precioD, producto.idinventario FROM inventario INNER JOIN producto ON inventario.idinventario = producto.idinventario where cantidad!=0 ORDER BY nombre;");
$stmt->execute();
echo '<div class="cuerpo">
<div class="table-responsive"><!-- table -->
<table class="table table-striped table-hover " >
<thead>
<tr>
<th>Código</th>
<th>Nombre</th>
<th>Precio Compra</th>
<th>Cantidad</th>
<th>Precio Venta</th>
</tr>
</thead>
<tbody id="mod">';
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					echo '<tr >';
							echo '<td class="lproducto" style="cursor:pointer;display:none;">'.$row['idproducto'].'</td>';
	            echo '<td class="lproducto" onclick="loader();" style="cursor:pointer;">'.$row['codigo'].'</td>';
	            echo '<td class="lproducto"  onclick="loader();" style="cursor:pointer;">'.$row['nombre'].'</td>';
							echo '<td class="lproducto" onclick="loader();" style="cursor:pointer;">'.$row['precio_compra'].'</td>';
	            echo '<td class="lproducto" onclick="loader();" style="cursor:pointer;">'.$row['cantidad'].'</td>';
							echo '<td class="lpro" ><select id="sele" name="sele" ><option value=""></option><option value="A">'.$row['precioA'].'</option><option value="B">'.$row['precioB'].'</option><option value="C">'.$row['precioC'].'</option><option value="D">'.$row['precioD'].'</option></select></td>';
							echo '<td class="lvacio" style="cursor:pointer;display:none;">Error</td>';
							/*echo '<td class="lproducto" style="cursor:none;">'.$row['precioB'].'</td>';
							echo '<td class="lproducto" style="cursor:none;">'.$row['precioC'].'</td>';
							echo '<td class="lproducto" style="cursor:none;">'.$row['precioD'].'</td>';*/
							echo '<td class="lproducto" style="cursor:pointer;display:none;">'.$row['idinventario'].'</td>';
							echo '</tr>';

						}
		}
		else
		{
			echo '<tr>';
					echo '<td colspan=11><center>No Existe Informacion</center></td>';
					echo '</tr>';
		}
		echo "</tbody>
					</table>
								</div><!-- table -->";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function listVenta(){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT idventa, Norecibo,	nombrec,	fechaventa, descuento,	total FROM venta;");
$stmt->execute();
echo '<div class="cuerpo">
<div class="table-responsive"><!-- table -->
<table class="table table-striped table-hover ">
<thead>
<tr>
<th>No Recibo</th>
<th>Nombre</th>
<th>Fecha</th>
<th>Descuento</th>
<th>TOTAL</th>
</tr>
</thead>
<tbody>';
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					echo '<tr>';
							echo '<td class="lventa" style="cursor:pointer;display:none;">'.$row['idventa'].'</td>';
	            echo '<td class="lventa" style="cursor:pointer;">'.$row['Norecibo'].'</td>';
	            echo '<td class="lventa" style="cursor:pointer;">'.$row['nombrec'].'</td>';
							echo '<td class="lventa" style="cursor:pointer;">'.$row['fechaventa'].'</td>';
	            echo '<td class="lventa" style="cursor:pointer;">'.$row['descuento'].'</td>';
	            echo '<td class="lventa" style="cursor:pointer;">'.$row['total'].'</td>';
							echo '</tr>';
						}
		}
		else
		{
			echo '<tr>';
					echo '<td colspan=11><center>No Existe Informacion</center></td>';
					echo '</tr>';
		}
		echo "</tbody>
					</table>
								</div><!-- table -->";
	} catch (PDOException $e) {echo "err";
		echo $e->getMessage();
	}

}
public function listDetalle($idventa){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT nombrep, cantidad,	precio FROM detalleventa where idventa='".$idventa."';");
$stmt->execute();
echo '<div class="cuerpo">
<div class="table-responsive"><!-- table -->
<table id="tab" class="table table-striped table-hover ">
<thead>
<tr>
<th>N°</th>
<th>Producto</th>
<th>Cantidad</th>
<th>Precio</th>
</tr>
</thead>
<tbody>';$D=0;
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					echo '<tr id="tra">';
							echo '<td class="ldetalle" style="cursor:pointer;">'.++$D.'</td>';
	            echo '<td id="numero" class="ldetalle" style="cursor:pointer;">'.$row['nombrep'].'</td>';
	            echo '<td class="ldetalle" style="cursor:pointer;">'.$row['cantidad'].'</td>';
							echo '<td class="ldetalle" style="cursor:pointer;">'.$row['precio'].'</td>';
							echo '</tr>';
						}

		}
		else
		{
			echo '<tr>';
					echo '<td colspan=11><center>No Existe Informacion</center></td>';
					echo '</tr>';
		}
		echo "</tbody>
					</table>
								</div><!-- table -->";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function listDetall($idventa){
	$i = 0;
	try {
//session_start();'".$idventa."'
		$stmt = $this->db->prepare("SELECT nombrep, cantidad,	precio FROM detalleventa where idventa='".$idventa."';");
$stmt->execute();
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$nombrep    = $row['nombrep'];
					$cantidad = $row['cantidad'];
					$precio = $row['precio'];
		$_SESSION['nombrep'][$i]     = $nombrep;
		$_SESSION['cantidad'][$i]    = $cantidad;
		$_SESSION['precio'][$i] = $precio;$i++;
	}
	}

}catch (PDOException $e) {
	echo $e->getMessage();
}
}
public function upProducto($idproducto,$codigo,$nombre,$precio_compra,$precioA,$precioB,$precioC,$precioD,$estado, $idinventario){
	try {
		session_start();
		$stmt = $this->db->prepare("UPDATE producto SET codigo=:codigo,nombre=:nombre,precio_compra=:precio_compra,precioA=:precioA,precioB=:precioB,precioC=:precioC,precioD=:precioD,estado=:estado,idinventario=:idinventario WHERE idproducto=:idproducto;");
						$stmt->bindparam(":codigo",$codigo);
						$stmt->bindparam(":nombre",$nombre);
						$stmt->bindparam(":precio_compra",$precio_compra);
						$stmt->bindparam(":precioA",$precioA);
						$stmt->bindparam(":precioB",$precioB);
						$stmt->bindparam(":precioC",$precioC);
						$stmt->bindparam(":precioD",$precioD);
						$stmt->bindparam(":estado",$estado);
						$stmt->bindparam(":idinventario",$idinventario);
						$stmt->bindparam(":idproducto",$idproducto);
						$stmt->execute();
						echo "1";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function addProveedor($nombre, $direccion, $telefono, $correo, $estado){
	$est=1;
	try {
		session_start();
		$stmt = $this->db->prepare("INSERT INTO proveedor(nombre,direccion,telefono,correo,estado) VALUES (:nombre,:direccion,:telefono,:correo, :estado);");
						$stmt->bindparam(":nombre",$nombre);
						$stmt->bindparam(":direccion",$direccion);
						$stmt->bindparam(":telefono",$telefono);
						$stmt->bindparam(":correo",$correo);
						$stmt->bindparam(":estado",$estado);
						$stmt->execute();
						echo "1";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}

public function Proveedor(){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT idproveedor, nombre, direccion,  telefono,  correo, estado FROM proveedor;");
$stmt->execute();
echo '<div class="cuerpo">
<div class="table-responsive"><!-- table -->
<table class="table table-striped table-hover ">
<thead>
<tr>
<th>Nombre</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>Correo</th>
</tr>
</thead>
<tbody>';
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$idproveedor=$row['idproveedor'];
					echo '<tr>';
					    echo '<td id="pro" class="obtenP" style="cursor:pointer;display:none;">'.$row['idproveedor'].'</td>';
	            echo '<td id="pro" class="obtenP" style="cursor:pointer;">'.$row['nombre'].'</td>';
	            echo '<td id="pro" class="obtenP" style="cursor:pointer;">'.$row['direccion'].'</td>';
							echo '<td id="pro" class="obtenP" style="cursor:pointer;">'.$row['telefono'].'</td>';
	            echo '<td id="pro" class="obtenP" style="cursor:pointer;">'.$row['correo'].'</td>';
							echo '<td id="pro" class="obtenP" style="cursor:pointer;display:none;">'.$row['estado'].'</td>';
							echo '</tr>';
						}
		}
		else
		{
			echo '<tr>';
					echo '<td colspan=11><center>No Existe Informacion</center></td>';
					echo '</tr>';
		}
		echo "</tbody>
					</table>
								</div><!-- table -->";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}

public function upProveedor($idproveedor, $nombre, $direccion, $telefono, $correo,$estado){
	try {
		session_start();
		$stmt = $this->db->prepare("UPDATE proveedor SET nombre=:nombre,direccion=:direccion,telefono=:telefono,correo=:correo,estado=:estado WHERE idproveedor=:idproveedor;");
						$stmt->bindparam(":nombre",$nombre);
						$stmt->bindparam(":direccion",$direccion);
						$stmt->bindparam(":telefono",$telefono);
						$stmt->bindparam(":correo",$correo);
						$stmt->bindparam(":estado",$estado);
						$stmt->bindparam(":idproveedor",$idproveedor);
						$stmt->execute();
						echo "1";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function upCantidad($cantidad,$idinventario){
	try {
		session_start();
		$stmt1 = $this->db->prepare("SELECT cantidad FROM inventario where idinventario='".$idinventario."';");
$stmt1->execute();
			if ($stmt1->rowCount() > 0) {
				while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
					$cant    = $row['cantidad'];
					$res = $cant + $cantidad;
					$stmt = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad WHERE idinventario=:idinventario;");
									$stmt->bindparam(":cantidad",$res);
									$stmt->bindparam(":idinventario",$idinventario);
									$stmt->execute();
									echo "1";
	}
	}

	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}
public function addCompra($producto,$cantidad,$precioc,$precioIVA,$precioA,$precioB,$precioC,$precioD,$fcompra, $idproveedor){
	$est=1;
	try {
		session_start();
				$stmt1 = $this->db->prepare("INSERT INTO compra(producto,pcompra, precio_compra,precioA,precioB,precioC,precioD, cantidad,fechacompra, idproveedor) VALUES (:producto,:pcompra,:precio_compra,:precioA, :precioB,:precioC,:precioD,:cantidad, :fcompra, :idproveedor );");
						$stmt1->bindparam(":producto",$producto);
						$stmt1->bindparam(":pcompra",$precioc);
						$stmt1->bindparam(":precio_compra",$precioIVA);
						$stmt1->bindparam(":precioA",$precioA);
						$stmt1->bindparam(":precioB",$precioB);
						$stmt1->bindparam(":precioC",$precioC);
						$stmt1->bindparam(":precioD",$precioD);
						$stmt1->bindparam(":cantidad",$cantidad);
						$stmt1->bindparam(":cantidad",$cantidad);
						$stmt1->bindValue(":fcompra",$fcompra);
						$stmt1->bindValue(":idproveedor",$idproveedor);
						$stmt1->execute();
					//	$this->db->commit();
						echo "1";

		//echo "fin";
		//	} catch (PDOException $e) {
		//echo "error producto";
				//echo $e->getMessage();
		//$this->db->rollback();
	//	}
	} catch (PDOException $e) {
//echo "error inventario";
		echo $e->getMessage();
//$this->db->rollback();
	}
}
public function Compra(){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT idcompra, producto,pcompra,precio_compra,precioA,precioB,precioC,precioD,cantidad,fechacompra, compra.idproveedor, proveedor.nombre FROM proveedor INNER JOIN compra ON proveedor.idproveedor = compra.idproveedor ORDER BY fechacompra desc;");
$stmt->execute();
echo '<div class="cuerpo">
<div class="table-responsive"><!-- table -->
<table class="table table-striped table-hover ">
<thead>
<tr>
<th>Proveedor</th>
<th>Producto</th>
<th>Precio Compra</th>
<th>Precio A</th>
<th>Precio B</th>
<th>Precio C</th>
<th>Precio D</th>
<th>Existencias</th>
<th>Fecha Compra</th>
</tr>
</thead>
<tbody>';
			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$idproveedor=$row['idproveedor'];
					echo '<tr>';
					    echo '<td id="pro" class="obtenC" style="cursor:pointer;display:none;">'.$row['idcompra'].'</td>';
							echo '<td id="pro" class="obtenC" style="cursor:pointer;display:none;">'.$row['idproveedor'].'</td>';
							echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['nombre'].'</td>';
	            echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['producto'].'</td>';
							echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['precio_compra'].'</td>';
	            echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['precioA'].'</td>';
	            echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['precioB'].'</td>';
	            echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['precioC'].'</td>';
	            echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['precioD'].'</td>';
							echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['cantidad'].'</td>';
							echo '<td id="pro" class="obtenC" style="cursor:pointer;">'.$row['fechacompra'].'</td>';
							echo '<td id="pro" class="obtenC" style="cursor:pointer;display:none;">'.$row['pcompra'].'</td>';
							echo '</tr>';
						}
		}
		else
		{
			echo '<tr>';
					echo '<td colspan=11><center>No Existe Informacion</center></td>';
					echo '</tr>';
		}
		echo "</tbody>
					</table>
								</div><!-- table -->";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function upCompra($idcompra,$producto,$cantidad,$precioc,$precioIVA,$precioA, $precioB,$precioC,$precioD,$fcompra, $idproveedor){
	try {
		session_start();
		$stmt = $this->db->prepare("UPDATE compra SET producto=:producto,pcompra=:pcompra,precio_compra=:precio_compra,precioA=:precioA,precioB=:precioB,precioC=:precioC,precioD=:precioD,cantidad=:cantidad,fechacompra=:fechacompra,idproveedor=:idproveedor WHERE idcompra=:idcompra;");
						$stmt->bindparam(":producto",$producto);
						$stmt->bindparam(":cantidad",$cantidad);
						$stmt->bindparam(":pcompra",$precioIVA);
						$stmt->bindparam(":precio_compra",$precioc);
						$stmt->bindparam(":precioA",$precioA);
						$stmt->bindparam(":precioB",$precioB);
						$stmt->bindparam(":precioC",$precioC);
						$stmt->bindparam(":precioD",$precioD);
						$stmt->bindparam(":fechacompra",$fcompra);
						$stmt->bindparam(":idproveedor",$idproveedor);
						$stmt->bindparam(":idcompra",$idcompra);
						$stmt->execute();
						echo "1";
	} catch (PDOException $e) {
		echo "error";
		echo $e->getMessage();
	}

}
public function venta(){
	try {
session_start();
		$stmt = $this->db->prepare("SELECT Norecibo FROM venta order by Norecibo desc limit 1;");
$stmt->execute();

			if ($stmt->rowCount() > 0) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
							//echo '<script  type="text/javascript">$('input:text[name=recibo]').val('.$row['Norecibo'].');</script>';
	            echo '<label id="v" class="v" style="cursor:pointer; color:#000;display:none;">'.$row['Norecibo'].'</label>';
						}
		}
		else
		{echo '<label id="v" class="v" style="cursor:pointer; color:#000;display:none;">0</label>';

		}

	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}
public function updateventa($cantidad,$idinventario,$count){
	try {
			session_start();
			if ($count>0) {
				switch ($count) {
					case '1':
		$stmt = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
						$stmt->bindparam(":cantidad",$cantidad);
						$stmt->bindValue(":idinventario",$idinventario);
						$stmt->execute();
						//echo $cantidad.' '.$idinventario;
						echo "1";
						break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error updateventa";
		echo $e->getMessage();
	}
}
public function addventa($Norecibo,$nombrec,$fechaventa,$descuento,$total,$nombrep,$cantidad, $precio,$count,$ex,$idinv,$gane){
	try {
		session_start();

					$stmt = $this->db->prepare("INSERT INTO venta(Norecibo,nombrec,fechaventa, descuento, total, ganancias) VALUES (:Norecibo,:nombrec,:fechaventa,:descuento,:total,:ganancias);");
			$stmt->bindparam(":Norecibo",$Norecibo);
			$stmt->bindValue(":nombrec",$nombrec);
			$stmt->bindparam(":fechaventa",$fechaventa);
			$stmt->bindValue(":descuento",$descuento);
			$stmt->bindValue(":total",$total);
			$stmt->bindValue(":ganancias",$gane);
			$stmt->execute();
			$id = $this->db->lastInsertId();

			if ($count>0) {
				switch ($count) {
					case '1':

					$stmt1 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
							$stmt1->bindparam(":nombrep",$nombrep);
							$stmt1->bindparam(":cantidad",$cantidad);
							$stmt1->bindparam(":precio",$precio);
							$stmt1->bindparam(":precio",$precio);
							$stmt1->bindValue(":idventa",$id);
							$stmt1->execute();
							echo "1";


						break;
					default:
						echo "break";
						break;
				}
			}

	} catch (PDOException $e) {
echo "error venta";
		echo $e->getMessage();
	}
}
public function updateventa1($cantidad,$idinventario,$cantidad1,$idinventario1,$count){
	try {
			session_start();
			if ($count>0) {
				switch ($count) {
					case '2':
		$stmt = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
						$stmt->bindparam(":cantidad",$cantidad);
						$stmt->bindValue(":idinventario",$idinventario);
						$stmt->execute();
						$stmt1 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
										$stmt1->bindparam(":cantidad",$cantidad1);
										$stmt1->bindValue(":idinventario",$idinventario1);
										$stmt1->execute();
						echo "1";
						break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error updateventa";
		echo $e->getMessage();
	}
}
public function addventa1($Norecibo,$nombrec,$fechaventa,$descuento,$total,$nombrep,$cantidad, $precio,$nombrep1,$cantidad1, $precio1,$count,$gane){
	try {
		session_start();
			$stmt = $this->db->prepare("INSERT INTO venta(Norecibo,nombrec,fechaventa, descuento, total,ganancias) VALUES (:Norecibo,:nombrec,:fechaventa,:descuento,:total,:ganancias);");
			$stmt->bindparam(":Norecibo",$Norecibo);
			$stmt->bindValue(":nombrec",$nombrec);
			$stmt->bindparam(":fechaventa",$fechaventa);
			$stmt->bindValue(":descuento",$descuento);
			$stmt->bindValue(":total",$total);
			$stmt->bindValue(":ganancias",$gane);
			$stmt->execute();
			$id = $this->db->lastInsertId();
			if ($count>0) {
				switch ($count) {
						case '2':
						$stmt1 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
								$stmt1->bindparam(":nombrep",$nombrep);
								$stmt1->bindparam(":cantidad",$cantidad);
								$stmt1->bindparam(":precio",$precio);
								$stmt1->bindparam(":precio",$precio);
								$stmt1->bindValue(":idventa",$id);
								$stmt1->execute();
								$stmt2 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
										$stmt2->bindparam(":nombrep",$nombrep1);
										$stmt2->bindparam(":cantidad",$cantidad1);
										$stmt2->bindparam(":precio",$precio1);
										$stmt2->bindparam(":precio",$precio1);
										$stmt2->bindValue(":idventa",$id);
										$stmt2->execute();
								echo "1";
							break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error venta";
		echo $e->getMessage();
	}
}
public function updateventa2($cantidad,$idinventario,$cantidad1,$idinventario1,$cantidad2,$idinventario2,$count){
	try {
			session_start();
			if ($count>0) {
				switch ($count) {
					case '3':
		$stmt = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
						$stmt->bindparam(":cantidad",$cantidad);
						$stmt->bindValue(":idinventario",$idinventario);
						$stmt->execute();
						$stmt1 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
										$stmt1->bindparam(":cantidad",$cantidad1);
										$stmt1->bindValue(":idinventario",$idinventario1);
										$stmt1->execute();
										$stmt2 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
														$stmt2->bindparam(":cantidad",$cantidad2);
														$stmt2->bindValue(":idinventario",$idinventario2);
														$stmt2->execute();
						echo "1";
						break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error updateventa";
		echo $e->getMessage();
	}
}
public function addventa2($Norecibo,$nombrec,$fechaventa,$descuento,$total,$nombrep,$cantidad, $precio,$nombrep1,$cantidad1,$precio1,$nombrep2,$cantidad2,$precio2,$count,$gane){
	try {
		session_start();
			$stmt = $this->db->prepare("INSERT INTO venta(Norecibo,nombrec,fechaventa, descuento, total,ganancias) VALUES (:Norecibo,:nombrec,:fechaventa,:descuento,:total,:ganancias);");
			$stmt->bindparam(":Norecibo",$Norecibo);
			$stmt->bindValue(":nombrec",$nombrec);
			$stmt->bindparam(":fechaventa",$fechaventa);
			$stmt->bindValue(":descuento",$descuento);
			$stmt->bindValue(":total",$total);
			$stmt->bindValue(":ganancias",$gane);
			$stmt->execute();
			$id = $this->db->lastInsertId();
			if ($count>0) {
				switch ($count) {
						case '3':
						$stmt1 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
								$stmt1->bindparam(":nombrep",$nombrep);
								$stmt1->bindparam(":cantidad",$cantidad);
								$stmt1->bindparam(":precio",$precio);
								$stmt1->bindValue(":idventa",$id);
								$stmt1->execute();
								$stmt2 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
										$stmt2->bindparam(":nombrep",$nombrep1);
										$stmt2->bindparam(":cantidad",$cantidad1);
										$stmt2->bindparam(":precio",$precio1);
										$stmt2->bindValue(":idventa",$id);
										$stmt2->execute();
										$stmt3 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
												$stmt3->bindparam(":nombrep",$nombrep2);
												$stmt3->bindparam(":cantidad",$cantidad2);
												$stmt3->bindparam(":precio",$precio2);
												$stmt3->bindValue(":idventa",$id);
												$stmt3->execute();
								echo "1";
							break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error venta";
		echo $e->getMessage();
	}
}
public function updateventa3($cantidad,$idinventario,$cantidad1,$idinventario1,$cantidad2,$idinventario2,$cantidad3,$idinventario3,$count){
	try {
			session_start();
			if ($count>0) {
				switch ($count) {
					case '4':
		$stmt = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
						$stmt->bindparam(":cantidad",$cantidad);
						$stmt->bindValue(":idinventario",$idinventario);
						$stmt->execute();
						$stmt1 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
										$stmt1->bindparam(":cantidad",$cantidad1);
										$stmt1->bindValue(":idinventario",$idinventario1);
										$stmt1->execute();
										$stmt2 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
														$stmt2->bindparam(":cantidad",$cantidad2);
														$stmt2->bindValue(":idinventario",$idinventario2);
														$stmt2->execute();
														$stmt3 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
																		$stmt3->bindparam(":cantidad",$cantidad3);
																		$stmt3->bindValue(":idinventario",$idinventario3);
																		$stmt3->execute();
						echo "1";
						break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error updateventa";
		echo $e->getMessage();
	}
}
public function addventa3($Norecibo,$nombrec,$fechaventa,$descuento,$total,$nombrep,$cantidad, $precio,$nombrep1,$cantidad1,$precio1,$nombrep2,$cantidad2,$precio2,$nombrep3,$cantidad3,$precio3,$count,$gane){
	try {
		session_start();
			$stmt = $this->db->prepare("INSERT INTO venta(Norecibo,nombrec,fechaventa, descuento, total,ganancias) VALUES (:Norecibo,:nombrec,:fechaventa,:descuento,:total,:ganancias);");
			$stmt->bindparam(":Norecibo",$Norecibo);
			$stmt->bindValue(":nombrec",$nombrec);
			$stmt->bindparam(":fechaventa",$fechaventa);
			$stmt->bindValue(":descuento",$descuento);
			$stmt->bindValue(":total",$total);
			$stmt->bindValue(":ganancias",$gane);
			$stmt->execute();
			$id = $this->db->lastInsertId();
			if ($count>0) {
				switch ($count) {
						case '4':
						$stmt1 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
								$stmt1->bindparam(":nombrep",$nombrep);
								$stmt1->bindparam(":cantidad",$cantidad);
								$stmt1->bindparam(":precio",$precio);
								$stmt1->bindValue(":idventa",$id);
								$stmt1->execute();
								$stmt2 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
										$stmt2->bindparam(":nombrep",$nombrep1);
										$stmt2->bindparam(":cantidad",$cantidad1);
										$stmt2->bindparam(":precio",$precio1);
										$stmt2->bindValue(":idventa",$id);
										$stmt2->execute();
										$stmt3 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
												$stmt3->bindparam(":nombrep",$nombrep2);
												$stmt3->bindparam(":cantidad",$cantidad2);
												$stmt3->bindparam(":precio",$precio2);
												$stmt3->bindValue(":idventa",$id);
												$stmt3->execute();
												$stmt4 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
														$stmt4->bindparam(":nombrep",$nombrep3);
														$stmt4->bindparam(":cantidad",$cantidad3);
														$stmt4->bindparam(":precio",$precio3);
														$stmt4->bindValue(":idventa",$id);
														$stmt4->execute();
								echo "1";
							break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error venta";
		echo $e->getMessage();
	}
}
public function updateventa4($cantidad,$idinventario,$cantidad1,$idinventario1,$cantidad2,$idinventario2,$cantidad3,$idinventario3,$cantidad4,$idinventario4,$count){
	try {
			session_start();
			if ($count>0) {
				switch ($count) {
					case '5':
		$stmt = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
						$stmt->bindparam(":cantidad",$cantidad);
						$stmt->bindValue(":idinventario",$idinventario);
						$stmt->execute();
						$stmt1 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
										$stmt1->bindparam(":cantidad",$cantidad1);
										$stmt1->bindValue(":idinventario",$idinventario1);
										$stmt1->execute();
										$stmt2 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
														$stmt2->bindparam(":cantidad",$cantidad2);
														$stmt2->bindValue(":idinventario",$idinventario2);
														$stmt2->execute();
														$stmt3 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
																		$stmt3->bindparam(":cantidad",$cantidad3);
																		$stmt3->bindValue(":idinventario",$idinventario3);
																		$stmt3->execute();
																		$stmt4 = $this->db->prepare("UPDATE inventario SET cantidad=:cantidad, estado=1 WHERE idinventario=:idinventario;");
																						$stmt4->bindparam(":cantidad",$cantidad4);
																						$stmt4->bindValue(":idinventario",$idinventario4);
																						$stmt4->execute();
						echo "1";
						break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error updateventa";
		echo $e->getMessage();
	}
}
public function addventa4($Norecibo,$nombrec,$fechaventa,$descuento,$total,$nombrep,$cantidad, $precio,$nombrep1,$cantidad1,$precio1,$nombrep2,$cantidad2,$precio2,$nombrep3,$cantidad3,$precio3,$nombrep4,$cantidad4,$precio4,$count,$gane){
	try {
		session_start();
			$stmt = $this->db->prepare("INSERT INTO venta(Norecibo,nombrec,fechaventa, descuento, total,ganancias) VALUES (:Norecibo,:nombrec,:fechaventa,:descuento,:total,:ganancias);");
			$stmt->bindparam(":Norecibo",$Norecibo);
			$stmt->bindValue(":nombrec",$nombrec);
			$stmt->bindparam(":fechaventa",$fechaventa);
			$stmt->bindValue(":descuento",$descuento);
			$stmt->bindValue(":total",$total);
			$stmt->bindValue(":ganancias",$gane);
			$stmt->execute();
			$id = $this->db->lastInsertId();
			if ($count>0) {
				switch ($count) {
						case '5':
						$stmt1 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
								$stmt1->bindparam(":nombrep",$nombrep);
								$stmt1->bindparam(":cantidad",$cantidad);
								$stmt1->bindparam(":precio",$precio);
								$stmt1->bindValue(":idventa",$id);
								$stmt1->execute();
								$stmt2 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
										$stmt2->bindparam(":nombrep",$nombrep1);
										$stmt2->bindparam(":cantidad",$cantidad1);
										$stmt2->bindparam(":precio",$precio1);
										$stmt2->bindValue(":idventa",$id);
										$stmt2->execute();
										$stmt3 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
												$stmt3->bindparam(":nombrep",$nombrep2);
												$stmt3->bindparam(":cantidad",$cantidad2);
												$stmt3->bindparam(":precio",$precio2);
												$stmt3->bindValue(":idventa",$id);
												$stmt3->execute();
												$stmt4 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
														$stmt4->bindparam(":nombrep",$nombrep3);
														$stmt4->bindparam(":cantidad",$cantidad3);
														$stmt4->bindparam(":precio",$precio3);
														$stmt4->bindValue(":idventa",$id);
														$stmt4->execute();
														$stmt5 = $this->db->prepare("INSERT INTO detalleventa(nombrep, cantidad, precio,idventa) VALUES (:nombrep,:cantidad,:precio,:idventa );");
																$stmt5->bindparam(":nombrep",$nombrep4);
																$stmt5->bindparam(":cantidad",$cantidad4);
																$stmt5->bindparam(":precio",$precio4);
																$stmt5->bindValue(":idventa",$id);
																$stmt5->execute();
								echo "1";
							break;
					default:
						echo "break";
						break;
				}
			}
	} catch (PDOException $e) {
echo "error venta";
		echo $e->getMessage();
	}
}
public function verventas(){
	try {//'".$fechad."'

session_start();
		$stmt0 = $this->db->prepare("SELECT count(*) as cont FROM venta where fechaventa between '20-04-2019' and '30-04-2019';");
		$stmt0->execute();
		while($row1 = $stmt0->fetch(PDO::FETCH_ASSOC)){
			$cont    = $row1['cont'];
			$_POST['cont']=$cont;
				}
		$stmt = $this->db->prepare("SELECT Norecibo,nombrec FROM venta where fechaventa between '20-04-2019' and '30-04-2019';");
$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$i=1;
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
$arrayDetalle = Array();
						$Norecibo    = $row['Norecibo'];
						$nombrec = $row['nombrec'];
						$fechaventa = $row['fechaventa'];
						$arrayDetalle =$Norecibo;
						$_GET['venta']['re'][$i]=$arrayDetalle;



				}//$i = $i - 1 ;
						$i++;
		}//$i++ ;
		//$i = $i - 1 ;
		else
		{echo 'err';

		}

	} catch (PDOException $e) {
		echo $e->getMessage();
	}

}

}/*ultimo de la clase*/
