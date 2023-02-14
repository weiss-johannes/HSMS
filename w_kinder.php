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

    $counterKinder=0;
    $counterKinderSpäter=0;

    if ($anzahl == 0)
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    else 
    {
        echo "<table>
                <th>
                    <td>Aufgabe 5a: ($anzahl) <b class='sql-befehl'>$sql</b></td>
                </th>
                <tr>
                    <td>id</td>
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
    echo "<hr><hr>";


    $versWohnort="SELECT DISTINCT wohnort From kinder";
    $arr=mysqli_query($link,$versWohnort);


    while($arr_a=mysqli_fetch_all($arr)) {
        foreach($arr_a as $key=> $value)
        {
            foreach($value as $value2)
            echo "Wohnort: $value2<br>";
        }
    }

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
    {
        $counterKinder/=3;
    }

    echo "<hr>";
    
    echo "<hr>Es werden $counterKinder Engel benötigt<hr>";
    echo "<hr>";

    $gebWeihnacht="SELECT * FROM kinder WHERE gebdat LIKE '%12-24'";
    if($erg=mysqli_query($link,$gebWeihnacht))
    {
        echo "Kinder die an Weihnachten Geburtstag haben<br><br>";
    }
    else
    {
        echo "Nicht Weihnachten<br>";
    }
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
        
    echo "<hr><hr>";

    $gebDecember="SELECT * FROM kinder WHERE gebdat LIKE '%12%'";
    if($erg=mysqli_query($link,$gebDecember))
    {
        echo "Kinder die im December gerboren sind<br><br>";
    }
    else
    {
        echo "Nicht December<br>";
    }
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

    echo "<hr><hr>";

    $charakter3="SELECT * FROM kinder WHERE charakter>=3 ORDER BY charakter DESC";
    if($erg=mysqli_query($link,$charakter3))
    {
        echo "Kinder die bei Charakter besser als drei sind.<br><br>";
    }
    else
    {
        echo "Nicht Charakter<br>";
    }
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


    echo "<hr><hr>";

    for($i=1;$i<6;$i++)
    {
        $anzCharakter="SELECT COUNT(charakter) FROM kinder WHERE charakter=$i;";
        if($erg=mysqli_query($link,$anzCharakter))
        {
            $fetch_list = mysqli_fetch_assoc($erg);
            echo "Anzahl der Kinder mit Charakter $i: ".$fetch_list['COUNT(charakter)']."<br>";
            if($i==5)
            {
                $counterKinderSpar=$fetch_list['COUNT(charakter)'];
            }
        }
    }
    
    echo "<hr><hr>";
    
    $counterKinderSpäter-=$counterKinderSpar;

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
    {
        $counterKinderSpäter/=3;
    }

    $counterKinder-=$counterKinderSpäter;

    echo "Es werden nur noch $counterKinderSpäter Engel benötigt<br>";
    echo "Es wurden $counterKinder Engel gespart";
    
    echo "<hr><hr>";

    $updKind="UPDATE kinder SET gebdat='2004-09-30' WHERE knr=14";

    if(mysqli_query($link,$updKind))
    {
        echo "Kind wurde ausgebessert<br>";
    }

    echo "<hr><hr>";

    $updFam="UPDATE kinder SET wohnort='Traunstein' WHERE k_name='Mayer'";

    if(mysqli_query($link,$updFam))
    {
        echo "Familie wurde ausgebessert<br>";
    }

    echo "<hr><hr>";

    $updUnt="UPDATE kinder SET charakter=(charakter+1) WHERE wohnort='Unterdupfing'";

    if(mysqli_query($link,$updUnt))
    {
        echo "Unterdumpfing wurde ausgemerzt<br>";
    }

    echo "<hr><hr>";

    $altTab="ALTER TABLE kinder ADD k_alter smallint(2)";

    if(mysqli_query($link,$altTab))
    {
        echo "Tabelle wurde anders gemacht<br>";
    }

    echo "<hr><hr>";



?>

</body>
</html>