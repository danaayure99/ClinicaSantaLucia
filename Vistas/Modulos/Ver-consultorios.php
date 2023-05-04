<?php

if ($_SESSION["Rol"] != "Paciente"){

    echo '<script>

    window.location = "inicio";
    
    </script>';

    return ;
}

?>


    <div class="content-wrapper">

        <section class="content-header">

            <h1>Elija un consultorio:</h1>

        </section>

        <section class="content">

            <div class="box">

                <div class="box-body">

                    <?php

                    $columna = null ;
                    $valor = null ;

                    $resultado = consultoriosC::VerConsultoriosC($columna, $valor);

                    foreach ($resultado as $key => $value){

                        echo '
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>'.$value["Nombre"].'</h3>';

                        $columna = "id_consultorio";
                        $valor = $value["id"];

                        $doctores = DoctoresC::VerDoctoresC($columna,$valor);

                        foreach ($doctores as $key => $value){
                            echo '<a href="Doctor/'.$value["id"].'" style="color: black">'.$value["apellido"].' '.$value["nombre"].' </a>';
                        }

                            echo '</div>

                        </div>
                    </div>';
                    }
                    ?>


                </div>
            </div>

        </section>

    </div>
<?php
