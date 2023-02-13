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
        }
        echo "</table>";
        echo "</div>";
    }

    $versWohnort="SELECT DISTINCT wohnort From kinder";
    $arr=mysqli_query($link,$versWohnort);


    while($arr_a=mysqli_fetch_all($arr)) {
        foreach($arr_a as $key=> $value)
        {
            foreach($value as $value2)
            echo "Wohnort: $value2<br>";
        }
    }



?>

</body>
</html>