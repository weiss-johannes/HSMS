<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alles f&uuml;r die Clicks</title>
</head>
<body>
    

<h3>( ´･･)ﾉ(._.`)INSTALL( ´･･)ﾉ(._.`)</h3>

<?php

    $link = mysqli_init();

    mysqli_connect($link,"root","");

    mysqli_options($link, MYSQLI_INIT_COMMAND, 'SET NAMES \'utf8\'');

    $fall = "DROP DATABASE IF EXISTS weihnachten";
    mysqli_query($link,$fall);

    $erst = "CREATE DATABASE weihnachten IF NOT EXISTS";
    if(mysqli_query($link,$erst))
    {
        echo "<h2>(•_•) Erstellt (•_•)</h2>";
    }

    $connect="USE weihnachten";
    if(mysqli_query($link,$connect))
    {
        echo "<h2>ಠ_ಠVerbindung zur Datenbank erstelltಠ_ಠ</h2>";
    }

    // /* Verbindung mit der Datenbank herstellen */
    // if(!mysqli_select_db($link, "weihnachten")){
    //     echo ("<h2>Konnte Verbindung zur Datenbank <b>weihnachten</b> nicht herstellen<br></h2>");
    // } else {
    //     echo "<h2>ಠ_ಠ Verbindung zur Datenbank <b>weihnachten</b> erstellt ಠ_ಠ</h2>";
    // }

?>



</body>
</html>