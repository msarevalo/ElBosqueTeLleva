<?php

include('conection.php');

$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
$temp = explode(".", $_FILES['imagen']['name']);
$extension = end($temp);
$id = rand(0, 999999999);
$nom_temp = 'banner' . $id .'.'. $extension;
$ruta = '/img/banners/';

if (isset($_POST['orden'])){
    $orden = $_POST['orden'];
}else{
    $orden = 0;
}

//Si existe imagen y tiene un tamaño correcto
if ($nombre_img == !NULL)
{

    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["imagen"]["type"] == "image/gif")
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/jpg")
        || ($_FILES["imagen"]["type"] == "image/png"))
    {
        $sql = "INSERT INTO `banners` (`nombre_img`, `ruta_imagen`, `activo`, `orden`) VALUES ('" . $nom_temp ."', '" . $ruta ."', '1', '" . $orden ."');";
        $result = mysqli_query($con, $sql);
        if ($result) {
            // Ruta donde se guardarán las imágenes que subamos
            $directorio = $_SERVER['DOCUMENT_ROOT'] . $ruta;
            // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nom_temp);
        }else{
            echo "algo ha fallado";
            echo "<a href='../views/banners.php'>Volver</a>";
        }
    }
    else
    {
        //si no cumple con el formato
        echo "No se puede subir una imagen con ese formato ";
        echo "<a href='../views/banners.php'>Volver</a>";
    }
}
else
{
    //si existe la variable pero se pasa del tamaño permitido
    echo "no se cargo imagen";
    echo "<a href='../views/banners.php'>Volver</a>";
}


/*
if($result){
    echo "se cargo correctamente";
    echo "<a href='../views/banners.php'>Volver</a>";
}else{
    echo "fallo";
}*/
?>

