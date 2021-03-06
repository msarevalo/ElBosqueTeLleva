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
                            echo "<a class=\"header-menu-tab Setting\" href=\"horarios.php\" style=\"border-bottom: 4px solid #11a8ab;\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Horarios</a>";
                        }else{
                            if ($_SESSION['perfil']=="admin"){
                                echo "<a class=\"header-menu-tab Setting\" href=\"horarios-admin.php\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Horarios</a>";
                            }else{
                                echo "<a class=\"header-menu-tab Setting\" href=\"horarios.php\" style=\"border-bottom: 4px solid #11a8ab;\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Horarios</a>";
                            }

                        }
                    }else {
                        echo "<a class=\"header-menu-tab Setting\" href=\"horarios.php\" style=\"border-bottom: 4px solid #11a8ab;\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Horarios</a>";
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
                                        <li><a href=\"rutas-admin.php\">Rutas</a></li><br>
                                        <li><a href=\"paradas-admin.php\">Paradas</a></li>
                                        <li><a href=\"vehiculos-admin.php\">Vehiculos</a></li>
                                        <li><a href=\"tipov-admin.php\">Tipo Vehiculos</a></li>
                                        <li><a href=\"conductores-admin.php\">Conductores</a></li>
                                        <li><a href=\"empresas-admin.php\">Empresas</a></li>
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
        <label id="texto">Para filtrar por servicio, dale click a la opcion que desees</label><br><br>
        <img src="../img/bus-icon.png" id="bus">
        <img src="../img/tren-icon.png" id="tren">
        <br><br>
        <!--<form>
        <label>Filtrar por</label><br><br>
        <label for="dias">Día</label>
        <select id="dias">
            <option value="0">Seleccione</option>
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miercoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sabado</option>
            <option value="7">Domingo</option>
        </select>
        <label for="jornada">Jornada</label>
        <select id="jornada">
            <option value="0">Seleccione</option>
            <option value="1">Día</option>
            <option value="2">Tarde</option>
        </select><br>
        <input type="submit" value="Filtrar" onclick="">
        </form>-->
    </div>
    <div id="horariosBus" style="display: none">
        <?php
            //include('../back/conection.php');
            echo "<div id=\"listado\" name=\"listado\">
            <header>Horarios Bus</header>";
            $consulta = mysqli_query($con,"SELECT horarios.dia, horarios.Hora, tipovehiculo.TipoVehiculo
        FROM horarios INNER JOIN tipovehiculo ON (tipovehiculo.IdTipoVehiculo = horarios.servicio AND tipovehiculo.Estado = 1 AND horarios.servicio=1) 
        ORDER BY horarios.orden, horarios.Hora");
            /*$lconsulta = mysqli_fetch_array($consulta);
            $long = count($lconsulta);*/
            echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Hora</th></tr></thead>";
            while ($lconsulta = mysqli_fetch_array($consulta)){
                echo "<tr>";
                for ($i = 0; $i <= 1; $i++){
                    echo "<td style='text-transform: capitalize'>" . $lconsulta[$i] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>
            </div>";
            ?>
    </div>
    <div id="horariosTren" style="display: none">
        <?php
        echo "<div id=\"listado\" name=\"listado\">
        <header>Horarios Tren</header>";
        $consulta = mysqli_query($con,"SELECT horarios.dia, horarios.Hora, tipovehiculo.TipoVehiculo
        FROM horarios INNER JOIN tipovehiculo ON (tipovehiculo.IdTipoVehiculo = horarios.servicio AND tipovehiculo.Estado = 1 AND horarios.servicio=2) 
        ORDER BY horarios.orden, horarios.Hora");
        /*$lconsulta = mysqli_fetch_array($consulta);
        $long = count($lconsulta);*/
        echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Hora</th></tr></thead>";
        while ($lconsulta = mysqli_fetch_array($consulta)){
            echo "<tr>";
            for ($i = 0; $i <= 1; $i++){
                echo "<td style='text-transform: capitalize'>" . $lconsulta[$i] . "</td>";
            }

            echo "</tr>";
        }
        echo "</table>
        </div>";
        ?>
    </div>
    <div id="horarios">
        <?php
        echo "<div id=\"listado\" name=\"listado\">
        <header>Horarios</header>";
        $consulta = mysqli_query($con,"SELECT horarios.dia, horarios.Hora, tipovehiculo.TipoVehiculo
        FROM horarios INNER JOIN tipovehiculo ON (tipovehiculo.IdTipoVehiculo = horarios.servicio AND tipovehiculo.Estado = 1) 
        ORDER BY horarios.orden, horarios.Hora");
        /*$lconsulta = mysqli_fetch_array($consulta);
        $long = count($lconsulta);*/
        echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Hora</th><th>Servicio</th></tr></thead>";
        while ($lconsulta = mysqli_fetch_array($consulta)){
            echo "<tr>";
            for ($i = 0; $i <= 2; $i++){
                if (strpos($lconsulta[$i], 'bus') !== false){
                    echo "<td class='bus-img' style='cursor: pointer'><img src='../img/bus-icon.png' style='width: 80%;'><br><label style='margin-left: 10px; cursor: pointer'>Bus</label></td>";
                }else{
                    if (strpos($lconsulta[$i], 'tren') !== false){
                        echo "<td class='tren-img' style='cursor: pointer'><img src='../img/tren-icon.png' style='width: 80%;'><br><label style='margin-left: 8px; cursor: pointer'>Tren</label></td>";
                    }else{
                        echo "<td style='text-transform: capitalize'>" . $lconsulta[$i] . "</td>";
                    }
                }

            }

            echo "</tr>";
        }
        echo "</table>
        </div>";
        ?>
    </div>

    <div class="login-popup">
        <i class="fa fa-times-circle close-icon" aria-hidden="true">X</i>
        <div class="form-body">
            <form method="post" action="../back/validar.php">
                <div class="card">
                    <a href="index.php"><img src="../img/Unbosque.jpg" style="width: 45%;" alt="UnBosque" class="img-logo"></a>
                    <div class="field">
                        <span class="header">El bosque te lleva</span>
                        <div class="form-group">
                            <input type="text" required="required" name="usuario"/>
                            <label for="input" class="control-label">Usuario</label><i class="bar"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" id="pass" name="pass" required="required"/>
                            <label for="input" class="control-label">Contraseña</label><i class="bar"></i>
                        </div>
                        <div>
                            <img src="../img/eye.png" style="width: 8%; opacity: 0.5;" id="eye">
                            <label id="mostrar" style="opacity: 0.5;"> Ver Contraseña</label><br><br>
                        </div>
                        <button id="entrar" type="submit">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>