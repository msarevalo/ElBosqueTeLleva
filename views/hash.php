<?php
/**
 * Created by PhpStorm.
 * User: SOPORTE COLOMBIA
 * Date: 4/05/2018
 * Time: 7:15 PM
 */
include ("conection.php");

$id = 10;
$nueva = "ninguna123.";

$nhash = password_hash($nueva, PASSWORD_BCRYPT);
$cambio = mysqli_query($con, "UPDATE `usuarios` SET `Clave` = '" . $nhash . "' WHERE `usuarios`.`IdUsuario` = " . $id . ";");
echo "se realizo el cambio del usuario ". $id . ".";