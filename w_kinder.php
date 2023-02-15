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

    #Aufgabe 5a
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
        echo "<h3>Aufgabe 5a: Alle Kinder ($anzahl) <b class='sql-befehl'>$sql</b></h3>";
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

    #Aufgabe 5b
    // Alle Speciellen Wohnorte
    $versWohnort="SELECT DISTINCT wohnort From kinder ORDER BY wohnort ASC";
    $arr=mysqli_query($link,$versWohnort);
    $anzahl = mysqli_affected_rows($link);

if ($anzahl == 0)
    echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
else
{
    echo "<h3>Aufgabe 5b: Wohnort sortiert A->Z <br><b class='sql-befehl'>$versWohnort</b></h3>";
    echo "<div>";
    echo "<table>
                <tr>
                    <td>Wohnorte</td>

                </tr>";
    while($fetch_list = mysqli_fetch_assoc($arr)) {
        echo "<tr>
                    <td>$fetch_list[wohnort]</td>
                </tr>";
    }
    echo "</table>";
    echo "</div>";
}
echo "<hr>";

    #Aufgabe 5c
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
    echo "<h3>Aufgabe 5c: Engelsberechnung</h3>";
    echo "Es werden $counterKinder Engel benötigt<hr>";
    
    #Aufgabe 5d:
    // Gibt alle Kinder aus die an Weihnachten geboren wurden aus
    $gebWeihnacht="SELECT * FROM kinder WHERE gebdat LIKE '%12-24'";$anzahl = mysqli_affected_rows($link);
    $erg=mysqli_query($link,$gebWeihnacht);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0)
        echo "<h3 style='color: red;'>Niemand an Weihnachten geburstag</h3><br>";
    else
    {
        echo "<h3>Aufgabe 5d: Kinder die an Weihnachten Geburtstag haben <br><b class='sql-befehl'>$gebWeihnacht</b></h3>";
        echo "<div>";
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
        }
        echo "</table>";
        echo "</div>";
    }

    echo "<hr>";


    #Aufgabe 5e
    // Gibt alle Kinder die im December geboren sind aus
    $gebDecember="SELECT * FROM kinder WHERE gebdat LIKE '%12%'";
    $erg=mysqli_query($link,$gebDecember);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0)
        echo "<h3 style='color: red;'>Niemand im Dezember Geburtstag</h3><br>";
    else
    {
        echo "<h3>Aufgabe 5e: Kinder die im Dezember Geburtstag haben <br><b class='sql-befehl'>$gebDecember</b></h3>";
        echo "<div>";
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
        }
        echo "</table>";
        echo "</div>";
    }

    echo "<hr>";


    #Aufgabe 5f
    // Gibt alle Kinder die einen Charakter schlechter als 3 haben aus
    $charakter3="SELECT * FROM kinder WHERE charakter>=3 ORDER BY charakter DESC";
    $erg=mysqli_query($link,$gebDecember);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0)
        echo "<h3 style='color: red;'>Keine Kinder mit Charakter schlechter als 3</h3><br>";
    else
    {
        echo "<h3>Aufgabe 5f: Kinder mit Charakter der Schlechter als 3 ist <br><b class='sql-befehl'>$charakter3</b></h3>";
        echo "<div>";
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
        }
        echo "</table>";
        echo "</div>";
    }

    echo "<hr>";

    #Aufgabe 5g
    // For-Schleife für die Charakter anzahl
    echo "<h3>Aufgabe 5f:  Anzahl Kinder mit Charakter<br><b class='sql-befehl'>SELECT COUNT(charakter) FROM kinder WHERE charakter=\$i</b></h3>";
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

    #Aufgabe 5h
    echo "<h3>Aufgabe 5h:  Engelsparmaßnahme</h3>";
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

    #Aufgabe 5i
    // Datum eines Kindes verbessert
    $updKind="UPDATE kinder SET gebdat='2004-09-30' WHERE knr=14";
    echo "<h3>Aufgabe 5i:  Geburtsdatum ändern<br><b class='sql-befehl'>$updKind</b></h3>";
    if(mysqli_query($link,$updKind))
        echo "Kind wurde ausgebessert<br>";
    else
        echo "Kind war gut genug";

    echo "<hr>";

    #Aufgabe 5j
    // Wohnort der Familie ausgebessert
    $updFam="UPDATE kinder SET wohnort='Traunstein' WHERE k_name='Mayer'";
    echo "<h3>Aufgabe 5j:  Wohnort ändern<br><b class='sql-befehl'>$updFam</b></h3>";
    if(mysqli_query($link,$updFam))
        echo "Familie wurde ausgebessert<br>";
    else
        echo "Kind war gut genug";

    echo "<hr>";

    #Aufgabe 5k
    // Unterdupfing ist böse 
    $updUnt="UPDATE kinder SET charakter = charakter + 1 WHERE wohnort='Unterdupfing'";
    echo "<h3>Aufgabe 5k:  Kein will nach Unterdupfing<br><b class='sql-befehl'>$updUnt</b></h3>";
    if(mysqli_query($link,$updUnt))
        echo "Unterdupfing wurde ausgemerzt<br>";
    else
        echo "Unterdupfing war gut genug";

    echo "<hr>";

    #Aufgabe 5l
    // Kind können jetzt alt werden
    $altTab="ALTER TABLE kinder ADD COLUMN IF NOT EXISTS k_alter smallint(2)";
    echo "<h3>Aufgabe 5k:  ALter hinzufügen<br><b class='sql-befehl'>$altTab</b></h3>";

    if(mysqli_query($link,$altTab))
        echo "Tabelle wurde umge&auml;ndert<br>";
    else
        echo "Tabelle wurde schon ver&auml;ndert";
    
    echo "<hr>";

    #Aufgabe 5m
    // Tabelle mit Alter befüllen
    $insTab="UPDATE kinder SET k_alter = (YEAR(CURRENT_DATE) - YEAR(gebdat)) - (RIGHT(CURRENT_DATE,5) < RIGHT(gebdat,5)) ";
    echo "<h3>Aufgabe 5m:  ALter mit Geburtsjahr berechnen und eintragen<br><b class='sql-befehl'>$insTab</b></h3>";
    if(mysqli_query($link,$insTab))
        echo "Alter wurde eingef&uuml;gt<br>";
    else
        echo "Alter wurde nicht berechnet";

    echo "<hr>";

    ?>
</body>
</html>