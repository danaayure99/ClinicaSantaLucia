<?php

if($_SESSION["Rol"] != "Administrador"){

    echo '<script>

	window.location = "inicio";
	</script>';

    return;

}


?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Gestor de Secretarias</h1>

        </section>

        <section class="content">

            <div class="box">

                <div class="box-header">

                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearSecretaria">Crear Secretaria</button>

                </div>


                <div class="box-body">

                    <table class="table table-bordered table-hover table-striped dt-responsive DT">

                        <thead>

                        <tr>

                            <th>N°</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Documento</th>
                            <th>Contraseña</th>
                            <th>Borrar</th>

                        </tr>

                        </thead>

                        <tbody>

                        <?php

                        $resultado = secretariasC::VerSecretariasC();

                        foreach ($resultado as $key => $value) {

                            echo '<tr>
							
									<td>'.($key+1).'</td>
									<td>'.$value["Apellido"].'</td>
									<td>'.$value["Nombre"].'</td>';

                            if($value["Foto"] == ""){

                                echo '<td><img src="Vistas/img/defecto.png" width="40px"></td>';

                            }else{

                                echo '<td><img src="'.$value["Foto"].'" width="40px"></td>';

                            }

                            echo '<td>'.$value["Documento"].'</td>

									<td>'.$value["Contraseña"].'</td>

									<td>
										
										<div class="btn-group">
											
											<button class="btn btn-danger EliminarSecretaria" Sid="'.$value["IdSecretaria"].'" imgS="'.$value["Foto"].'"><i class="fa fa-times"></i> Borrar</button>
											
										</div>

									</td>

								</tr>';

                        }

                        ?>


                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </div>



    <div class="modal fade" rol="dialog" id="CrearSecretaria">

        <div class="modal-dialog">

            <div class="modal-content">

                <form method="post" role="form">

                    <div class="modal-body">

                        <div class="box-body">

                            <div class="form-group">

                                <h2>Apellido:</h2>

                                <input type="text" class="form-control input-lg" name="Apellido" required>

                                <input type="hidden" name="rolS" value="Secretaria">

                            </div>

                            <div class="form-group">

                                <h2>Nombre:</h2>

                                <input type="text" class="form-control input-lg" name="Nombre" required>

                            </div>



                            <div class="form-group">

                                <h2>Documento:</h2>

                                <input type="text" class="form-control input-lg" name="Documento" required>

                            </div>

                            <div class="form-group">

                                <h2>Contraseña:</h2>

                                <input type="password" class="form-control input-lg" name="Contraseña" required>

                            </div>

                        </div>

                    </div>


                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Crear</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>

                    <?php

                    $crear = new SecretariasC();
                    $crear -> CrearSecretariaC();

                    ?>

                </form>

            </div>

        </div>

    </div>



<?php

$borrarD = new SecretariasC();
$borrarD -> BorrarSecretariaC();