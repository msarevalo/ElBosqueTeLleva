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