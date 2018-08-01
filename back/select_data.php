<?php

include ('conection.php');

if(isset($_POST['get_option']))
{
    $dia = $_POST['get_option'];
    $find=mysqli_query($con, "SELECT horarios.IdHorario, concat(horarios.Hora, ' - ', tipovehiculo.TipoVehiculo), 
          horarios.servicio FROM horarios INNER JOIN tipovehiculo ON (tipovehiculo.IdTipoVehiculo = horarios.servicio 
          AND tipovehiculo.Estado='1' AND horarios.dia='" . $dia . "') ORDER BY horarios.Hora ASC;");
    $contador = 0;
    //echo "<option selected>Seleccione Hora</option>";
    while($row=mysqli_fetch_array($find))
    {
        echo "<option value='" . $row[0] . "'>".$row[1]."</option>";
    }
    exit;
}
?>