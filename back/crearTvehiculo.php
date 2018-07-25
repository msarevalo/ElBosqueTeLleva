<?php
include ('conection.php');


if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
}

$consulta = mysqli_query($con,"INSERT INTO `tipovehiculo` (`TipoVehiculo`, `Estado`) VALUES ('" . $nombre ."', '" . $estado . "');");

if ($consulta){
    echo "<script>alert('Se creó el tipo de vehiculo con exito'); window.location.href='../views/tipov-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/tipov-admin.php'</script>";
}