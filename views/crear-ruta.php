<!DOCTYPE html>
<html>
<head>
    <title>Rutas | El Bosque Te LLeva</title>
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
                            Header("Location: index.php");
                        }else{
                            if ($_SESSION['perfil']=="admin"){
                                echo "<a class=\"header-menu-tab\" href='#'><span
                                    class=\"icon fontawesome-user scnd-font-color\"></span>Rutas</a>
                                    <ul id='submenu'>
                                        <li><a href=\"rutas-admin.php\">Rutas</a></li><br>
                                        <li><a href=\"paradas-admin.php\">Paradas</a></li>
                                        <li><a href=\"vehiculos-admin.php\">Vehiculos</a></li>
                                        <li><a href=\"tipov-admin.php\">Tipo Vehiculos</a></li>
                                        <li><a href=\"conductores-admin.php\">Conductores</a></li>
                                        <li><a href=\"empresas-admin.php\">Empresas</a></li>
                                    </ul>";
                            }else{
                                Header("Location: index.php");
                            }

                        }
                    }else {
                        Header("Location: index.php");
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
                                echo "<a class=\"header-menu-tab Setting\" href=\"#\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Contenido</a>
                                    <ul id='submenu-contenido'>
                                        <li><a href=\"banners.php\">Banners</a></li><br>
                                        <li><a href=\"#\">Noticias</a></li>
                                    </ul>";
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
        <a href="rutas-admin.php" id="volver">Volver</a>
        <header id="crear-header">Crear Ruta</header>
        <form method="post" action="../back/crearRuta.php" id="crear">
            <label for="dias" class="titulos">Horario</label>
            <select onchange="ajaxhorario(this.value);" required id="dias" name="dias" class="select">
                <option disabled selected value="">Seleccione día</option>
                <?php
                $horario =mysqli_query($con, "SELECT `dia` FROM `horarios` GROUP BY `dia` ORDER BY `orden` ASC");
                while($row=mysqli_fetch_array($horario))
                {
                    echo "<option value='" . $row['dia'] . "' style='text-transform: capitalize'>" . $row['dia'] . "</option>";

                }
                ?>
            </select>
            <select id="horas" name="horas" required class="select">
                <option disabled selected value="">Seleccione Hora</option>
            </select>
            <br>
            <label class="titulos">Vehiculo</label>
            <select id="vehiculo" name="vehiculo" onchange="ajaxvehiculo(this.value);" required class="select">
                <option disabled selected value="">Seleccione Vehiculo</option>
                <?php
                $tvehiculo =mysqli_query($con, "SELECT `IdTipoVehiculo`, `TipoVehiculo` FROM `tipovehiculo` WHERE `Estado`=1 ORDER BY `TipoVehiculo` ASC");
                while($row=mysqli_fetch_array($tvehiculo))
                {
                    echo "<option value='" . $row['IdTipoVehiculo'] . "' style='text-transform: capitalize'>" . $row['TipoVehiculo'] . "</option>";
                }
                ?>
            </select>
            <select id="placas" name="placas" required class="select">
                <option disabled selected value="">Seleccione Placa</option>
            </select>
            <br>
            <label for="buscar" class="titulos">Conductor</label>
            <input id="buscar" placeholder="Buscar..." onchange="ajaxconductor(this.value)">
            <select id="conductor" name="conductor" class="select">
                <option disabled selected value="">Seleccione Conductor</option>
            </select>
            <br>
            <label for="origen" class="titulos">Origen-Destino</label>
            <select id="origen" name="origen" required class="select">
                <option disabled selected value="">Seleccione origen</option>
                <option value="bogota">Campus Bogota</option>
                <option value="chia">Campus Chía</option>
            </select>
            <select id="destino" name="destino" required class="select">
                <option disabled selected value="">Seleccione destino</option>
                <option value="bogota">Campus Bogota</option>
                <option value="chia">Campus Chía</option>
            </select>
            <br>
            <label for="estado" class="titulos">Estado</label>
            <select id="estado" name="estado" class="select">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            <br><br>
            <input type="submit" id="btnHorario"><br><br>
            <!--<button class="button">Submit</button>-->
        </form>
    </div>