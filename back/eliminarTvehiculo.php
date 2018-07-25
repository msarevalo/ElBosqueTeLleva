<?php

include ('conection.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `tipovehiculo` WHERE `tipovehiculo`.`IdTipoVehiculo` = '" . $idEliminar . "';");
if ($consulta){
    echo "<script>alert('Se elimino correctamente el Tipo de Vehiculo'); window.location.href='../views/tipov-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/tipov-admin.php</script>";
}


?>