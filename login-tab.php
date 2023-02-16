<?php
require("db_init.php");
    
$sql = 'DROP TABLE IF EXISTS loginUser';
$erg = mysqli_query($link, $sql);

    // Tabelle für den Login
    $sql = 'CREATE TABLE IF NOT EXISTS loginUser (
            username varchar(20) NOT NULL,
            password varchar(20) NOT NULL
            )';

        if (mysqli_query($link, $sql))
            echo "<h2>Login Tabelle wurde angelegt</h2>";
        else
            echo "<h2>Beim anlegen von der Login-Tabelle ist etwas schief gelaufen :^)</h2>";

    // Benutzer für die Login-Tabelle hinzufügen
    $insertEng = "INSERT INTO loginUser VALUES ('admin','admin')";
    
    if(mysqli_query($link,$insertEng))
        echo "<hr>Erfolgreich Admin drin<hr>";
    else
        echo "<hr>Keine Admin drin<hr>";
?>