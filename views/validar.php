<?php
/**
 * Created by PhpStorm.
 * User: SOPORTE COLOMBIA
 * Date: 4/05/2018
 * Time: 6:16 PM
 */

include ("conection.php");
//session_start();

$usuario = null;
$pass = null;
if (isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
}else{
    header("Location: index.php");
}

if (isset($_POST['pass'])){
    $pass = $_POST['pass'];
}else{
    header("Location: index.php");
}

$resultado = mysqli_query($con, "SELECT * FROM `usuarios` WHERE `login` LIKE '" . $usuario . "'");
//$result = mysql_query("SELECT * from users where user='" . $usuario . "'");
$respuesta = mysqli_fetch_all($resultado);

if($respuesta){
    $hash = $respuesta[0][5];
    if (password_verify($pass, $hash) ){
        echo "correcto";
    }else{
        //echo "fallo";
        echo "<script>alert('Usuario o ontraseña incorrectos');window.location.href='index.php'</script>";
    }
}else{
    echo "<script>alert('Usuario o ontraseña incorrectos');window.location.href='index.php'</script>";
}
?>