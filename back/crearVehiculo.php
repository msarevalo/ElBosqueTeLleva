<?php
include ('conection.php');


if (isset($_POST['placa'])){
    $placa = $_POST['placa'];
}
if (isset($_POST['puesto'])){
    $puesto = $_POST['puesto'];
}
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
}

$consulta = mysqli_query($con,"INSERT INTO `vehiculos` (`Placa`, `CantidadPuestos`, `Estado`) VALUES ('" . $placa ."', '" . $puesto ."', '" . $estado . "');");

if ($consulta){
    echo "<script>alert('Se creó el vehiculo con exito'); window.location.href='../views/vehiculos-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/vehiculos-admin.php'</script>";
}