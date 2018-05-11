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
<div>
    <div class="main-container">
        <header class="block">
            <a href="index.php"><img id="logo" src="../img/Unbosque.jpg"></a>
            <ul class="header-menu horizontal-list">
                <li>
                    <a class="header-menu-tab Setting" href="horarios.php"
                       style="border-bottom: 4px solid #11a8ab;"><span class="icon entypo-cog scnd-font-color"></span>Horarios</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="rutas.php"><span
                                class="icon fontawesome-user scnd-font-color"></span>Rutas</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="#"><span class="icon fontawesome-envelope scnd-font-color"></span>Reservas</a>
                    <!--<a class="header-menu-number" href="#">5</a>-->
                </li>
                <li>
                    <a class="header-menu-tab" href="#"><span
                                class="icon fontawesome-star-empty scnd-font-color"></span>Pagos</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="#"><span
                                class="icon fontawesome-star-empty scnd-font-color"></span>Noticias y Novedades</a>
                </li>
            </ul>
            <div class="profile-menu">
                <?php
                echo "<button id='login' class='btn waves-effect waves-light'>Login</button>";
                ?>

            </div>
        </header>
    </div>
    <div>
        <label id="texto">Para filtrar por servicio, dale click a la opcion que desees</label><br><br>
        <img src="../img/bus-icon.png" id="bus">
        <img src="../img/tren-icon.png" id="tren">
    </div>
    <div id="horariosBus" style="display: none">
        <?php
            include('../back/conection.php');
            echo "<div id=\"listado\" name=\"listado\">
            <header>Horarios Bus</header>";
            $consulta = mysqli_query($con,"SELECT `dia`, `Hora` FROM `horarios` WHERE `servicio`='bus' ORDER BY `dia`, `Hora`;");
            /*$lconsulta = mysqli_fetch_array($consulta);
            $long = count($lconsulta);*/
            echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Hora</th></tr></thead>";
            while ($lconsulta = mysqli_fetch_array($consulta)){
                echo "<tr>";
                for ($i = 0; $i <= 1; $i++){
                    if ($lconsulta[$i] == '1'){
                        echo "<td>Lunes</td>";
                    }else{
                        if ($lconsulta[$i] == '2'){
                            echo "<td>Martes</td>";
                        }else{
                            if ($lconsulta[$i] == '3'){
                                echo "<td>Miercoles</td>";
                            }else{
                                if ($lconsulta[$i] == '4'){
                                    echo "<td>Jueves</td>";
                                }else{
                                    if ($lconsulta[$i] == '5'){
                                        echo "<td>Viernes</td>";
                                    }else {
                                        echo "<td>" . $lconsulta[$i] . "</td>";
                                    }
                                }
                            }
                        }
                    }
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
        $consulta = mysqli_query($con,"SELECT `dia`, `Hora` FROM `horarios` WHERE `servicio`='tren' ORDER BY `dia`, `Hora`;");
        /*$lconsulta = mysqli_fetch_array($consulta);
        $long = count($lconsulta);*/
        echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Hora</th></tr></thead>";
        while ($lconsulta = mysqli_fetch_array($consulta)){
            echo "<tr>";
            for ($i = 0; $i <= 1; $i++){
                if ($lconsulta[$i] == '1'){
                    echo "<td>Lunes</td>";
                }else{
                    if ($lconsulta[$i] == '2'){
                        echo "<td>Martes</td>";
                    }else{
                        if ($lconsulta[$i] == '3'){
                            echo "<td>Miercoles</td>";
                        }else{
                            if ($lconsulta[$i] == '4'){
                                echo "<td>Jueves</td>";
                            }else{
                                if ($lconsulta[$i] == '5'){
                                    echo "<td>Viernes</td>";
                                }else {
                                    echo "<td>" . $lconsulta[$i] . "</td>";
                                }
                            }
                        }
                    }
                }
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
        $consulta = mysqli_query($con,"SELECT `dia`, `Hora`, `Servicio` FROM `horarios` ORDER BY `dia`, `Hora`;");
        /*$lconsulta = mysqli_fetch_array($consulta);
        $long = count($lconsulta);*/
        echo "<table id='horarios-bus'><thead><tr><th>Día</th><th>Hora</th><th>Servicio</th></tr></thead>";
        while ($lconsulta = mysqli_fetch_array($consulta)){
            echo "<tr>";
            for ($i = 0; $i <= 2; $i++){
                if ($lconsulta[$i] == '1'){
                    echo "<td>Lunes</td>";
                }else{
                    if ($lconsulta[$i] == '2'){
                        echo "<td>Martes</td>";
                    }else{
                        if ($lconsulta[$i] == '3'){
                            echo "<td>Miercoles</td>";
                        }else{
                            if ($lconsulta[$i] == '4'){
                                echo "<td>Jueves</td>";
                            }else{
                                if ($lconsulta[$i] == '5'){
                                    echo "<td>Viernes</td>";
                                }else {
                                    if ($lconsulta[$i] == "bus"){
                                        echo "<td class='bus-img' style='cursor: pointer'><img src='../img/bus-icon.png' style='width: 50%;'><br>Bus</td>";
                                    }else{
                                        if ($lconsulta[$i] == "tren"){
                                            echo "<td class='tren-img' style='cursor: pointer'><img src='../img/tren-icon.png' style='width: 50%;'><br>Tren</td>";
                                        }else{
                                            echo "<td>" . $lconsulta[$i] . "</td>";
                                        }
                                    }
                                }
                            }
                        }
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
                    <img src="../img/Unbosque.jpg" style="width: 45%;" alt="UnBosque" class="img-logo">
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