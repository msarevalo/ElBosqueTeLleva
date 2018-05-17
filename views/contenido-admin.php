<?php
/**
 * Created by PhpStorm.
 * User: SOPORTE COLOMBIA
 * Date: 17/05/2018
 * Time: 6:04 PM
 */
session_start();

echo "Entro bien!";
echo "<br><a href='". $_SERVER['HTTP_REFERER'] ."'>volver</a>";