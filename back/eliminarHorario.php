<?php

include ('conection.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `horarios` WHERE `horarios`.`IdHorario` = '" . $idEliminar . "';");
if ($consulta){
    echo "se Eliminó con exito";
}else{
    echo "algo fallo";
}


?>