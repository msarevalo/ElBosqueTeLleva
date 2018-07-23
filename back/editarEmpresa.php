<?php

include ('conection.php');


if (isset($_SESSION['idEmpresa'])){
    $id = $_SESSION['idEmpresa'];
}

if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}
if (isset($_POST['nit'])){
    $nit = $_POST['nit'];
}
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
}


$consulta = mysqli_query($con,"UPDATE `empresas` SET `NombreEmpresa`='" . $nombre . "',`NIT`='" . $nit. "',`Estado`='" . $estado . "' WHERE `IdEmpresa`='" . $id . "';");

if ($consulta){
    echo "<script>alert('Se edito la empresa con exito'); window.location.href='../views/empresas-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/empresas-admin.php'</script>";
}