<?php
/**
 * Created by PhpStorm.
 * User: SOPORTE COLOMBIA
 * Date: 8/05/2018
 * Time: 2:46 PM
 */
include ('conection.php');

$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
$temp = explode(".", $_FILES['imagen']['name']);
$extension = end($temp);
$id = rand(0, 999999999);
$nom_temp = 'banner' . $id .'.'. $extension;
$ruta = '/img/banners/';

//Si existe imagen y tiene un tamaño correcto
if ($nombre_img == !NULL)
{
    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["imagen"]["type"] == "image/gif")
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/jpg")
        || ($_FILES["imagen"]["type"] == "image/png"))
    {
        // Ruta donde se guardarán las imágenes que subamos
        $directorio = $_SERVER['DOCUMENT_ROOT'].$ruta;
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nom_temp);
    }
    else
    {
        //si no cumple con el formato
        echo "No se puede subir una imagen con ese formato ";
    }
}
else
{
    //si existe la variable pero se pasa del tamaño permitido
    echo "no se cargo imagen";
}

$sql = "INSERT INTO `imagenes`( `nombre_img`, `ruta_imagen`, `activo`) VALUES ('".$nom_temp."','" . $ruta . "',1)";
$result = mysqli_query($con, $sql);
if($result){
    echo "se cargo correctamente";
    echo "<a href='banners.php'>Volver</a>";
}else{
    echo "fallo";
}
?>

