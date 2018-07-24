<!DOCTYPE html>
<html>
<head>
    <title>Conductores | El Bosque Te LLeva</title>
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
    $idConductor = $_GET['id'];
}

$consulta = mysqli_query($con,"SELECT * FROM `conductores` WHERE IdConductor='" . $idConductor . "';");
$conductor = mysqli_fetch_array($consulta);

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
    <div style="margin-left: 4%">
        <a href="conductores-admin.php" id="volver">Volver</a>
        <header id="crear-header">Editar Conductor</header>
        <form method="post" action="../back/editarConductor.php" id="crear">
            <label for="tdocumento" class="titulos">Tipo de Documento</label>
            <select id="tdocumento" name="tdocumento" required>
                <?php
                $_SESSION['idConductor']=$conductor[0];
                if ($conductor[1] == "CC"){
                    echo "<option value='CC' selected>Cedula de Ciudadania</option>
                            <option value='CE'>Cedula de Extranjeria</option>
                            <option value='NUIP'>NUIP</option>";
                }else{
                if ($conductor[1] == "CE"){
                    echo "<option value='CC'>Cedula de Ciudadania</option>
                            <option value='CE' selected>Cedula de Extranjeria</option>
                            <option value='NUIP'>NUIP</option>";
                }else{
                    if ($conductor[1] == "NUIP") {
                        echo "<option value='CC'>Cedula de Ciudadania</option>
                            <option value='CE'>Cedula de Extranjeria</option>
                            <option value='NUIP' selected>NUIP</option>";
                    }
                }
                }
                ?>
            </select>
            <br>
            <label for="documento" class="titulos">Numero de Documento</label>
            <?php
            echo "<input required type='number' name='documento' id='documento' value='" . $conductor['NI'] . "'>"
            ?>
            <br>
            <label for="nombre" class="titulos">Nombres</label>
            <?php
            echo "<input required type='text' name='nombre' id='nombre' placeholder='Nombres' value='" . $conductor['Nombres'] . "'>"
            ?>
            <br>
            <label for="apellido" class="titulos">Apellidos</label>
            <?php
            echo "<input required type='text' name='apellido' id='apellido' placeholder='Apellidos' value='" . $conductor['Apellidos'] . "'>"
            ?>
            <br>
            <label for="empresa" class="titulos">Empresa</label>
            <select id="empresa" name="empresa" required>
                <?php
                $consulta = mysqli_query($con,"SELECT `IdEmpresa`,`NombreEmpresa` FROM `empresas` WHERE `Estado`=1 ORDER BY `NombreEmpresa` ASC;");
                while ($lconsulta = mysqli_fetch_array($consulta)){
                    for ($i = 1; $i <= 1; $i++) {
                        if ($lconsulta['IdEmpresa'] == $conductor['Empresa']) {
                            echo "<option selected value='" . $lconsulta['IdEmpresa'] . "'>" . $lconsulta['NombreEmpresa'] . "</option>";
                        } else {
                            echo "<option value='" . $lconsulta['IdEmpresa'] . "'>" . $lconsulta['NombreEmpresa'] . "</option>";
                        }
                    }
                }
                ?>
            </select>
            <br>
            <label for="telefono" class="titulos">Telefono</label>
            <?php
            echo "<input id='telefono' name='telefono' type='number' min='3000000000' max='3509999999' value='" . $conductor['Telefono'] . "'>";
            ?>
            <br>
            <label for="estado" class="titulos">Estado</label>
            <select id="estado" name="estado" required>
                <?php
                if ($conductor['Estado']==='1'){
                    echo "<option value='1' selected>Activo</option>
                    <option value='0'>Inactivo</option>";
                }else{
                    echo "<option value='1'>Activo</option>
                    <option value='0' selected>Inactivo</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="submit" id="btnHorario"><br><br>
        </form>
    </div>