<?php

include ('conection.php');

$nombre = null;
$orden = null;
$fechaInicio = null;
$fechaFin = null;

if (isset($_SESSION['idBanner'])){
    $id = $_SESSION['idBanner'];
}
if (isset($_POST['bannerName'])){
    $nombre = $_POST['bannerName'];
}
if (isset($_POST['orden'])){
    $orden = $_POST['orden'];
}
if (isset($_POST['fecInicio'])){
    $fechaInicio = $_POST['fecInicio'];
}
if (isset($_POST['fecInicio'])){
    $fechaFin = $_POST['fecFinal'];
}


$consulta = mysqli_query($con,"UPDATE `banners` SET `nombre`='" . $nombre . "',`Hora`='" . $hora . "',`servicio`='" . $servicio . "', `orden`='" . $orden . "' WHERE `IdHorario`='" . $id . "';");

if ($consulta){
    echo "<script>alert('Se edito el horario con exito'); window.location.href='../views/horarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/horarios-admin.php'</script>";
}

