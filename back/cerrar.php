<?php

include('conection.php');
session_start();
//$_SESSION['sesion']=null;
session_destroy();
$actualizar = mysqli_query($con, "UPDATE 'usuarios' SET 'conexion'='0' WHERE 'Login'='" . $_SESSION['username'] . "'");
header("Location: ../views/index.php");
$_SESSION['username']=0;
?>