<?php
include ('conection.php');
/*$horario = null;
$vehiculo = null;*/

if (isset($_SESSION['idRuta'])){
    $id = $_SESSION['idRuta'];
}

if (isset($_POST['horas'])){
    $horario = $_POST['horas'];
    //echo $horario . "<br>";
}
if (isset($_POST['placas'])){
    $vehiculo = $_POST['placas'];
    //echo $vehiculo;
}
if (isset($_POST['conductor'])){
    $conductor = $_POST['conductor'];
}
if (isset($_POST['origen'])){
    $origen = $_POST['origen'];
}
if (isset($_POST['destino'])){
    $destino = $_POST['destino'];
}
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
}

$consultaHorarios = mysqli_query($con, "SELECT `servicio` FROM `horarios` WHERE `IdHorario`='" . $horario . "';");
$consultaVehiculo = mysqli_query($con, "SELECT `TipoVehiculo`, `CantidadPuestos` FROM `vehiculos` WHERE `IdVehiculo`='" . $vehiculo ."';");

$horarios = mysqli_fetch_all($consultaHorarios);
$vehiculos = mysqli_fetch_all($consultaVehiculo);

if ($horarios[0][0] !== $vehiculos[0][0]){
    echo "<script>alert('El tipo de vehiculo del Horario no coincide con el tipo de vehiculo de la placa'); window.location.href='../views/editar-ruta.php?id=" . $id ."'</script>";
}else {
    if ($origen === $destino) {
        echo "<script>alert('El origen y el destino no pueden ser el mismo'); window.location.href='../views/editar-ruta.php?id=" . $id . "'</script>";
    } else {
        $consulta = mysqli_query($con, "UPDATE `rutas` SET `IdHorario`='" . $horario . "',`IdVehiculo`='" . $vehiculo . "',`IdConductor`='" . $conductor . "',`Origen`='" . $origen . "',`Destino`='" . $destino . "', `Estado`='" . $estado . "' WHERE `IdRuta`='" . $id . "';");

        if ($consulta) {
            echo "<script>alert('Se edito la ruta con exito'); window.location.href='../views/rutas-admin.php'</script>";
        } else {
            echo "<script>alert('Algo ha fallado'); window.location.href='../views/editar-ruta.php?id=" . $id . "'</script>";
        }
    }
}
