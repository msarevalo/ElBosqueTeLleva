<?php
include ('conection.php');


if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}
if (isset($_POST['nit'])){
    $nit = $_POST['nit'];
}
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
}

$consulta = mysqli_query($con,"INSERT INTO `empresas` (`NombreEmpresa`, `NIT`, `Estado`) VALUES ('" . $nombre ."', '" . $nit ."', '" . $estado . "');");

if ($consulta){
    echo "<script>alert('Se creó la empresa con exito'); window.location.href='../views/empresas-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/empresas-admin.php'</script>";
}