<?php

include ('conection.php');


if (isset($_SESSION['idVehiculo'])){
    $id = $_SESSION['idVehiculo'];
}

if (isset($_POST['placa'])){
    $placa = $_POST['placa'];
}
if (isset($_POST['puesto'])){
    $puesto = $_POST['puesto'];
}
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
}
if (isset($_POST['vehiculo'])){
    $vehiculo = $_POST['vehiculo'];
}


$consulta = mysqli_query($con,"UPDATE `vehiculos` SET `Placa`='" . $placa . "',`CantidadPuestos`='" . $puesto . "',`Estado`='" . $estado . "', `TipoVehiculo`='" . $vehiculo . "' WHERE `IdVehiculo`='" . $id . "';");

if ($consulta){
    echo "<script>alert('Se edito el vehiculo con exito'); window.location.href='../views/vehiculos-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/vehiculos-admin.php'</script>";
}