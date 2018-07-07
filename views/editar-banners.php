<!DOCTYPE html>
<html>
<head>
    <title>Contenido | El Bosque Te LLeva</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="application-name" content="Sistema de Reservas Universidad del Bosque">
    <meta name="author" content="Manuel Arevalo - Lina Avila - Diego Vargas - Juan VIllamil">
    <meta name="description" content="Proyecto De Grado">
    <!-- Estilos -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/banners.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="application/javascript" src="../js/index.js"></script>
    <script type="application/javascript" src="../js/horarios.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon-small.png">
</head>
<body>
<?php
include('../back/conection.php');

if (isset($_GET['id'])){
    $idBanner = $_GET['id'];
}

$consulta = mysqli_query($con,"SELECT * FROM `banners` WHERE id_img='" . $idBanner . "';");
$banner = mysqli_fetch_array($consulta);

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
                            echo "<a class=\"header-menu-tab\" href=\"rutas.php\"><span
                                    class=\"icon fontawesome-user scnd-font-color\"></span>Rutas</a>";
                        }else{
                            if ($_SESSION['perfil']=="admin"){
                                echo "<a class=\"header-menu-tab\" href='#'><span
                                    class=\"icon fontawesome-user scnd-font-color\"></span>Rutas</a>
                                    <ul id='submenu'>
                                        <li><a href=\"rutas-admin.php\">Rutas</a></li><br>
                                        <li><a href=\"paradas-admin.php\">Paradas</a></li>
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
                                echo "<a class=\"header-menu-tab Setting\" href=\"#\" style=\"border-bottom: 4px solid #11a8ab;><span
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
        <a href="banners.php" id="volver">Volver</a>
        <header id="crear-header">Editar Banner</header>
        <form method="post" action="../back/editarBanner.php" enctype="multipart/form-data" id="crear">
            <label for="bannerName" class="titulos">Nombre Banner</label>
                <?php
                $_SESSION['idBanner']=$banner[0];
                echo "<input required id='bannerName' name='bannerName' type='text' value='" . $banner[1] . "'>";
                ?>
            <br>
            <label for="orden" class="titulos">Orden</label>
            <?php
            echo "<input required type='number' name='orden' id='orden' value='" . $banner[5] . "'>";
            ?>
            <br>
            <label for="fecInicio" class="titulos">Fecha de Inicio</label>
            <?php
            echo "<input type='date' required name='fecInicio' id='fecInicio' value='" . $banner["fecha_inicio"] . "'>"
            ?>
            <br>
            <label for="fecFinal" class="titulos">Fecha de Fin</label>
            <?php
            echo "<input type='date' required name='fecFinal' id='fecFinal' value='" . $banner["fecha_final"] . "'>"
            ?>
            <br>
            <label for="actividad" class="titulos">Estado</label>
            <?php
            if ($banner["activo"]==1){
                echo "<select id=\"actividad\" name=\"actividad\">
                        <option value=\"1\" selected>Activo</option>
                        <option value=\"0\">Inactivo</option>
                      </select><br><br>";
            }else{
                echo "<select id=\"actividad\" name=\"actividad\">
                        <option value=\"1\">Activo</option>
                        <option value=\"0\" selected>Inactivo</option>
                      </select><br><br>";
            }
            ?>
            <!--<select id="actividad" name="actividad">
                <option value="1" selected>Activo</option>
                <option value="0">Inactivo</option>
            </select><br><br>-->
            <label class="file" title="">
                <input id="imagenEdt" name="imagenEdt" size="30" type="file" />
            </label><br><br>
            <?php
            echo "<img id='imgInicial' src='.." . $banner["ruta_imagen"] . $banner['nombre_img'] . "' style='width: 300px; z-index: 2; position: relative'>
            <output id=\"list\"></output>

            <script>
                function archivo(evt) {
                    var files = evt.target.files; // FileList object

                    // Obtenemos la imagen del campo \"file\".
                    for (var i = 0, f; f = files[i]; i++) {
                        //Solo admitimos imágenes.
                        if (!f.type.match('image.*')) {
                            continue;
                        }

                        var reader = new FileReader();

                        reader.onload = (function(theFile) {
                            return function(e) {
                                // Insertamos la imagen
                                document.getElementById(\"list\").innerHTML = ['<img class=\"thumb\" src=\"', e.target.result,'\" style= \"width: 250px; z-index: 1; margin-left: -300px\" title=\"', escape(theFile.name), '\"/>'].join('');
                                document.getElementById('imgInicial').style.visibility='hidden';
                            };
                        })(f);

                        reader.readAsDataURL(f);
                    }
                }

                document.getElementById('imagenEdt').addEventListener('change', archivo, false);
            </script>";
            ?>
            <br><br>
            <input type="submit" id="btnBanner"><br><br>
        </form>
    </div>