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


$consulta = mysqli_query($con,"UPDATE `horarios` SET `dia`='" . $dia . "',`Hora`='" . $hora . "',`servicio`='" . $servicio . "' WHERE `IdHorario`='" . $id . "';");

if ($consulta){
    echo "se actualizao con exito";
}else{
    echo "algo fallo";
}

