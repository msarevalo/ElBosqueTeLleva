<!DOCTYPE html>
<html>
<head>
    <title>EL Bosque Te LLeva</title>
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
<div>
    <div class="main-container">
        <header class="block">
            <a href="index.php"><img id="logo" src="../img/Unbosque.jpg"></a>
            <ul class="header-menu horizontal-list">
                <li>
                    <a class="header-menu-tab Setting" href="#" ><span class="icon entypo-cog scnd-font-color"></span>Horarios</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="#"><span class="icon fontawesome-user scnd-font-color"></span>Rutas</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="#"><span class="icon fontawesome-envelope scnd-font-color"></span>Reservas</a>
                    <!--<a class="header-menu-number" href="#">5</a>-->
                </li>
                <li>
                    <a class="header-menu-tab" href="#"><span class="icon fontawesome-star-empty scnd-font-color"></span>Pagos</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="#"><span class="icon fontawesome-star-empty scnd-font-color"></span>Noticias y     Novedades</a>
                </li>
            </ul>
            <div class="profile-menu">
                <button id="login" class="btn waves-effect waves-light">Login</button>
            </div>
</div>
    <div id="slider">
        <a href="#" class="control_next">></a>
        <a href="#" class="control_prev"><</a>
        <ul>
            <!--<li><img src="../img/slider0.png"></li>
            <li><img src="../img/slider1.png"></li>
            <li><img src="../img/slider2.png"></li>
            <li><img src="../img/slider3.png"></li>
            <li><img src="../img/slider4.png"></li>-->
            <?php
            include ('conection.php');
            $result = mysqli_query($con,"SELECT * FROM imagenes WHERE activo='1';");
            while ($row=mysqli_fetch_array($result))
            {
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
        <form method="post" action="validar.php">
            <div class="card">
                <img src="../img/Unbosque.jpg" style="width: 45%;" alt="UnBosque" class="img-logo">
                <div class="field">
                    <span class="header">El bosque te lleva</span>
                    <div class="form-group">
                        <input type="text" required="required" name="usuario"/>
                        <label for="input" class="control-label">Usuario</label><i class="bar"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" required="required" />
                        <label for="input" class="control-label">Contraseña</label><i class="bar"></i>
                    </div>
                    <div>
                        <img src="../img/eye.png" style="width: 8%; opacity: 0.5;" id="eye">
                        <label id="mostrar" style="opacity: 0.5;">  Ver Contraseña</label><br><br>
                    </div>
                    <button id="entrar" type="submit">Entrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>