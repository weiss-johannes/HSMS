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
    <title>🐣Alle meine Kinder schwimmen in dem SEE, SCHwimme iN DEm SeE, HÄndChen aus DEM waSser, Schwänze in die hoe🐤</title>
</head>
<body>
    
<?php

    require_once "db_init.php";

    $sql = "SELECT * FROM kinder";

    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);

    // Zählervariablen für späteren gebrauch
    $counterKinder=0;
    $counterKinderSpäter=0;

    if ($anzahl == 0)
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    else 
    {
        echo "<h3>Aufgabe 5a: ($anzahl) <b class='sql-befehl'>$sql</b></h3>";
        echo "<table>
                <tr>
                    <td>Id</td>
                    <td>Nachname</td>
                    <td>Vorname</td>
                    <td>Wohnort</td>
                    <td>Geschlecht</td>
                    <td>Geburtsdatum</td>
                    <td>Charakter</td>
                </tr>";
        while($fetch_list = mysqli_fetch_assoc($erg)) {
            echo "<tr>
                    <td>$fetch_list[knr]</td>
                    <td>$fetch_list[k_name]</td>
                    <td>$fetch_list[vorname]</td>
                    <td>$fetch_list[wohnort]</td>
                    <td>$fetch_list[geschlecht]</td>
                    <td>$fetch_list[gebdat]</td>
                    <td>$fetch_list[charakter]</td>
                </tr>";  
            $counterKinder++;
            $counterKinderSpäter++;
        }
        echo "</table>";
        echo "</div>";
    }
    echo "<hr>";

    // Alle Speciellen Wohnorte
    $versWohnort="SELECT DISTINCT wohnort From kinder ORDER BY wohnort ASC";
    $arr=mysqli_query($link,$versWohnort);

    echo "<br>Die verschiedenen Wohnorte: <br>";
    while($arr_a=mysqli_fetch_all($arr)) {
        foreach($arr_a as $key=> $value)
        {
            foreach($value as $value2)
                echo "<br>$value2";
        }
    }

    // Falls ungerade Anzahl an Kindern aufrunden(wahrscheinlich einfacher möglich)
    if($counterKinder%3==1)
    {
        $counterKinder/=3;
        $counterKinder+=(2/3);
    }
    else if($counterKinder%3==2)
    {
        $counterKinder/=3;
        $counterKinder+=(1/3);
    }
    else
        $counterKinder/=3;


    // Anzahl der benötigten Engel
    echo "<hr>Es werden $counterKinder Engel benötigt<hr>";
    

    // Gibt alle Kinder aus die an Weihnachten geboren wurden aus
    $gebWeihnacht="SELECT * FROM kinder WHERE gebdat LIKE '%12-24'";
    if($erg=mysqli_query($link,$gebWeihnacht))
        echo "Kinder die an Weihnachten Geburtstag haben<br><br>";
    else
        echo "Nicht Weihnachten<br>";


    while($fetch_list = mysqli_fetch_assoc($erg)) {
            echo "  $fetch_list[knr], 
                    $fetch_list[k_name],
                    $fetch_list[vorname],
                    $fetch_list[wohnort],
                    $fetch_list[geschlecht],
                    $fetch_list[gebdat],
                    $fetch_list[charakter]
                <br>";  
        }
        
    echo "<hr>";


    // Gibt alle Kinder die im December geboren sind aus
    $gebDecember="SELECT * FROM kinder WHERE gebdat LIKE '%12%'";
    if($erg=mysqli_query($link,$gebDecember))
        echo "Kinder die im December gerboren sind<br><br>";
    else
        echo "Nicht December<br>";

    while($fetch_list = mysqli_fetch_assoc($erg)) {
            echo "  $fetch_list[knr], 
                    $fetch_list[k_name],
                    $fetch_list[vorname],
                    $fetch_list[wohnort],
                    $fetch_list[geschlecht],
                    $fetch_list[gebdat],
                    $fetch_list[charakter]
                <br>";  
        }

    echo "<hr>";


    // Gibt alle Kinder die einen Charakter schlechter als 3 haben aus
    $charakter3="SELECT * FROM kinder WHERE charakter>=3 ORDER BY charakter DESC";
    if($erg=mysqli_query($link,$charakter3))
        echo "Kinder die bei Charakter schlechter als drei sind.<br><br>";
    else
        echo "Nicht Charakter<br>";

    while($fetch_list = mysqli_fetch_assoc($erg)) {
            echo "  $fetch_list[knr],
                    $fetch_list[k_name],
                    $fetch_list[vorname],
                    $fetch_list[wohnort],
                    $fetch_list[geschlecht],
                    $fetch_list[gebdat],
                    $fetch_list[charakter]
                <br>";  
        }

    echo "<hr>";


    // For-Schleife für die Charakter anzahl
    for($i=1;$i<6;$i++)
    {
        $anzCharakter="SELECT COUNT(charakter) FROM kinder WHERE charakter=$i;";
        if($erg=mysqli_query($link,$anzCharakter))
        {
            $fetch_list = mysqli_fetch_assoc($erg);
            echo "Anzahl der Kinder mit Charakter $i: &ensp; ".$fetch_list['COUNT(charakter)']."<br>";
            if($i==5)
            {
                $counterKinderSpar=$fetch_list['COUNT(charakter)'];
            }
        }
    }
    
    echo "<hr>";
    
    $counterKinderSpäter-=$counterKinderSpar;
    
    // Falls ungerade Anzahl an Kindern aufrunden(wahrscheinlich einfacher möglich)
    if($counterKinderSpäter%3==1)
    {
        $counterKinderSpäter/=3;
        $counterKinderSpäter+=(2/3);
    }
    else if($counterKinderSpäter%3==2)
    {
        $counterKinderSpäter/=3;
        $counterKinderSpäter+=(1/3);
    }
    else
        $counterKinderSpäter/=3;

    $counterKinder-=$counterKinderSpäter;

    
    // Engel die jez gebraucht werden und gesparte
    echo "Es werden nur noch $counterKinderSpäter Engel benötigt<br>";
    echo "Es wurden $counterKinder Engel gespart";
    
    echo "<hr>";


    // Datum eines Kindes verbessert
    $updKind="UPDATE kinder SET gebdat='2004-09-30' WHERE knr=14";
    if(mysqli_query($link,$updKind))
        echo "Kind wurde ausgebessert<br>";
    else
        echo "Kind war gut genug";

    echo "<hr>";


    // Wohnort der Familie ausgebessert
    $updFam="UPDATE kinder SET wohnort='Traunstein' WHERE k_name='Mayer'";
    if(mysqli_query($link,$updFam))
        echo "Familie wurde ausgebessert<br>";
    else
        echo "Kind war gut genug";

    echo "<hr>";


    // Unterdupfing ist böse 
    $updUnt="UPDATE kinder SET charakter=5 WHERE wohnort='Unterdupfing'";
    if(mysqli_query($link,$updUnt))
        echo "Unterdupfing wurde ausgemerzt<br>";
    else
        echo "Unterdupfing war gut genug";

    echo "<hr>";


    // Kind können jetzt alt werden
    $altTab="ALTER TABLE kinder ADD k_alter smallint(2)";
    if(mysqli_query($link,$altTab))
        echo "Tabelle wurde umge&auml;ndert<br>";
    else
        echo "Tabelle wurde schon ver&auml;ndert";
    
    echo "<hr>";


    // Tabelle mit Alter befüllen
    $insTab="UPDATE kinder SET k_alter = (YEAR(CURRENT_DATE) - YEAR(gebdat)) - (RIGHT(CURRENT_DATE,5) < RIGHT(gebdat,5)) ";
    if(mysqli_query($link,$insTab))
        echo "Alter wurde eingef&uuml;gt<br>";
    else
        echo "Alter wurde nicht berechnet";

    echo "<hr>";

    ?>
</body>
</html>