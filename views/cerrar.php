<?php
/**
 * Created by PhpStorm.
 * User: SOPORTE COLOMBIA
 * Date: 9/05/2018
 * Time: 3:40 PM
 */
include ('conection.php');
session_start();
//$_SESSION['sesion']=null;
session_destroy();
$actualizar = mysqli_query($con, "UPDATE 'usuarios' SET 'conexion'='0' WHERE 'Login'='" . $_SESSION['username'] . "'");
header("Location: index.php");
$_SESSION['username']=0;
?>