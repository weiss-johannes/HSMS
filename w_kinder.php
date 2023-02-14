<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐣Alle meine Kinder schwimmen in dem SEE, SCHwimme iN DEm SeE, HÄndChen aus DEM waSser, Schwänze in die hoe🐤</title>
</head>
<body>
    
<?php

    require_once "db_init.php";

    $sql = "SELECT * FROM kinder";

    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);

    $counterKinder=0;

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
        $fetch = mysqli_query($link, $sql);
        while($fetch_list = mysqli_fetch_assoc($fetch)) {
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
            $counterKinder++;
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
            $counterKinder++;
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
            $counterKinder++;
        }


    echo "<hr><hr>";

    $anzCharakter="SELECT COUNT(charakter) FROM kinder WHERE charakter=1;";
    if($erg=mysqli_query($link,$anzCharakter))
    {
        $fetch_list = mysqli_fetch_assoc($erg);
        echo "Anzahl der Kinder mit Charakter 1: ".$fetch_list['COUNT(charakter)']."<br>";
        
    }
    $anzCharakter="SELECT COUNT(charakter) FROM kinder WHERE charakter=2;";
    if($erg=mysqli_query($link,$anzCharakter))
    {
        $fetch_list = mysqli_fetch_assoc($erg);
        echo "Anzahl der Kinder mit Charakter 2: ".$fetch_list['COUNT(charakter)']."<br>";
        
    }
    $anzCharakter="SELECT COUNT(charakter) FROM kinder WHERE charakter=3;";
    if($erg=mysqli_query($link,$anzCharakter))
    {
        $fetch_list = mysqli_fetch_assoc($erg);
        echo "Anzahl der Kinder mit Charakter 3: ".$fetch_list['COUNT(charakter)']."<br>";
        
    }
    $anzCharakter="SELECT COUNT(charakter) FROM kinder WHERE charakter=4;";
    if($erg=mysqli_query($link,$anzCharakter))
    {
        $fetch_list = mysqli_fetch_assoc($erg);
        echo "Anzahl der Kinder mit Charakter 4: ".$fetch_list['COUNT(charakter)']."<br>";
        
    }
    $anzCharakter="SELECT COUNT(charakter) FROM kinder WHERE charakter=5;";
    if($erg=mysqli_query($link,$anzCharakter))
    {
        $fetch_list = mysqli_fetch_assoc($erg);
        echo "Anzahl der Kinder mit Charakter 5: ".$fetch_list['COUNT(charakter)']."<br>";
        
    }
    
?>

</body>
</html>