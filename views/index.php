<!DOCTYPE html>
<html>
<head>
    <title>Home | El Bosque Te LLeva</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="application-name" content="Sistema de Reservas Universidad del Bosque">
    <meta name="author" content="Manuel Arevalo - Lina Avila - Diego Vargas - Juan VIllamil">
    <meta name="description" content="Proyecto De Grado">
    <!-- Estilos -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="application/javascript" src="../js/index.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon-small.png">

</head>
<body>
<?php
include('../back/conection.php');
?>
<div>
    <div class="main-container" style="z-index: 2">
        <header class="block">
            <nav>
                <a href="index.php"><img id="logo" src="../img/Unbosque.jpg"></a>
                <ul class="header-menu horizontal-list">
                    <li>
                        <?php
                        if (isset($_SESSION['username'])){
                            if ($_SESSION['perfil']=="estudiante"){
                                echo "<a class=\"header-menu-tab Setting\" href=\"horarios.php\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Horarios</a>";
                            }else{
                                if ($_SESSION['perfil']=="admin"){
                                echo "<a class=\"header-menu-tab Setting\" href=\"horarios-admin.php\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Horarios</a>";
                                }else{
                                    echo "<a class=\"header-menu-tab Setting\" href=\"horarios.php\"><span
                                    class=\"icon entypo-cog scnd-font-color\"></span>Horarios</a>";
                                }

                            }
                        }else {
                            echo "<a class=\"header-menu-tab Setting\" href=\"horarios.php\"><span
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
                  //include('../back/conection.php');
                  //$_SESSION['username'] = null;
                  if(isset($_SESSION['username'])){
                      if($_SESSION['username']!= null){
                      echo "<a><label style='cursor: pointer'>" . $_SESSION['username'] . "</label></a>
                        <a href='../back/cerrar.php'><img src='../img/logout.png' style='width: 10%'></a>";
                      }else {
                          echo "<button id='login' class='btn waves-effect waves-light'>Login</button>";
                      }
                  }else{
                      echo "<button id='login' class='btn waves-effect waves-light'>Login</button>";
                  }
                ?>
                </div>
            </nav>
        </header>
    </div>
    <div id="slider" style="z-index: 1">
        <a href="#" class="control_next">></a>
        <a href="#" class="control_prev"><</a>
        <ul>
            <!--<li><img src="../img/slider0.png"></li>
            <li><img src="../img/slider1.png"></li>
            <li><img src="../img/slider2.png"></li>
            <li><img src="../img/slider3.png"></li>
            <li><img src="../img/slider4.png"></li>-->
            <?php
            //include('../back/conection.php');
            $result = mysqli_query($con, "SELECT * FROM banners WHERE activo='1' ORDER BY orden;");
            while ($row = mysqli_fetch_array($result)) {
                /*almacenamos el nombre de la ruta en la variable $ruta_img*/
                //echo  $row["ruta_imagen"] . $row['nombre_img'] . '<br>';
                echo "<li><img src='.." . $row["ruta_imagen"] . $row['nombre_img'] . "'></li>";
            }
            ?>

        </ul>
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
</body>
</html>