<?php 

    $alumno = new Alumno;
    $datosAlumno = $alumno->listar($key);

    $tutor = new Tutor;
    $datosTutor = $tutor->listar($key);

    echo '
        <script>
            $(document).ready(function(){
                $("#alumno").autocomplete({
                    data: {';
                    foreach ($datosAlumno as $colAlumno) {
                        echo '"'.$colAlumno->nombre_completo.'":null,';
                    }
                    echo '
                    }
                });

                $("#tutor").autocomplete({
                    data: {';
                    foreach ($datosTutor as $colTutor) {
                        echo '"'.$colTutor->nombre_completo.'":null,';
                    }
                    echo '
                    }
                });
            });
        </script>
    ';
?>