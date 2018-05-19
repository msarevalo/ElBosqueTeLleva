<?php

include ('conection.php');

$dia = null;
$hora = null;
$servicio = null;

if (isset($_SESSION['idHorario'])){
    $id = $_SESSION['idHorario'];
}
if (isset($_POST['dias'])){
    $dia = $_POST['dias'];
}
if (isset($_POST['hora'])){
    $hora = $_POST['hora'];
}
if (isset($_POST['tipo'])){
    $servicio = $_POST['tipo'];
}

$consulta = mysqli_query($con,"INSERT INTO `horarios` (`dia`, `Hora`, `servicio`) VALUES ('" . $dia ."', '" . $hora ."', '" . $servicio . "');");

if ($consulta){
    echo "se creó con exito";
}else{
    echo "algo fallo";
}