<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mach mal hinne</title>
</head>
  <?php
    session_name('login');
    session_start();
  ?>
<body>
    

<h3>^_^Eintragen^_^</h3>

<?php

    include "./db_init.php";

    echo "<hr>Alles ok bei dir?<hr>";

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

    while (($data = fgetcsv($csvDatei, 1000, ";")) !== FALSE) {
        $num = count($data);

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
            echo "<hr>Engel ist dring<hr>";
        else
            echo "<hr>Falsch beim Einfuegen<hr>";

    }

    fclose($csvDatei);

    // $line=fgetcsv($csvDatei,300,';');
    
    $alterEng="ALTER TABLE engel MODIFY dienstgrad varchar(5)";

    if(mysqli_query($link,$alterEng))
        echo "<hr>Typ anders<hr>";
    else
        echo "<hr>Typ wechselt nicht<hr>";

    $updateEng="UPDATE engel SET dienstgrad = CONCAT(dienstgrad,'(m)')";

    if(mysqli_query($link,$updateEng))
        echo "<hr>Alles männer hier<hr>";
    else
        echo "<hr>Nicht ganz so männlich<hr>";

    $insertEng="INSERT INTO engel (e_name,dienstgrad,funktion,aufgabe) VALUES
        ('Antonia','5(w)','Köchin','Kochen'),('Miranda','3(w)','Reinigungskraft','Böden wischen, Staub saugen'),
        ('Anastasia','6(w)','Chef-Sekretärin','Korrespondenz, Repräsentationsaufgaben'),('Magdalena','4(w)','Sekretärin','Büroarbeiten erledigen'),
        ('Notburga','2(w)','Gärtnerin','Gemüse pflegen')";

    if(mysqli_query($link,$insertEng))
        echo "<hr>Erfolgreich Weiblich drin<hr>";
    else
        echo "<hr>Keine Weiblich drin<hr>";


    // $einkind="load data infile './csv&txt/empfaenger.csv' into table kinder";
    // if(mysqli_query($link,$einkind))
    //     echo "erstmall kinder drin<br>";
    // else            
    //     echo "nicht kinder richtig<br>";


    $Datei_name="./CSV&TXT/geschenke.csv";
    $Tabllen_name='spielzeug';

    $csvDatei=fopen($Datei_name,'r');

    while (($data = fgetcsv($csvDatei, 1000, ";")) !== FALSE) {

        $erstell="INSERT INTO $Tabllen_name VALUES(
            \"$data[0]\",\"$data[1]\",\"$data[2]\",\"$data[3]\",\"$data[4]\",\"$data[5]\",\"$data[6]\",\"$data[7]\")";
    
        if(mysqli_query($link,$erstell))
            echo "<hr>$Tabllen_name ist drin<hr>";
        else
            echo "<hr>Falsch beim Einfuegen<hr>";
        }

        fclose($csvDatei);

        $Datei_name="./CSV&TXT/empfaenger.csv";
        $Tabllen_name='kinder';
    
        $csvDatei=fopen($Datei_name,'r');
    
        while (($data = fgetcsv($csvDatei, 1000, ";")) !== FALSE) {
    
            $erstell="INSERT INTO $Tabllen_name VALUES(
                \"$data[0]\",\"$data[1]\",\"$data[2]\",\"$data[3]\",\"$data[4]\",\"$data[5]\",\"$data[6]\")";
        
            if(mysqli_query($link,$erstell))
                echo "<hr>$Tabllen_name ist drin<hr>";
            else
                echo "<hr>Falsch beim Einfuegen<hr>";
            }
    
            fclose($csvDatei);

        $insertEng="INSERT INTO loginUser VALUES
            ('admin','admin')";
    
        if(mysqli_query($link,$insertEng))
            echo "<hr>Erfolgreich Admin drin<hr>";
        else
            echo "<hr>Keine Admin drin<hr>";
    

    

    // $eingeschenk="LOAD DATA INFILE './csv&txt/geschenke.csv' into table spielzeug";
    // if(mysqli_query($link,$eingeschenk))
    //     echo "erstmall spielzeug drin<br>";
    // else            
    //     echo "nicht spielzeug richtig<br>";

    

?>

</body>
</html>