<?php

include ('conection.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `horarios` WHERE `horarios`.`IdHorario` = '" . $idEliminar . "';");
if ($consulta){
    echo "<script>alert('Se elimino correctamente el horario'); window.location.href='../views/horarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/horarios-admin.php'</script>";
}


?>