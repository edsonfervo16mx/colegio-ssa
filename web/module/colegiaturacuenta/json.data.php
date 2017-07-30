<?php 

    $constructor = new ConstructorGrupo;
    $datosConstructor = $constructor->listar($key);

    echo '
        <script>
            $(document).ready(function(){
                $("#alumno").autocomplete({
                    data: {';
                    foreach ($datosConstructor as $colConstructor) {
                        echo '"'.$colConstructor->nombre_completo.'":null,';
                    }
                    echo '
                    }
                });

                
            });
        </script>
    ';
?>