<?php
include "db_init.php";
    
$sql = 'DROP TABLE IF EXISTS loginUser';
$erg = mysqli_query($link, $sql);

    // Tabelle für den Login
    $sql_cre = 'CREATE TABLE IF NOT EXISTS loginUser (
            username varchar(20) NOT NULL,
            password varchar(20) NOT NULL
            )';

        if (mysqli_query($link, $sql_cre))
            echo "<h2>Login Tabelle wurde angelegt</h2>";
        else
            echo "<h2>Beim anlegen von der Login-Tabelle ist etwas schief gelaufen :^)</h2>";

    // Benutzer für die Login-Tabelle hinzufügen
    $insertLog = "INSERT INTO loginUser VALUES ('admin','admin')";
    
    if(mysqli_query($link,$insertLog))
        echo "<hr>Erfolgreich Admin drin<hr>";
    else
        echo "<hr>Keine Admin drin<hr>";
?>