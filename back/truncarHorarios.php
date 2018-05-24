<?php
//TRUNCATE TABLE `horarios`

include ('../back/conection.php');

$consulta = mysqli_query($con,"TRUNCATE TABLE `horarios`;");
if ($consulta){
    echo "<script>alert('Se eliminaron correctamente los horarios'); window.location.href='../views/horarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/horarios-admin.php'</script>";
}
?>