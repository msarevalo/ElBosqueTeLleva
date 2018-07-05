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
<body onload="noVolver()">
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
                    <li style="z-index: 2">
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
    <div id="retroceso">
        <?php
        /*$dias = getdate();
        print_r($dias[mday]);*/

        $transporte = null;
        $horaSalida = null;
    $offset=-18000; //converting 5 hours to seconds.
    $numeroDia="N";
    $fechaDia="Y-m-d";
    $horaActual="H:i:s";
    $ndia=gmdate($numeroDia, time()+$offset);
    $fdia=gmdate($fechaDia, time()+$offset);
    $hactual=gmdate($horaActual, time()+$offset);
    //echo gmdate("l") . "<br>";
    //echo $timeNdate . "<br>";
    /*$formato = "%u";
    $prueba = strftime($formato, time()+$offset);
    echo $prueba;*/
    $diaMas = $ndia+1;
    $valorDia = 86400;
    //$sumando = gmdate($fechaDia, time()+($valorDia - $offset));
    //echo $sumando;
        //$ndia = 7;
        if ($ndia <6) {
            $horas = mysqli_query($con, "SELECT * FROM horarios WHERE (`Hora` > '" . $hactual . "') AND (`orden`='" . $ndia . "') ORDER BY Hora");
            $consultas = mysqli_fetch_array($horas);
            if ($consultas[0] != null) {
                $transporte = $consultas[3];
                $horaSalida = $consultas[2];
                $fdia=gmdate($fechaDia, time()+$offset);
            } else {
                $horas2 = mysqli_query($con, "SELECT * FROM horarios WHERE (`Hora` > '00:00:00') AND (`orden`='" . $diaMas . "') ORDER BY Hora");
                $consultas2 = mysqli_fetch_array($horas2);
                if ($consultas2[0] != null) {
                    $transporte = $consultas2[3];
                    $horaSalida = $consultas2[2];
                    $fdia = gmdate($fechaDia, time()+($valorDia + $offset));
                }else{
                    exit();
                }
            }
        }else {
            $horas3 = mysqli_query($con, "SELECT * FROM horarios WHERE (`Hora` > '00:00:00') AND (`orden`='1') ORDER BY Hora");
            $consultas3 = mysqli_fetch_array($horas3);
            if ($consultas3[0] != null) {
                $transporte = $consultas3[3];
                $horaSalida = $consultas3[2];
                if ($ndia === 6){
                    //echo "entro 6";
                    $fdia = gmdate($fechaDia, time()+((2* $valorDia) + $offset));
                }else{
                    if ($ndia === 7){
                        //echo "entro 7";
                        $fdia = gmdate($fechaDia, time()+($valorDia + $offset));
                    }else{
                        exit();
                    }
                }
            }else{
                exit();
            }
        }

    //echo $hactual;
    echo "<div><label style='font-family: Helvetica; font-size: 18px; color: #9e9e9e;'>Proximo <strong style='font-size: 20px'>" . $transporte . " </strong>sale en:</label></div>
<div id=\"reloj\">
    <div class='contorno'>
        <span class=\"horas\"></span>
        <div class=\"texto\">Horas</div>
    </div>
    <div class='contorno'>
        <span class=\"minutos\"></span>
        <div class=\"texto\">Minutos</div>
    </div>
    <div class='contorno'>
        <span class=\"segundos\"></span>
        <div class=\"texto\">Segundos</div>
    </div>
</div>
</div>

<script>
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var segundos = Math.floor((t / 1000) % 60);
        var minutos = Math.floor((t / 1000 / 60) % 60);
        var horas = Math.floor((t / (1000 * 60 * 60)));

        //if(meses>0){
          
        return {
            'total': t,
            'horas': horas,
            'minutos': minutos,
            'segundos': segundos
        }
        
        if (horas == 0 && minutos == 0 && segundos == 0){
            location.reload(true);
        } 
        
    } 

    function initializeReloj(id, endtime) {
        var reloj = document.getElementById(id);
        var horaSpan = reloj.querySelector('.horas');
        var minutoSpan = reloj.querySelector('.minutos');
        var segundoSpan = reloj.querySelector('.segundos');

        function updateReloj() {
            var t = getTimeRemaining(endtime);
            horaSpan.innerHTML = ('0' + t.horas).slice(-2);
            minutoSpan.innerHTML = ('0' + t.minutos).slice(-2);
            segundoSpan.innerHTML = ('0' + t.segundos).slice(-2);
            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }
        updateReloj();
        var timeinterval = setInterval(updateReloj, 1000);
    }

    var deadline = new Date(Date.parse(new Date('" . $fdia . " " . $horaSalida . " UTC/GMT -5')));
    initializeReloj('reloj', deadline);
</script>"
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
</body>
</html>