<!DOCTYPE html>
<html>
<head>
    <title>Rutas | El Bosque Te LLeva</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="application-name" content="Sistema de Reservas Universidad del Bosque">
    <meta name="author" content="Manuel Arevalo - Lina Avila - Diego Vargas - Juan Villamil">
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
                            Header("Location: index.php");
                        }else{
                            if ($_SESSION['perfil']=="admin"){
                                echo "<a class=\"header-menu-tab Setting\" href=\"horarios-admin.php\"><span
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
                                echo "<a class=\"header-menu-tab\" href='#' style=\"border-bottom: 4px solid #11a8ab;\"><span
                                    class=\"icon fontawesome-user scnd-font-color\" ></span>Rutas</a>
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
        <a href="crear-ruta.php">Crear Ruta</a>
        <?php
        $ruta_eliminar = null;
        echo "<div id=\"listado-admin\" name=\"listado-admin\" style='margin-left: 23%;'>
        <header>Rutas</header>";
        $consulta = mysqli_query($con,"SELECT rutas.IdRuta, horarios.dia, concat(rutas.Origen, '-', rutas.Destino), rutas.Disponibilidad FROM rutas INNER JOIN horarios ON horarios.IdHorario=rutas.IdHorario AND rutas.Estado='1' ORDER BY horarios.orden");
        /*$lconsulta = mysqli_fetch_array($consulta);
        $long = count($lconsulta);*/
        echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Origen-Destino</th><th>Disponibilidad</th><th>Acciones</th></tr></thead>";
        while ($lconsulta = mysqli_fetch_array($consulta)){
            $contador = 0;
            echo "<tr>";
            for ($i = 1; $i <= 3; $i++){
                $id_eliminar = $lconsulta[$contador];
                echo "<td style='text-transform: capitalize'>" . $lconsulta[$i] . "</td>";
            }
            echo "<td><a href='editar-ruta.php?id={$lconsulta[$contador]}'><img src='../img/edit.png' style='width: 35%'></a>
                          <a onclick='alertaRuta(" . $lconsulta[$contador] . ")'><img src='../img/delete.png' style='width: 25%; cursor: pointer'></a></td>";
            //$ruta_eliminar = $lconsulta['Placa'];
            $contador++;
        }

        echo "</tr>";
        echo "</table>
        </div>";?>
        <br>
    </div>

<?php
$ruta_eliminar = null;
$consulta2 = mysqli_query($con,"SELECT rutas.IdRuta, horarios.dia, concat(rutas.Origen, '-', rutas.Destino), rutas.Disponibilidad FROM rutas INNER JOIN horarios ON horarios.IdHorario=rutas.IdHorario AND rutas.Estado='0' ORDER BY horarios.orden");
if (mysqli_fetch_array($consulta2)!=0) {
    echo "<div id=\"listado-admin\" name=\"listado-admin\" style='margin-left: 23%;'>
        <header>Rutas - Inactivas</header>";
    $consulta = mysqli_query($con, "SELECT rutas.IdRuta, horarios.dia, concat(rutas.Origen, '-', rutas.Destino), rutas.Disponibilidad FROM rutas INNER JOIN horarios ON horarios.IdHorario=rutas.IdHorario AND rutas.Estado='0' ORDER BY horarios.orden");
    /*$lconsulta = mysqli_fetch_array($consulta);
    $long = count($lconsulta);*/
    echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Origen-Destino</th><th>Disponibilidad</th><th>Acciones</th></tr></thead>";
    while ($lconsulta = mysqli_fetch_array($consulta)) {
        $contador = 0;
        echo "<tr>";
        for ($i = 1; $i <= 3; $i++) {
            $id_eliminar = $lconsulta[$contador];
            echo "<td style='text-transform: capitalize'>" . $lconsulta[$i] . "</td>";
        }
        echo "<td><a href='editar-ruta.php?id={$lconsulta[$contador]}'><img src='../img/edit.png' style='width: 35%'></a>
                          <a onclick='alertaRuta(" . $lconsulta[$contador] . ")'><img src='../img/delete.png' style='width: 25%; cursor: pointer'></a></td>";
        //$ruta_eliminar = $lconsulta['Placa'];
        $contador++;
    }

    echo "</tr>";
    echo "</table>
        </div>";
}
?>