<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mach mal hinne</title>
</head>
<body>
    

<h3>^_^Eintragen^_^</h3>

<?php

    include "db_in_pruefung.php";

    echo "<hr>Alles ok bei dir?<hr>";

    // $einEngel="LOAD DATA INFILE './CSV&TXT/engel.csv' INTO TABLE engel";
    // if(mysqli_query($link,$einEngel))
    // {
    //     echo "Erstmall drin<br>";
    // }
    // else
    // {
    //     echo "Nicht ganz richtig<br>";
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
        {
            echo "<hr>Zeile ist dring<hr>";
        }
        else 
        {
            echo "<hr>Falsch beim Einfuegen<hr>";
        }

    }

    fclose($csvDatei);

    // $line=fgetcsv($csvDatei,300,';');
    
    $alterEng="ALTER TABLE engel MODIFY dienstgrad varchar(5)";
    if(mysqli_query($link,$alterEng))
    {
        echo "<hr>Typ anders<hr>";
    }
    else
    {
        echo "<hr>Typ wechselt nicht<hr>";

    }

    $updateEng="UPDATE engel SET dienstgrad = CONCAT(dienstgrad,'(m)')";
    if(mysqli_query($link,$updateEng))
    {
        echo "<hr>Alles männer hier<hr>";
    }
    else
    {
        echo "<hr>Nicht ganz so männlich<hr>";

    }



?>



</body>
</html>