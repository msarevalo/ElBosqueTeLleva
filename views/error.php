<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: index.php");
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Error | El Bosque Te LLeva</title>
    <link href="../css/error.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon-small.png">
</head>

<body>
<center>
    <svg width="145" height="200">
        <rect x="60" y="75" width="20" height="100" fill="#512920" />
        <circle cx="45" cy="75" r="40" fill="#073f11" />
        <circle cx="95" cy="75" r="40" fill="#0d6c1e" />
        <circle cx="95" cy="35" r="30" fill="#15b732" />
        <circle cx="60" cy="50" r="40" fill="#5dd166" />
    </svg>
    <div>
        500
    </div>
    <p>
        Whoops.
    </p>
    <p>
        Algo ha pasado, intenta de nuevo mas tarde
    </p><br>
    <a href="../back/cerrar.php"><button id="intentar">Reintentar</button></a>
</center>
</body>
</html>

