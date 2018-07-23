<?php

include ('conection.php');


if (isset($_SESSION['idConductor'])){
    $id = $_SESSION['idConductor'];
}

if (isset($_POST['tdocumento'])){
    $tdocumento = $_POST['tdocumento'];
}
if (isset($_POST['documento'])){
    $documento = $_POST['documento'];
}
if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}
if (isset($_POST['apellido'])){
    $apellido = $_POST['apellido'];
}
if (isset($_POST['empresa'])){
    $empresa = $_POST['empresa'];
}
if (isset($_POST['telefono'])){
    $telefono = $_POST['telefono'];
}
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
}


$consulta = mysqli_query($con,"UPDATE `conductores` SET `tipoDocumento`='" . $tdocumento . "',`NI`='" . $documento . "',`Nombres`='" . $nombre . "', `Apellidos`='" . $apellido . "', `Empresa`='" . $empresa . "', `Telefono`='" . $telefono . "', `Estado`='" . $estado . "' WHERE `IdConductor`='" . $id . "';");

if ($consulta){
    echo "<script>alert('Se edito el conductor con exito'); window.location.href='../views/conductores-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/conductores-admin.php'</script>";
}