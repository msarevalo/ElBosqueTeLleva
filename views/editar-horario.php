<!DOCTYPE html>
<html>
<head>
    <title>Horarios | El Bosque Te LLeva</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="application-name" content="Sistema de Reservas Universidad del Bosque">
    <meta name="author" content="Manuel Arevalo - Lina Avila - Diego Vargas - Juan VIllamil">
    <meta name="description" content="Proyecto De Grado">
    <!-- Estilos -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/horarios.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="application/javascript" src="../js/index.js"></script>
    <script type="application/javascript" src="../js/horarios.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon-small.png">

    <style>
        #map {
            height: 400px;
            width: 80%;
            margin-left: 10%;
        }
    </style>
</head>
<body>
<?php
include('../back/conection.php');

if (isset($_GET['id'])){
    $idHorario = $_GET['id'];
}

$consulta = mysqli_query($con,"SELECT * FROM `horarios` WHERE IdHorario='" . $idHorario . "';");
$prueba = mysqli_fetch_array($consulta);

    /*for ($i=0; $i<=3; $i++){
        echo $prueba[$i] . "<br>";
    }*/


?>
<div>
    <div class="main-container">
        <header class="block">
            <a href="index.php"><img id="logo" src="../img/Unbosque.jpg"></a>
            <ul class="header-menu horizontal-list">
                <li>
                    <?php
                    if (isset($_SESSION['username'])){
                        if ($_SESSION['perfil']=="estudiante"){
                            Header("Location: index.php");
                        }else{
                            if ($_SESSION['perfil']=="admin"){
                                echo "<a class=\"header-menu-tab Setting\" href=\"horarios-admin.php\" style=\"border-bottom: 4px solid #11a8ab;\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Horarios</a>";
                            }else{
                                Header("Location: index.php");
                            }

                        }
                    }else {
                        Header("Location: index.php");
                    }
                    ?>

                </li>
                <li style="z-index: 2">
                    <?php
                    if (isset($_SESSION['username'])){
                        if ($_SESSION['perfil']=="estudiante"){
                            echo "<a class=\"header-menu-tab\" href=\"rutas.php\"><span
                                    class=\"icon fontawesome-user scnd-font-color\"></span>Rutas</a>";
                        }else{
                            if ($_SESSION['perfil']=="admin"){
                                echo "<a class=\"header-menu-tab\" href='#'><span
                                    class=\"icon fontawesome-user scnd-font-color\"></span>Rutas</a>
                                    <ul id='submenu'>
                                        <li><a href=\"#\">Rutas</a></li><br>
                                        <li><a href=\"#\">Paradas</a></li>
                                        <li><a href=\"#\">Vehiculos</a></li>
                                        <li><a href=\"#\">Conductores</a></li>
                                    </ul>";
                            }else{
                                echo "<a class=\"header-menu-tab\" href=\"rutas.php\"><span
                                    class=\"icon fontawesome-user scnd-font-color\"></span>Rutas</a>";
                            }

                        }
                    }else {
                        echo "<a class=\"header-menu-tab\" href=\"rutas.php\"><span
                                    class=\"icon fontawesome-user scnd-font-color\"></span>Rutas</a>";
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['username'])){
                        echo "<a class=\"header-menu-tab\" href=\"reservas.php\"><span
                                    class=\"icon fontawesome-envelope scnd-font-color\"></span>Reservas</a>";
                    }else{
                        echo "<a class=\"header-menu-tab\" style='cursor: pointer;' onclick='sinLogueo()'><span
                                    class=\"icon fontawesome-envelope scnd-font-color\"></span>Reservas</a>";
                    }
                    ?>

                </li>
                <li>
                    <?php
                    if (isset($_SESSION['username'])){
                        echo "<a class=\"header-menu-tab\" href=\"pagos.php\"><span
                                    class=\"icon fontawesome-envelope scnd-font-color\"></span>Pagos</a>";
                    }else{
                        echo "<a class=\"header-menu-tab\" style='cursor: pointer;' onclick='sinLogueo()'><span
                                    class=\"icon fontawesome-envelope scnd-font-color\"></span>Pagos</a>";
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['username'])){
                        if ($_SESSION['perfil']=="estudiante"){
                            echo "<a class=\"header-menu-tab Setting\" href=\"news.php\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Noticias y Novedades</a>";
                        }else{
                            if ($_SESSION['perfil']=="admin"){
                                echo "<a class=\"header-menu-tab Setting\" href=\"contenido-admin.php\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Contenido</a>";
                            }else{
                                echo "<a class=\"header-menu-tab Setting\" href=\"news.php\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Noticias y Novedades</a>";
                            }

                        }
                    }else {
                        echo "<a class=\"header-menu-tab Setting\" href=\"news.php\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Noticias y Novedades</a>";
                    }
                    ?>
                    <!--<a class="header-menu-tab" href="news.php"><span
                                class="icon fontawesome-star-empty scnd-font-color"></span>Noticias y Novedades</a>-->
                </li>
            </ul>
            <div class="profile-menu">
                <?php
                //session_start();
                //$_SESSION['username'] = null;
                if(isset($_SESSION['username'])){
                    if($_SESSION['username']!= null){
                        echo "<label style='cursor: pointer'>" . $_SESSION['username'] . "</label> 
                        <a href='../back/cerrar.php'><img src='../img/logout.png' style='width: 10%'></a>";
                    }else {
                        echo "<button id='login' class='btn waves-effect waves-light'>Login</button>";
                    }
                }else{
                    echo "<button id='login' class='btn waves-effect waves-light'>Login</button>";
                }
                ?>
            </div>
        </header>
    </div>
    <div>
        <a href="horarios-admin.php" id="volver">Volver</a>
        <header id="crear-header">Editar Horarios</header>
        <form method="post" action="../back/editarHorario.php" id="crear">
            <label for="dias" class="titulos">Día</label>
            <select id="dias" name="dias">
                <?php
                    $_SESSION['idHorario']=$prueba[0];
                    if ($prueba[1] == "lunes"){
                        echo "<option value=\"lunes\" selected>Lunes</option>
                                <option value=\"martes\">Martes</option>
                                <option value=\"miercoles\">Miercoles</option>
                                <option value=\"jueves\">Jueves</option>
                                <option value=\"viernes\">Viernes</option>
                                <option value=\"sabado\">Sabado</option>
                                <option value=\"domingo\">Domingo</option>";
                    }else{
                        if ($prueba[1] == "martes"){
                            echo "<option value=\"lunes\">Lunes</option>
                                <option value=\"martes\" selected>Martes</option>
                                <option value=\"miercoles\">Miercoles</option>
                                <option value=\"jueves\">Jueves</option>
                                <option value=\"viernes\">Viernes</option>
                                <option value=\"sabado\">Sabado</option>
                                <option value=\"domingo\">Domingo</option>";
                        }else{
                            if ($prueba[1] == "miercoles"){
                                echo "<option value=\"lunes\">Lunes</option>
                                <option value=\"martes\">Martes</option>
                                <option value=\"miercoles\" selected>Miercoles</option>
                                <option value=\"jueves\">Jueves</option>
                                <option value=\"viernes\">Viernes</option>
                                <option value=\"sabado\">Sabado</option>
                                <option value=\"domingo\">Domingo</option>";
                            }else{
                                if ($prueba[1] == "jueves"){
                                    echo "<option value=\"lunes\">Lunes</option>
                                    <option value=\"martes\">Martes</option>
                                    <option value=\"miercoles\" >Miercoles</option>
                                    <option value=\"jueves\" selected>Jueves</option>
                                    <option value=\"viernes\">Viernes</option>
                                    <option value=\"sabado\">Sabado</option>
                                    <option value=\"domingo\">Domingo</option>";
                                    }else{
                                    if ($prueba[1] == "viernes"){
                                        echo "<option value=\"lunes\">Lunes</option>
                                    <option value=\"martes\">Martes</option>
                                    <option value=\"miercoles\" >Miercoles</option>
                                    <option value=\"jueves\">Jueves</option>
                                    <option value=\"viernes\" selected>Viernes</option>
                                    <option value=\"sabado\">Sabado</option>
                                    <option value=\"domingo\">domingo</option>";
                                    }else{
                                        if ($prueba[1] == "sabado") {
                                            echo "<option value=\"lunes\">Lunes</option>
                                            <option value=\"martes\">Martes</option>
                                            <option value=\"miercoles\" >Miercoles</option>
                                            <option value=\"jueves\">Jueves</option>
                                            <option value=\"viernes\">Viernes</option>
                                            <option value=\"sabado\" selected>Sabado</option>
                                            <option value=\"domingo\">Domingo</option>";
                                        }else{
                                            echo "<option value=\"lunes\">Lunes</option>
                                            <option value=\"martes\">Martes</option>
                                            <option value=\"miercoles\" >Miercoles</option>
                                            <option value=\"jueves\">Jueves</option>
                                            <option value=\"viernes\">Viernes</option>
                                            <option value=\"sabado\">Sabado</option>
                                            <option value=\"domingo\" selected>Domingo</option>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                ?>
            </select>
            <br>
            <label for="hora" class="titulos">Hora</label>
            <?php
            echo "<input required type='time' name='hora' id='hora' value='" . $prueba[2] . "'>";
            ?>
            <br>
            <label for="tipo" class="titulos">Tipo de servicio</label>
            <select id="tipo" name="tipo" required>
                <?php
                if (strpos($prueba[3], 'bus')!==false){
                    echo "<option value='bus' selected>Bus</option>
                    <option value='tren'>Tren</option>";
                }else{
                    echo "<option value='bus'>Bus</option>
                    <option value='tren' selected>Tren</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" id="btnHorario"><br><br>
        </form>
    </div>


