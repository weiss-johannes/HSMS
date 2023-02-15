<!-- Autor: WJ Datum erstellung: 10.02.2023 Letztet änderung: 15.02.2023 --!>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>🕊Engel</title>
</head>
<body>

<?php
#Verbindung DB
require("./db_init.php");


$query="SELECT * FROM engel WHERE dienstgrad > 5";

$result = mysqli_query($link, $query);
$anzahl = mysqli_affected_rows($link);

if ($anzahl == 0)
    echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
else
{
    echo "<h3>Aufgabe 3a: Urlaubsanspruch haben: <br><b class='sql-befehl'>$query</b></h3>";
    echo "<table>
                <tr><b>
                    <td>Engel Name</td>
                    <td>Erzengel</td>
                    <td>Dienstgrad</td>
                    <td>Funktion</td>
                    <td>Aufgabe</td>

                </tr>";
    while($fetch_list = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td>$fetch_list[e_name]</td>
                    <td>$fetch_list[erzengel]</td>
                    <td>$fetch_list[dienstgrad]</td>
                    <td>$fetch_list[funktion]</td>
                    <td>$fetch_list[aufgabe]</td>
                </tr>";
    }
    echo "</table>";
    echo "</div>";
}
echo "<hr><hr>";


$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS urlaubstage int";
mysqli_query($link, $query);

$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS abmahnung varchar(255)";
mysqli_query($link, $query);

echo "<hr><hr>";

$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS geruechte varchar(255)";

mysqli_query($link, $query);

$query = "UPDATE engel SET geruechte = 'Franz und Antonia ein Paar sind' WHERE e_name = 'Antonia' ";
mysqli_query($link, $query);
echo "<h3>Aufgabe 3c: Gerüchte eintragen</h3><b>Eintragung bei Antonia und Franz wegen Beziehung";
$query = "UPDATE engel SET geruechte = 'Franz und Antonia ein Paar sind' WHERE e_name = 'Franz' ";
mysqli_query($link, $query);
$query = "UPDATE engel SET geruechte = 'Aloisius hat ein Auge auf Magdalena' WHERE e_name = 'Magdalena' ";
mysqli_query($link, $query);
echo "<br>Eintragung bei Magdalena und Aloisius wegen potentieller Beziehung";
$query = "UPDATE engel SET geruechte = 'Aloisius hat ein Auge auf Magdalena' WHERE e_name = 'Aloisius' ";
mysqli_query($link, $query);

echo "<hr><hr>";
$query = "UPDATE engel SET dienstgrad = dienstgrad + 1 WHERE geruechte IS NULL";
mysqli_query($link, $query);
echo "<h3>Aufgabe 3d: Dienstgraderhöhung bei Engeln mit Gerüchten<br><b class='sql-befehl'>$query</b><br>";
echo "<hr><hr>";

$query = "SELECT * FROM engel WHERE e_name LIKE 'M%'";
$result = mysqli_query($link, $query);
$anzahl = mysqli_affected_rows($link);

if ($anzahl == 0)
    echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
else
{
    echo "<h3>Aufgabe 3e: Engel die mit M anfangen: <br><b class='sql-befehl'>$query</b></h3>";
    echo "<table>
                <tr>
                    <td>Engel Name</td>
                    <td>Erzengel</td>
                    <td>Dienstgrad</td>
                    <td>Funktion</td>
                    <td>Aufgabe</td>

                </tr>";
    while($fetch_list = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td>$fetch_list[e_name]</td>
                    <td>$fetch_list[erzengel]</td>
                    <td>$fetch_list[dienstgrad]</td>
                    <td>$fetch_list[funktion]</td>
                    <td>$fetch_list[aufgabe]</td>
                </tr>";
    }
    echo "</table>";
    echo "</div>";
}
echo "<hr><hr>";

$query = "SELECT *
FROM engel
ORDER BY
  CASE 
    WHEN SUBSTRING(dienstgrad, 3, 1) = 'm' THEN 1
    WHEN SUBSTRING(dienstgrad, 3, 1) = 'w' THEN 2
  END,
  CAST(SUBSTRING(dienstgrad, 1, 1) AS UNSIGNED),
  SUBSTRING(dienstgrad, 2, 1) DESC 
";

$result = mysqli_query($link, $query);
$anzahl = mysqli_affected_rows($link);

if ($anzahl == 0)
    echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
else
{
    echo "<h3>Aufgabe 3f: Sortierung M/W nach Dienstgrad: <br><b class='sql-befehl'>$query</b></h3>";
    echo "<table>
                <tr>
                    <td>Engel Name</td>
                    <td>Erzengel</td>
                    <td>Dienstgrad</td>
                    <td>Funktion</td>
                    <td>Aufgabe</td>
                    <td>Urlaubstrage</td>
                    <td>Abmahnung</td>
                    <td>Geruechte</td>
                </tr>";
    while($fetch_list = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td>$fetch_list[e_name]</td>
                    <td>$fetch_list[erzengel]</td>
                    <td>$fetch_list[dienstgrad]</td>
                    <td>$fetch_list[funktion]</td>
                    <td>$fetch_list[aufgabe]</td>
                    <td>$fetch_list[urlaubstage]</td>
                    <td>$fetch_list[abmahnung]</td>
                    <td>$fetch_list[geruechte]</td>
                </tr>";
    }
    echo "</table>";
    echo "</div>";
}
echo "<hr><hr>";


$query = "SELECT COUNT(*) FROM Engel";
$result=mysqli_query($link, $query);
echo "<h3>Aufgabe 3g: Anzahl Engel: <br><b class='sql-befehl'>$query</b></h3>";
if (mysqli_num_rows($result) > 0) {
    echo "<table>
          <tr>
            <td>Anzahl Engel</td>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "
            <td>".$row['Anzahl']."</td>
          </tr>";
    }
  echo "<table>";
} else {
  echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
}

echo "<hr><hr>";

$query = "SELECT
  SUBSTRING(Dienstgrad, 3, 1) AS Geschlecht,
  COUNT(*) AS Anzahl
FROM Engel
GROUP BY SUBSTRING(Dienstgrad, 3, 1)";
if (mysqli_num_rows($result) > 0) {
  echo "<table>
          <tr>
            <td>Geschlecht</td>
            <td>Anzahl</td>
          </tr>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "
          <tr>
            <td>".$row['Geschlecht']."</td>
            <td>".$row['Anzahl']."</td>
          </tr>";
    }
  echo "<table>";
} else {
  echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
}
echo "<hr><hr>";

$query = "SELECT
  SUBSTRING(Dienstgrad, 1, 1) AS Dienstgrad,
  COUNT(*) AS Anzahl
FROM Engel
GROUP BY SUBSTRING(Dienstgrad, 1, 1)
ORDER BY Dienstgrad ASC";
$result=mysqli_query($link, $query);
$anzahl = mysqli_affected_rows($link);

if ($anzahl == 0)
    echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
else
{
    echo "<h3>Aufgabe 3i: Geben Sie an, wie viele Engel es von jedem Dienstgrad gibt. Ordnen Sie das Ergebnis
aufsteigend: <br><b class='sql-befehl'>$query</b></h3>";
    echo "<table>
                <tr>
                    <td>Dienstgrad</td>
                    <td>Anzahl</td>
                </tr>";
    while($fetch_list = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td>$fetch_list[Dienstgrad]</td>
                    <td>$fetch_list[Anzahl]</td>

                </tr>";
    }
    echo "</table>";
    echo "</div>";
}
echo "<hr><hr>";

echo "<h3>Aufgabe 3j: Wie viele Tage bis Weihnachten haben die Engel für ihre Vorbereitungen noch Zeit? </h3>";
$heute = time(); // aktuelles Datum in Unix-Timestamp-Format
$weihnachten = strtotime('25 December'); // Weihnachtsdatum in Unix-Timestamp-Format
$diff_in_sec = $weihnachten - $heute; // Differenz in Sekunden
$diff_in_days = round($diff_in_sec / (60 * 60 * 24)); // Differenz in Tagen, aufgerundet
echo "Anzahl der Tage bis Weihnachten: " . $diff_in_days;

?>

</body>
</html>