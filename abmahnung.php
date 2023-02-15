<!--
    Autor: Simon Kleinschmidt, Alex Glaser, Joseph Weiß
    erstellt am: 08.02.2023   zuletzt geändert: 15.02.2023
-->

<?php
  session_name('login');
  session_start();

require("./db_init.php");

$engelName = $_POST['e_name'];
$grundAbmahnung = $_POST['grund_abmahung'];

// print_r($engelName);


// Abfrage in Engel auf Name
$query = "SELECT * FROM engel WHERE e_name='".$engelName."'" ;
$result = mysqli_query($link, $query);

$dienstgrad = 0;

if (mysqli_num_rows($result) > 0) 
{
    $row = mysqli_fetch_assoc($result);
    $dienstgrad = substr($row['dienstgrad'], 0, 1) - 1;
    print_r($dienstgrad);

    $dienstgrad .= substr($row['dienstgrad'], 1);
    print_r($dienstgrad);
} 
else 
    echo "Kein Engel mit diesem Namen gefunden";


//$query = "SELECT $engelName FROM engel";
$query = "UPDATE engel SET dienstgrad = '$dienstgrad', abmahnung = '$grundAbmahnung' WHERE e_name = '".$engelName."'";

$result = mysqli_query($link, $query);

include("./w_engel.php");