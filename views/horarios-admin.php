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
                                        <li><a href=\"rutas-admin.php\">Rutas</a></li><br>
                                        <li><a href=\"paradas-admin.php\">Paradas</a></li>
                                        <li><a href=\"vehiculos-admin.php\">Vehiculos</a></li>
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
        <a href="crear-horario.php">Crear horario</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="importar-horario.php">Importar Horarios</a>
<?php
        $id_eliminar = null;
        $dia_eliminar = null;
        $hora_eliminar = null;
        echo "<div id=\"listado-admin\" name=\"listado-admin\">
        <header>Horarios</header>";
        $consulta = mysqli_query($con,"SELECT `IdHorario`, `dia`, `Hora`, `servicio` FROM `horarios` ORDER BY `orden`, `servicio`, `Hora`;");
        /*$lconsulta = mysqli_fetch_array($consulta);
        $long = count($lconsulta);*/
        echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Hora</th><th>Servicio</th><th>Acciones</th></tr></thead>";
        while ($lconsulta = mysqli_fetch_array($consulta)){
            $contador = 0;
            echo "<tr>";
            for ($i = 1; $i <= 3; $i++){
                if (strpos($lconsulta[$i], 'bus')!==false){
                    $id_eliminar = $lconsulta[$contador];
                    echo "<td><label style='margin-left: 10px; text-transform: capitalize '>" . $lconsulta[$i] . "</label></td>
                          <td><a href='editar-horario.php?id={$lconsulta[$contador]}'><img src='../img/edit.png' style='width: 35%'></a>
                          <a class='cd-popup-trigger'><img src='../img/delete.png' style='width: 25%; cursor: pointer'></a></td>";
                    }else{
                        if (strpos($lconsulta[$i], 'tren') !== false){
                            $id_eliminar = $lconsulta[$contador];
                            echo "<td><label style='margin-left: 8px; text-transform: capitalize ''>Tren</label></td>
                                  <td><a href='editar-horario.php?id={$lconsulta[$contador]}'><img src='../img/edit.png' style='width: 35%'></a>
                                  <a class='cd-popup-trigger'><img src='../img/delete.png' style='width: 25%; cursor: pointer'></a></td>";
                            }else{
                                echo "<td style='text-transform: capitalize'>" . $lconsulta[$i] . "</td>";
                                }
                    }
            }
            $dia_eliminar = $lconsulta['dia'];
            $hora_eliminar = $lconsulta['Hora'];
            $contador++;
        }

            echo "</tr>";
        echo "</table>
        </div>";?><br>
        <a href="crear-horario.php">Crear horario</a><br>
        <a href="importar-horario.php">Importar Horarios</a><br><br>
        <a class="cd-popup-trigger2">Vaciar Horarios</a>
    </div>

    <div class="cd-popup" role="alert">
        <div class="cd-popup-container">
            <?php
            echo "<p>Desea eliminar el horario del día <font style=\"text-transform: uppercase;\"><strong>" . $dia_eliminar . "</strong></font> hora <strong>" . $hora_eliminar . "</strong>?</p>";
            ?>
            <ul class="cd-buttons">
                <?php
                echo "<li><a href='../back/eliminarHorario.php?id={$id_eliminar}'>Confirmar</a></li>
                <li><a href='horarios-admin.php'>Cancelar</a></li>"
                ?>
            </ul>
            <a href="#0" class="cd-popup-close img-replace"></a>
        </div> <!-- cd-popup-container -->
    </div> <!-- cd-popup -->

    <div class="cd-popup2" role="alert">
        <div class="cd-popup-container2">
            <?php
            echo "<p>Desea eliminar todos los horarios?</p>";
            ?>
            <ul class="cd-buttons2">
                <?php
                echo "<li><a href='../back/truncarHorarios.php'>Confirmar</a></li>
                <li><a href='horarios-admin.php'>Cancelar</a></li>"
                ?>
            </ul>
            <a href="#0" class="cd-popup-close2 img-replace2"></a>
        </div> <!-- cd-popup-container -->
    </div> <!-- cd-popup -->