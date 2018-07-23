<?php

include ('conection.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `vehiculos` WHERE `vehiculos`.`IdVehiculo` = '" . $idEliminar . "';");
if ($consulta){
    echo "<script>alert('Se elimino correctamente el Vehiculo'); window.location.href='../views/vehiculos-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/vehiculos-admin.php'</script>";
}


?>