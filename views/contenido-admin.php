<!DOCTYPE html>
<html>
<head>
    <title>Home | El Bosque Te LLeva</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="application-name" content="Sistema de Reservas Universidad del Bosque">
    <meta name="author" content="Manuel Arevalo - Lina Avila - Diego Vargas - Juan VIllamil">
    <meta name="description" content="Proyecto De Grado">
    <!-- Estilos -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="application/javascript" src="../js/index.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon-small.png">

</head>

<?php

session_start();

echo "Entro bien!";
echo "<br><a href='". $_SERVER['HTTP_REFERER'] ."'>volver</a>";
?>