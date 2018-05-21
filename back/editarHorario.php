<?php

include ('conection.php');

$dia = null;
$hora = null;
$servicio = null;
$orden = null;

if (isset($_SESSION['idHorario'])){
    $id = $_SESSION['idHorario'];
}
if (isset($_POST['dias'])){
    $dia = $_POST['dias'];
    if ($dia=="lunes"){
        $orden = 1;
    }else{
        if ($dia=="martes"){
            $orden = 2;
        }else{
            if ($dia=="miercoles"){
                $orden = 3;
            }else{
                if ($orden=="jueves"){
                    $orden = 4;
                }else{
                    $orden = 5;
                }
            }
        }
    }
}
if (isset($_POST['hora'])){
    $hora = $_POST['hora'];
}
if (isset($_POST['tipo'])){
    $servicio = $_POST['tipo'];
}


$consulta = mysqli_query($con,"UPDATE `horarios` SET `dia`='" . $dia . "',`Hora`='" . $hora . "',`servicio`='" . $servicio . "', `orden`='" . $orden . "' WHERE `IdHorario`='" . $id . "';");

if ($consulta){
    echo "<script>alert('Se edito el horario con exito'); window.location.href='../views/horarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/horarios-admin.php'</script>";
}

