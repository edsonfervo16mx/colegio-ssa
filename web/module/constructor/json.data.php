<?php 

    $alumno = new Alumno;
    $datosAlumno = $alumno->listar($key);

    echo '
        <script>
            $(document).ready(function(){
                $("#alumno_constructor").autocomplete({
                    data: {';
                    foreach ($datosAlumno as $colAlumno) {
                        echo '"'.$colAlumno->nombre_completo.'":null,';
                    }
                    echo '
                    }
                });

                
            });
        </script>
    ';
?>