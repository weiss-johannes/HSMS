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
    <link rel="stylesheet" href="./css/style.css">
    <title>Mach mal hinne</title>
</head>
<body>
    

<h3>^_^Eintragen^_^</h3>

<?php

    include "./db_init.php";

    // $einengel="load data infile './csv&txt/engel.csv' into table engel";
    // if(mysqli_query($link,$einengel))
    // {
    //     echo "erstmall drin<br>";
    // }
    // else
    // {
    //     echo "nicht ganz richtig<br>";
    // }

    $csvName="./CSV&TXT/engel.csv";
    $csvDatei=fopen($csvName,'r');

    //fgetcsv gibt 1x Zeile aus der Datei aus
    while (($data = fgetcsv($csvDatei, 1000, ";")) !== FALSE) {
        $num = count($data);

        //Bei Fehlerhaften Einträgen wird anders Eingetragen
        if($num>5)
        {
            $erstell="INSERT INTO engel VALUES(
                \"$data[0]\",\"$data[1]\",\"$data[2]\",\"$data[3].$data[4]\",\"$data[5]\")";
        }
        else if($num==5)
        {
            $erstell="INSERT INTO engel VALUES(
                \"$data[0]\",\"$data[1]\",\"$data[2]\",\"$data[3]\",\"$data[4]\")";
        }
        else
        {
            $erstell="INSERT INTO engel(e_name,funktion,dienstgrad,aufgabe) VALUES(
                \"$data[0]\",\"$data[1]\",\"$data[2]\",\"$data[3]\")";
        }

        if(mysqli_query($link,$erstell))
            echo "<hr>Engel ist drin<hr>";
        else
            echo "<hr>Falsch beim Einfuegen<hr>";
    }

    fclose($csvDatei);


    // $line=fgetcsv($csvDatei,300,';');
    
    // Ändern des Datentypens von Dienstgrad
    $alterEng="ALTER TABLE engel MODIFY dienstgrad varchar(5)";

    if(mysqli_query($link,$alterEng))
        echo "<hr>Typ wurde ver&auml;ndert<hr>";
    else
        echo "<hr>Typ wechselt nicht<hr>";


    // Einfügen des männlichen Geschlechts
    $updateEng="UPDATE engel SET dienstgrad = CONCAT(dienstgrad,'(m)')";

    if(mysqli_query($link,$updateEng))
        echo "<hr>M&auml;nnlich zu Dienstgrad hinzugef&uuml;gt<hr>";
    else
        echo "<hr>Nicht ganz so m&auml;nnlich<hr>";


    // Einfügen der Weiblichen-Engel
    $insertEng="INSERT INTO engel (e_name,dienstgrad,funktion,aufgabe) VALUES
        ('Antonia','5(w)','Köchin','Kochen'),('Miranda','3(w)','Reinigungskraft','Böden wischen, Staub saugen'),
        ('Anastasia','6(w)','Chef-Sekretärin','Korrespondenz, Repräsentationsaufgaben'),('Magdalena','4(w)','Sekretärin','Büroarbeiten erledigen'),
        ('Notburga','2(w)','Gärtnerin','Gemüse pflegen')";

    if(mysqli_query($link,$insertEng))
        echo "<hr>Erfolgreich weibliche Engel drin<hr>";
    else
        echo "<hr>Keine Weiblichen drin<hr>";


    // $einkind="load data infile './csv&txt/empfaenger.csv' into table kinder";
    // if(mysqli_query($link,$einkind))
    //     echo "erstmall kinder drin<br>";
    // else            
    //     echo "nicht kinder richtig<br>";


    // Spielzeug mittels fgetcsv befühlt
    $Datei_name="./CSV&TXT/geschenke.csv";
    $Tabllen_name='spielzeug';
    
    $csvDatei=fopen($Datei_name,'r');

    while (($data = fgetcsv($csvDatei, 1000, ";")) !== FALSE) {

        $erstell="INSERT INTO $Tabllen_name VALUES(
            \"$data[0]\",\"$data[1]\",\"$data[2]\",\"$data[3]\",\"$data[4]\",\"$data[5]\",\"$data[6]\",\"$data[7]\")";
    
        if(mysqli_query($link,$erstell))
            echo "<hr>Spielzeug ist drin<hr>";
        else
            echo "<hr>Falsch Spielzeuge beim Einfuegen<hr>";
        }
    fclose($csvDatei);



    // Kinder mittels fgetcsv befühlt
    $Datei_name="./CSV&TXT/empfaenger.csv";
    $Tabllen_name='kinder';
    
    $csvDatei=fopen($Datei_name,'r');
    
    while (($data = fgetcsv($csvDatei, 1000, ";")) !== FALSE) {
    
        $erstell="INSERT INTO $Tabllen_name VALUES(
            \"$data[0]\",\"$data[1]\",\"$data[2]\",\"$data[3]\",\"$data[4]\",\"$data[5]\",\"$data[6]\")";
        
        if(mysqli_query($link,$erstell))
            echo "<hr>Kind ist drin<hr>";
        else
            echo "<hr>Falsche Kinder beim Einfuegen<hr>";
    }
    fclose($csvDatei);

    // $eingeschenk="LOAD DATA INFILE './csv&txt/geschenke.csv' into table spielzeug";
    // if(mysqli_query($link,$eingeschenk))
    //     echo "erstmall spielzeug drin<br>";
    // else            
    //     echo "nicht spielzeug richtig<br>";

    

?>

</body>
</html>