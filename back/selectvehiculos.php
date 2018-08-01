<?php

include ('conection.php');

if(isset($_POST['get_option']))
{
    $dia = $_POST['get_option'];
    $find=mysqli_query($con, "SELECT `IdVehiculo`, concat(`Placa`, ' (',`CantidadPuestos`, ')'), `TipoVehiculo` FROM `vehiculos` WHERE `TipoVehiculo`='" . $dia . "' AND `Estado`=1 ORDER BY `Placa` ASC");
    //echo "<option selected>Seleccione Placa</option>";
    $contador = 0;
    while($row=mysqli_fetch_array($find))
    {
        echo "<option value='" . $row['IdVehiculo'] . "'>". $row[1]."</option>";
        $_SESSION['tplaca'] = $row['TipoVehiculo'];
        $contador++;
    }
    exit;
}
?>