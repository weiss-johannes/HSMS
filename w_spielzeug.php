<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spielzeug 🧸</title>
    <style>
        .sql-befhel {
            color: gray;
            font-family: monospace;
        }
    </style>
</head>
<body>
<?php
    // require("./w_erstellen.php");

    /* **************************** Aufgabe 4a **************************** */
    $sql = "SELECT * FROM spielzeug";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<table>
                <th>
                    <td>Aufgabe 4a: ($anzahl) <b class='sql-befehl'>$sql</b></td>
                </th>
                <tr>
                    <td>id</td>
                    <td>bez</td>
                    <td>wert</td>
                    <td>laenge</td>
                    <td>breite</td>
                    <td>hoehe</td>
                    <td>m_alter</td>
                    <td>anzahl</td>
                </tr>";
        $fetch = mysqli_query($link, $sql);
        while($fetch_list = mysqli_fetch_assoc($fetch)) {
            echo "<tr>
                    <td>$fetch_list[id]</td>
                    <td>$fetch_list[bez]</td>
                    <td>$fetch_list[wert]</td>
                    <td>$fetch_list[laenge]</td>
                    <td>$fetch_list[breite]</td>
                    <td>$fetch_list[hoehe]</td>
                    <td>$fetch_list[m_alter]</td>
                    <td>$fetch_list[anzahl]</td>
                </tr>";  
        }
        echo "</table>";
        echo "</div>";
    }
    
    /* **************************** Aufgabe 4b **************************** */
    $sql = "SELECT * FROM spielzeug ORDER BY wert";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<table>
                <th>
                    <td>Aufgabe 4b: ($anzahl) <b class='sql-befehl'>$sql</b></td>
                </th>
                <tr>
                    <td>id</td>
                    <td>bez</td>
                    <td>wert</td>
                    <td>laenge</td>
                    <td>breite</td>
                    <td>hoehe</td>
                    <td>m_alter</td>
                    <td>anzahl</td>
                </tr>";
        $fetch = mysqli_query($link, $sql);
        while($fetch_list = mysqli_fetch_assoc($fetch)) {
            echo "<tr>
                    <td>$fetch_list[id]</td>
                    <td>$fetch_list[bez]</td>
                    <td>$fetch_list[wert]</td>
                    <td>$fetch_list[laenge]</td>
                    <td>$fetch_list[breite]</td>
                    <td>$fetch_list[hoehe]</td>
                    <td>$fetch_list[m_alter]</td>
                    <td>$fetch_list[anzahl]</td>
                </tr>";  
        }
        echo "</table>";
        echo "</div>";
    }
        
    /* **************************** Aufgabe 4c **************************** */
    $sql = "SELECT id, bez, wert, m_alter, anzahl FROM spielzeug ORDER BY anzahl";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<table>
                <th>
                    <td>Aufgabe 4c: ($anzahl) <b class='sql-befehl'>$sql</b></td>
                </th>
                <tr>
                    <td>id</td>
                    <td>bez</td>
                    <td>wert</td>
                    <td>m_alter</td>
                    <td>anzahl</td>
                </tr>";
        $fetch = mysqli_query($link, $sql);
        while($fetch_list = mysqli_fetch_assoc($fetch)) {
            echo "<tr>
                    <td>$fetch_list[id]</td>
                    <td>$fetch_list[bez]</td>
                    <td>$fetch_list[wert]</td>
                    <td>$fetch_list[m_alter]</td>
                    <td>$fetch_list[anzahl]</td>
                </tr>";  
        }
        echo "</table>";
        echo "</div>";
    }

    /* **************************** Aufgabe 4d **************************** */
    $sql = "SELECT anzahl FROM spielzeug";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        $fetch = mysqli_query($link, $sql);
        while($fetch_anzahl = mysqli_fetch_assoc($fetch)) {
            $anzahl_ges += $fetch_list['anzahl'];
        }
        echo "<h4>Aufgabe 4c: <b class='sql-befehl'>$sql</b></h4>";
        echo "Anzahl der vorrätigen Spielzeuge insgesamt: <b>$anzahl_ges</b>";
    }
    
    /* **************************** Aufgabe 4e **************************** */
    $sql = "SELECT COUNT(bez) AS bez_anzahl FROM spielzeug";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        $fetch = mysqli_query($link, $sql);
        $bez_anzahl_ges = 0;
        while($fetch_anzahl = mysqli_fetch_assoc($fetch)) {
            $bez_anzahl_ges = $fetch_list['bez_anzahl'];
        }
        echo "<h4>Aufgabe 4e: <b class='sql-befehl'>$sql</b></h4>";
        echo "Anzahl der verschiedenen Bezeichnungen insgesamt: <b>$bez_anzahl_ges</b>";
    }
?>
</body>
</html>