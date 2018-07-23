<?php
include ('conection.php');


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

$consulta = mysqli_query($con,"INSERT INTO `conductores` (`tipoDocumento`, `NI`, `Nombres`, `Apellidos`, `Empresa`, `Telefono`, `Estado`) VALUES ('" . $tdocumento ."', '" . $documento ."', '" . $nombre . "', '". $apellido . "', '" . $empresa . "', '" . $telefono . "', '" . $estado . "');");

if ($consulta){
    echo "<script>alert('Se creó el conductor con exito'); window.location.href='../views/conductores-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/conductores-admin.php'</script>";
}
?>