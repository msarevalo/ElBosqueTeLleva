<?php
//TRUNCATE TABLE `horarios`

include ('../back/conection.php');

$consulta = mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0; TRUNCATE TABLE `horarios`; SET FOREIGN_KEY_CHECKS=1");
if ($consulta){
    echo "<script>alert('Se elimino correctamente el horario'); window.location.href='../views/horarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/horarios-admin.php'</script>";
}
?>