<?php

include ('conection.php');

$nombre = null;
$orden = null;
$fechaInicio = null;
$fechaFin = null;
$estado = null;

$nombre_img = $_FILES['imagenEdt']['name'];
$tipo = $_FILES['imagenEdt']['type'];
$tamano = $_FILES['imagenEdt']['size'];
$temp = explode(".", $_FILES['imagenEdt']['name']);
$extension = end($temp);
$id = rand(0, 999999999);
$nom_temp = 'banner' . $id .'.'. $extension;
$ruta = '/img/banners/';

if (isset($_SESSION['idBanner'])){
    $id = $_SESSION['idBanner'];
}
if (isset($_POST['bannerName'])){
    $nombre = $_POST['bannerName'];
}
if (isset($_POST['orden'])){
    $orden = $_POST['orden'];
}
if (isset($_POST['actividad'])){
    $estado = $_POST['actividad'];
}
if (isset($_POST['fecInicio'])){
    $fechaInicio = $_POST['fecInicio'];
}
if (isset($_POST['fecInicio'])){
    $fechaFin = $_POST['fecFinal'];
}


if ($nombre_img == !NULL) {

    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["imagenEdt"]["type"] == "image/gif")
        || ($_FILES["imagenEdt"]["type"] == "image/jpeg")
        || ($_FILES["imagenEdt"]["type"] == "image/jpg")
        || ($_FILES["imagenEdt"]["type"] == "image/png")) {

        //$consulta = mysqli_query($con, "UPDATE `banners` SET `nombre`='" . $nombre . "',`Hora`='" . $hora . "',`servicio`='" . $servicio . "', `orden`='" . $orden . "', `nombre_img`='" . $nom_temp ."', `ruta_imagen`='" . $ruta ."' WHERE `IdHorario`='" . $id . "';");
        $consulta = mysqli_query($con, "UPDATE `banners` SET `nombre`='" . $nombre . "',`nombre_img`='" . $nom_temp . "',`ruta_imagen`='" . $ruta . "',`activo`=" . $estado . ",`orden`=" . $orden . ",`fecha_inicio`='" . $fechaInicio . "',`fecha_final`='" . $fechaFin . "' WHERE `id_img`='" . $id . "';");
        $result = mysqli_query($con, $consulta);
        if ($result) {
            // Ruta donde se guardarán las imágenes que subamos
            $directorio = $_SERVER['DOCUMENT_ROOT'] . $ruta;
            // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['imagenEdt']['tmp_name'], $directorio . $nom_temp);
            echo "<script>alert('Se edito el banner con exito'); window.location.href='../views/banners.php'</script>";
        } else {
            //echo "<script>alert('Algo ha fallado'); window.location.href='../views/banners.php'</script>";
        }
    } else {
        //si no cumple con el formato
        echo "No se puede subir una imagen con ese formato ";
        echo "<a href='../views/banners.php'>Volver</a>";
    }
}else{
    //si existe la variable pero se pasa del tamaño permitido
    echo "no se cargo imagen";
    echo "<a href='../views/banners.php'>Volver</a>";
}

