<?php

include ('conection.php');


if (isset($_SESSION['idTvehiculo'])){
    $id = $_SESSION['idTvehiculo'];
}

if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
}


$consulta = mysqli_query($con,"UPDATE `tipovehiculo` SET `TipoVehiculo`='" . $nombre . "',`Estado`='" . $estado . "' WHERE `IdTipoVehiculo`='" . $id . "';");

if ($consulta){
    echo "<script>alert('Se edito el tipo de vehiculo con exito'); window.location.href='../views/tipov-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/editar-tvehiculo.php?id=" . $id . "'</script>";
}