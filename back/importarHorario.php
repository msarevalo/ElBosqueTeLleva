<?php
include ('conection.php');
try {

//obtenemos el archivo .csv
    $tipo = $_FILES['archivo']['type'];

    $tamanio = $_FILES['archivo']['size'];

    $archivotmp = $_FILES['archivo']['tmp_name'];

//cargamos el archivo
    $lineas = file($archivotmp);

//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
    $i = 0;
    ini_set('max_execution_time', 6000);
//Recorremos el bucle para leer línea por línea
    if ($tipo==="application/vnd.ms-excel") {
        foreach ($lineas as $linea_num => $linea) {
            //echo "entro";
            //abrimos bucle
            /*si es diferente a 0 significa que no se encuentra en la primera línea
            (con los títulos de las columnas) y por lo tanto puede leerla*/
            if ($i != 0) {
                //echo "entro if i";
                //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá
                leyendo hasta que encuentre un ; */
                $datos = explode(";", $linea);

                //Almacenamos los datos que vamos leyendo en una variable
                //usamos la función utf8_encode para leer correctamente los caracteres especiales

                if (isset($datos[0])) {
                    $dia = utf8_encode($datos[0]);
                }
                if (isset($datos[1])) {
                    $hora = $datos[1];
                }
                if (isset($datos[2])) {
                    $servicio = utf8_encode($datos[2]);
                }

                if ($dia == "lunes") {
                    $orden = 1;
                } else {
                    if ($dia == "martes") {
                        $orden = 2;
                    } else {
                        if ($dia == "miercoles") {
                            $orden = 3;
                        } else {
                            if ($dia == "jueves") {
                                $orden = 4;
                            } else {
                                if ($dia == "viernes") {
                                    $orden = 5;
                                } else {
                                    if ($dia == "sabado") {
                                        $orden = 6;
                                    } else {
                                        if ($dia == "domingo") {
                                            $orden = 7;
                                        } else {
                                            echo "<script>alert('Archivo con dias no permitidos'); window.location.href='../views/importar-horario.php'</script>";
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if (strpos($servicio, 'tren') || strpos($servicio, 'bus')) {
                    echo "<script>alert('Archivo con servicios no permitidos'); window.location.href='../views/importar-horario.php'</script>";
                    break;
                }
                //guardamos en base de datos la línea leida
                $insersion = mysqli_query($con, "INSERT INTO `horarios` (`dia`, `Hora`, `servicio`, `orden`) VALUES ('" . $dia . "', '" . $hora . "', '" . $servicio . "', '" . $orden . "');");
                if ($insersion) {
                    echo "<script>alert('Se importo el archivo correctamente');window.location.href='../views/horarios-admin.php'</script>";
                } else {
                    echo "<script>alert('Algo ha fallado'); window.location.href='../views/importar-horario.php'</script>";
                }
                //cerramos condición
            }

            /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya
            entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
            $i++;
            //cerramos bucle
        }
    }else{
        echo "<script>alert('El archivo debe ser de extension .csv'); window.location.href='../views/importar-horario.php'</script>";
    }
}catch (Exception $e){
    echo "<script>alert('Algo ha pasado, verifica tu archivo'); window.location.href='../views/importar-horario.php'</script>";
}
?>


