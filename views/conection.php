<?php
/**
 * Created by PhpStorm.
 * User: SOPORTE COLOMBIA
 * Date: 4/05/2018
 * Time: 4:30 PM
 */
session_start();

$con = mysqli_connect("localhost", "reservas","ninguna123.", "dbreservas");

if (!$con){
    $_SESSION['conect']= $con;
}

?>


