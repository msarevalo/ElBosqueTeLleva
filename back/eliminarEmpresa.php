<?php

include ('conection.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `empresas` WHERE `empresas`.`IdEmpresa` = '" . $idEliminar . "';");
if ($consulta){
    echo "<script>alert('Se elimino correctamente la empresa'); window.location.href='../views/empresas-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/empresas-admin.php'</script>";
}


?>