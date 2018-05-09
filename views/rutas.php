<!DOCTYPE html>
<html>
<head>
    <title>Rutas | El Bosque Te LLeva</title>
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
<div>
    <div class="main-container">
        <header class="block">
            <a href="index.php"><img id="logo" src="../img/Unbosque.jpg"></a>
            <ul class="header-menu horizontal-list">
                <li>
                    <a class="header-menu-tab Setting" href="horarios.php"><span class="icon entypo-cog scnd-font-color"></span>Horarios</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="rutas.php" style="border-bottom: 4px solid #11a8ab;"><span class="icon fontawesome-user scnd-font-color"></span>Rutas</a>
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
                <?php
                include ('conection.php');
                //$_SESSION['sesion'] = null;
                if ($_SESSION['sesion']==null){
                    echo "<button id='login' class='btn waves-effect waves-light'>Login</button>";
                }else{
                    echo "<label style='cursor: pointer'>" . $_SESSION['username'] . "</label>";
                }
                ?>
            </div>
        </header>
    </div>
<div id="map"></div>
<script>
    function initMap() {
        var uluru = {lat: 4.6817907, lng: -74.0454666};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCt1omiOFwL5HrtlC0T1ZlZFzOf9OXmEaI&callback=initMap">
</script>

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
