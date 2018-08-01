<?php
include ('conection.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `rutas` WHERE `rutas`.`IdRuta` = '" . $idEliminar . "';");
if ($consulta){
    echo "<script>alert('Se elimino correctamente la ruta'); window.location.href='../views/rutas-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/rutas-admin.php'</script>";
}


?>