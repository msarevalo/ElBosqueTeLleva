<?php

include ('conection.php');

if(isset($_POST['get_option']))
{
    $conductor = $_POST['get_option'];
    $find=mysqli_query($con, "SELECT `IdConductor`, concat(`Nombres`, ' ',`Apellidos`) FROM `conductores` WHERE `Estado`=1 AND (`Nombres` LIKE '%" . $conductor . "%' OR `Apellidos` LIKE '%" . $conductor . "%')");
    //echo "<option selected>Seleccione Conductor</option>";
    while($row=mysqli_fetch_array($find))
    {
        echo "<option value='" . $row['IdConductor'] . "'>".$row[1]."</option>";
    }
    exit;
}
?>