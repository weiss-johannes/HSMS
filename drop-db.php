<!--
    Autor: Simon Kleinschmidt, Alex Glaser, Joseph Weiß
    erstellt am: 17.02.2023   zuletzt geändert: 17.02.2023
-->

<?php

    /******************************** Verbindungsaufbau zur Datenbank ********************************/
	$server="localhost";
	$user="root";
	$pass="";
	$dbase="weihnachten";
	
    /* Die MySQLi-Erweiterungen aktivieren - Als Ergebnis wird ein Objekt geliefert,
    worüber bestimmte Grundeinstellungen gleich bei der Server-/Datenbankverbindung
    erfolgen. Diese Methode spart im weiteren Verlauf PHP-Quellcode                 */
    $link = mysqli_init();

    /* Das Laden externer Daten in eine Tabelle ermöglichen */
    mysqli_options($link, MYSQLI_OPT_LOCAL_INFILE, true);

    /* Den UTF8-Zeichensatz zur korrekten Darstellung von Umlauten aktivieren */
    mysqli_options($link,MYSQLI_INIT_COMMAND,'SET NAMES \'utf8\'');

    /* Aufbau der Verbindung zum Datenbankserver */
    if (!$serv_verb = mysqli_real_connect($link, $server, $user, $pass)) {
        echo ("Konnte Verbindung zum Server <b>$server</b> nicht herstellen<br>");
    } else {
        //echo "Verbindung zum Server $server hergestellt.<br>";
    }
    
    $drop_db="DROP DATABASE IF EXISTS $dbase";
    if(mysqli_query($link,$drop_db))
    //echo "Datenbank wurde erstellt, da noch nicht vorhanden<br>";
?>
