<!--
    Autor: Simon Kleinschmidt, Alex Glaser, Joseph Weiß
    erstellt am: 08.02.2023   zuletzt geändert: 15.02.2023
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo/favicon-invert.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Alles f&uuml;r die Clicks</title>
</head>
<body>
    
<h3>( ´･･)ﾉ(._.`)INSTALL( ´･･)ﾉ(._.`)</h3>

<?php

    include "db_init.php";

    /* Verbindung mit der Datenbank herstellen */
    if(!mysqli_select_db($link, "weihnachten"))
        echo ("<h2>Konnte Verbindung zur Datenbank <b>weihnachten</b> nicht herstellen<br></h2>");
    else 
        echo "<h2>ಠ_ಠ Verbindung zur Datenbank <b>weihnachten</b> erstellt ಠ_ಠ</h2>";
    


    // Entfernen von alten Tabellen
    $drop="DROP TABLE IF EXISTS engel ";
    mysqli_query($link,$drop);

    $drop="DROP TABLE IF EXISTS spielzeug";
    mysqli_query($link,$drop);

    $drop="DROP TABLE IF EXISTS kinder";
    mysqli_query($link,$drop);

    $sql='DROP TABLE IF EXISTS login';
    $erg = mysqli_query($link, $sql);
    
    $sql='DROP TABLE IF EXISTS loginUser';
    $erg = mysqli_query($link, $sql);


    // Erstellen neuer Tabellen
    $erstEngel='CREATE TABLE IF NOT EXISTS engel
        (
            e_name varchar(20) NOT NULL,
            erzengel enum("Erzengel","Engel") DEFAULT "Engel",
            dienstgrad smallint(1) DEFAULT 1,
            funktion varchar(10) NOT NULL,
            aufgabe varchar(500),
            PRIMARY KEY (e_name)            
        )';

    // IN CSV e_name;Erzengel;dienstgrad;funktion;aufgabe 
    // bei Gabriel gesamt leiter weihnachten ohne ;

    if(mysqli_query($link,$erstEngel))
        echo "<h2>(❁´◡`❁)ENGEL SIND ZU UNS GEKOMMEN(❁´◡`❁)</h2>";

    $erstSpiel='CREATE TABLE IF NOT EXISTS spielzeug
        (
            id varchar(8) NOT NULL,
            bez varchar(200) NOT NULL,
            wert smallint(5),
            laenge smallint(3),
            breite smallint(3),
            hoehe smallint(3),
            m_alter smallint(2),
            anzahl int(10),            
            PRIMARY KEY (id)            
        )';

    // IN CSV id;bez;wert;laenge;breite;hoehe;m_alter;anzahl

    if(mysqli_query($link,$erstSpiel))
        echo "<h2>(⊙_⊙;) EINFACH SPIELZEUG-MACHER (⊙_⊙;)</h2>";
    else
        echo "Falsche Spielzeuge";


    $erstKind='CREATE TABLE IF NOT EXISTS kinder
        (
            knr int(10) AUTO_INCREMENT,
            k_name varchar(30) NOT NULL,
            vorname varchar(30) NOT NULL,
            wohnort varchar(50) NOT NULL,
            geschlecht enum("m", "w"),
            gebdat DATE,
            charakter smallint(1),
            PRIMARY KEY (knr)            
        )';

    // IN CSV knr;k_name;vorname;wohnort;geschlecht;gebdat;charakter

    if(mysqli_query($link,$erstKind))
        echo "<h2>¯\_(ツ)_/¯MEINE Kinder SIND SIE NICHT¯\_(ツ)_/¯</h2>";
    else
        echo "Falsche Kinder";

    // Tabelle für den Login
    $sql='CREATE TABLE IF NOT EXISTS loginUser
        (
            username varchar(20) NOT NULL,
            password varchar(20) NOT NULL
        )';

        if(mysqli_query($link, $sql))
            echo "<h2>Login Tabelle wurde angelegt</h2>";
        else
            echo "<h2>Beim anlegen von der Login-Tabelle ist etwas schief gelaufen :^)</h2>";
?>

</body>
</html>