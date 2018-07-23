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
    <!-- icono de pestaña-->
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon-small.png">

</head>
<body onload="noVolver()">
<?php
    /*
     * conexion a base de datos *
     */
    include('../back/conection.php');
?>
<div>
    <!--
    menu principal de la pagina
    -->
    <div class="main-container" style="z-index: 2">
        <header class="block">
            <nav>
                <a href="index.php"><img id="logo" src="../img/Unbosque.jpg"></a>
                <ul class="header-menu horizontal-list">
                    <li>
                        <?php
                        /*
                         * Condicional de acuerdo al perfil del usuario link Horarios*
                         */
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
                        /*
                         * Condicional de acuerdo al perfil del usuario link Rutas*
                         */
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
                        /*
                         * Condicional sesion iniciada link Reservas *
                         */
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
                        /*
                         * Condicional sesion iniciada link Pagos *
                         */
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
                        /*
                         * Condicional de acuerdo al perfil del usuario link Noticias / contenido*
                         */
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
                  /*
                   * Boton Login / Nombre usuario si la sesion esta iniciada
                   */
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
</div>
<!--
Pop up de inicio de sesion
-->
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
<!--
Slider de la pagina principal
-->
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
            /*
             * consulta a base de datos de los banners activos.
             */
            $result = mysqli_query($con, "SELECT * FROM banners WHERE activo='1' ORDER BY orden;");
            /*
             * Se muestran los banners de la consulta
             */
            while ($row = mysqli_fetch_array($result)) {
                //echo  $row["ruta_imagen"] . $row['nombre_img'] . '<br>';
                echo "<li><img src='.." . $row["ruta_imagen"] . $row['nombre_img'] . "'></li>";
            }
            ?>

        </ul>
    </div>
    <div id="retroceso">
        <?php
        /*
         * declaracion de variables.
         */
        $transporte = null;
        $horaSalida = null;
        $offset=-18000; //UTC -5 horas Bogota, Lima, Quito (3.600s * -5 horas)
        $numeroDia="N"; //Formato día para el gmdate (muestra el numero del dia)
        $fechaDia="Y-m-d"; //formato fecha
        $horaActual="H:i:s"; //formato hora
        $ndia=gmdate($numeroDia, time()+$offset); //numero del dia dentro de la semana
        //$fdia=gmdate($fechaDia, time()+$offset); //fecha del dia actual
        $fdia=null;
        $hactual=gmdate($horaActual, time()+$offset); //hora actual
        $diaMas = $ndia+1; //dia siguiente en formato numero del dia dentro de la semana
        $valorDia = 86400; //valor de un dia en segundos
        //$sumando = gmdate($fechaDia, time()+($valorDia - $offset));
        /*
         * comparamos si el dia actual es menor a 6 (antes de sabado)
         */
        //$ndia=7;
        if ($ndia <6) {
            /*
             * consulta a base de datos donde la hora sea mayor a la hora actual y el dia sea igual al actual.
             */
            $horas = mysqli_query($con, "SELECT * FROM horarios WHERE (`Hora` > '" . $hactual . "') AND (`orden`='" . $ndia . "') ORDER BY Hora");
            $consultas = mysqli_fetch_array($horas);
            /*
             * se compara si el primer registro consultado es diferente de nulo.
             */
            if ($consultas[0] != null) {
                $transporte = $consultas[3];
                $horaSalida = $consultas[2];
                $fdia=gmdate($fechaDia, time()+$offset);//fecha del dia actual
            } else {
                /*
                 * si el resultado es nulo, se consulta nuevamente la base de datos donde el dia sea el actual mas 1
                 */
                $horas2 = mysqli_query($con, "SELECT * FROM horarios WHERE (`Hora` > '00:00:00') AND (`orden`='" . $diaMas . "') ORDER BY Hora");
                $consultas2 = mysqli_fetch_array($horas2);
                if ($consultas2[0] != null) {
                    $transporte = $consultas2[3];
                    $horaSalida = $consultas2[2];
                    $fdia = gmdate($fechaDia, time()+($valorDia + $offset)); //fecha del dia inmediatamente siguiente
                }else{
                    exit();
                }
            }
        }else {
            /*
             * Se realiza por ultima vez la consulta donde el dia sea el dia lunes
             */
            $horas3 = mysqli_query($con, "SELECT * FROM horarios WHERE (`Hora` > '00:00:00') AND (`orden`='1') ORDER BY Hora");
            $consultas3 = mysqli_fetch_array($horas3);
            if ($consultas3[0] != null) {
                $transporte = $consultas3[3];
                $horaSalida = $consultas3[2];
                if ($ndia === 6){
                    //echo "entro 6";
                    /*
                     * si es el dia sabado (6)se asigna 2 dias mas como valor del día.
                     */
                    $fdia = gmdate($fechaDia, time()+((2*$valorDia) + $offset));
                }else{
                    if ($ndia === 7){
                        //echo "entro 7";
                        /*
                         * si es el dia domingo (7)se asigna 1 dias mas como valor del día.
                         */
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
        /*
         * seccion de cuenta regresiva.
         */
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
                </div><br>";
        if (isset($_SESSION['username'])){
            if ($_SESSION['perfil']=='admin'){
                //echo "<a style='cursor: pointer; text-decoration: none; color: #9e9e9e' href='#'><label>Reservar Ahora!</label></a>";
                echo "<br>";
            }else{
                echo "<a style='cursor: pointer; text-decoration: none; color: #9e9e9e;' href='reservas.php'><label>Reservar Ahora!</label></a>";
            }
        }else{
            echo "<a style='cursor: pointer; text-decoration: none; color: #9e9e9es' onclick='sinLogueo(); arriba();'><label>Reservar Ahora!</label></a>";
        }
    echo "</div>
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
                        if (t.horas == 00 && t.minutos == 00 && t.segundos == 00){
                            location.reload(true);
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
</body>
</html>