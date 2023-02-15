<!--
    Autor: Simon Kleinschmidt, Alex Glaser, Joseph Weiß
    erstellt am: 08.02.2023   zuletzt geändert: 15.02.2023
-->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spielzeug 🧸</title>
</head>
<body>
<?php
    require("./db_init.php");

    /* **************************** Aufgabe 4a **************************** */
    $sql = "SELECT * FROM spielzeug";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<h3>Aufgabe 4a: ($anzahl) <b class='sql-befehl'>$sql</b></h3>";
        echo "<table>
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
        while($fetch_list = mysqli_fetch_assoc($erg)) {
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
    }
    
    /* **************************** Aufgabe 4b **************************** */
    $sql = "SELECT * FROM spielzeug ORDER BY wert";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<h3>Aufgabe 4b: ($anzahl) <b class='sql-befehl'>$sql</b></h3>";
        echo "<table>
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
        while($fetch_list = mysqli_fetch_assoc($erg)) {
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
    }
        
    /* **************************** Aufgabe 4c **************************** */
    $sql = "SELECT id, bez, wert, m_alter, anzahl FROM spielzeug ORDER BY anzahl";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<h3>Aufgabe 4c: ($anzahl) <b class='sql-befehl'>$sql</b></h3>";
        echo "<table>
                <tr>
                    <td>id</td>
                    <td>bez</td>
                    <td>wert</td>
                    <td>m_alter</td>
                    <td>anzahl</td>
                </tr>";
        while($fetch_list = mysqli_fetch_assoc($erg)) {
            echo "<tr>
                    <td>$fetch_list[id]</td>
                    <td>$fetch_list[bez]</td>
                    <td>$fetch_list[wert]</td>
                    <td>$fetch_list[m_alter]</td>
                    <td>$fetch_list[anzahl]</td>
                </tr>";  
        }
        echo "</table>";
    }

    /* **************************** Aufgabe 4d **************************** */
    $sql = "SELECT SUM(anzahl) as anzahl FROM spielzeug";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<h3>Aufgabe 4d: <b class='sql-befehl'>$sql</b></h3>";
        echo "<table>
                <tr>
                    <td>anzahl</td>
                </tr>";
        while($fetch_anzahl = mysqli_fetch_assoc($erg)) {
            echo '<tr>
                    <td>'.$fetch_anzahl['anzahl'].'</td>
                </tr>';
            }
            echo '</table>';
    }
    
    /* **************************** Aufgabe 4e **************************** */
    $sql = "SELECT m_alter, COUNT(DISTINCT bez) as bez_anzahl FROM spielzeug GROUP BY m_alter;";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<h3>Aufgabe 4e: ($anzahl) <b class='sql-befehl'>$sql</b></h3>";
        echo "<table>
            <tr>
                <td>bez</td>
                <td>m_alter</td>
            </tr>";
        while($fetch_list = mysqli_fetch_assoc($erg)) {
            echo "<tr>
                    <td>$fetch_list[bez_anzahl]</td>
                    <td>$fetch_list[m_alter]</td>
                </tr>";  
        }
        echo "</table>";
    }
    
    /* **************************** Aufgabe 4f **************************** */
    $sql = "SELECT m_alter, COUNT(anzahl) as anzahl FROM spielzeug GROUP BY m_alter;";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
    } else {
        echo "<h3>Aufgabe 4f: ($anzahl) <b class='sql-befehl'>$sql</b></h3>";
        echo "<table>
            <tr>
                <td>anzahl</td>
                <td>m_alter</td>
            </tr>";
        while($fetch_list = mysqli_fetch_assoc($erg)) {
            echo "<tr>
                    <td>$fetch_list[anzahl]</td>
                    <td>$fetch_list[m_alter]</td>
                </tr>";  
        }
        echo "</table>";
    }
?>
</body>
</html>