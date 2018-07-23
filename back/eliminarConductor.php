<?php

include ('conection.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `conductores` WHERE `conductores`.`IdConductor` = '" . $idEliminar . "';");
if ($consulta){
    echo "<script>alert('Se elimino correctamente el conductor'); window.location.href='../views/conductores-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/conductores-admin.php'</script>";
}


?>