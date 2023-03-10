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
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>🕊Engel</title>
</head>
<body>
  
  <?php
#Verbindung DB
require("./db_init.php");


//Aufgabe 3a
$query="SELECT * FROM engel WHERE dienstgrad > 5";

$result = mysqli_query($link, $query);
$anzahl = mysqli_affected_rows($link);

if ($anzahl == 0)
    echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
else
{
    echo "<h3>Aufgabe 3a: Urlaubsanspruch haben <br><b class='sql-befehl'>$query</b></h3>";
    echo "<div>";
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

$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS urlaubstage int";
mysqli_query($link, $query);

echo "<hr>";


#Aufgabe 3b
$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS abmahnung varchar(255)";
mysqli_query($link, $query);

?>
<br>
<h3>Aufgabe 3b: Abmahnung eintragen</h3>
<form method="post" action="abmahnung.php">
<label for="e_name">Name Engel:</label>
<input type="text" name="e_name" id="e_name"><br><br>
<label for="grund_abmahung">Grund der abmahnung:</label>
<input type="text" name="grund_abmahung" id="grund_abmahung"><br><br>
<label></label>
<input type="submit" value="Eintragen">
<input type="reset" value="Zurücksetzen">
</form>
<br>
<?php

$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS geruechte varchar(255)";

mysqli_query($link, $query);

$query = "UPDATE engel SET geruechte = 'Franz und Antonia ein Paar sind' WHERE e_name = 'Antonia' ";
mysqli_query($link, $query);

#Aufgabe 3c
echo "<h3>Aufgabe 3c: Gerüchte eintragen</h3><p>Eintragung bei Antonia und Franz wegen Beziehung</p>";
$query = "UPDATE engel SET geruechte = 'Franz und Antonia ein Paar sind' WHERE e_name = 'Franz' ";
mysqli_query($link, $query);
$query = "UPDATE engel SET geruechte = 'Aloisius hat ein Auge auf Magdalena' WHERE e_name = 'Magdalena' ";
mysqli_query($link, $query);
echo "<p>Eintragung bei Magdalena und Aloisius wegen potentieller Beziehung</p>";
$query = "UPDATE engel SET geruechte = 'Aloisius hat ein Auge auf Magdalena' WHERE e_name = 'Aloisius' ";
mysqli_query($link, $query);

echo "<hr>";

#Aufgabe 3d
$query = "UPDATE engel SET dienstgrad = dienstgrad + 1 WHERE geruechte IS NULL";
mysqli_query($link, $query);
echo "<h3>Aufgabe 3d: Dienstgraderhöhung bei Engeln mit Gerüchten<br><b class='sql-befehl'>$query</b><br>";
echo "<hr>";

#Aufgabe 3e
$query = "SELECT * FROM engel WHERE e_name LIKE 'M%'";
$result = mysqli_query($link, $query);
$anzahl = mysqli_affected_rows($link);

if ($anzahl == 0)
    echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
else
{
    echo "<h3>Aufgabe 3e: Engel die mit M anfangen <br><b class='sql-befehl'>$query</b></h3>";
    echo "<div>";
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
echo "<hr>";


#Aufgabe 3f
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
    echo "<h3>Aufgabe 3f: Sortierung M/W nach Dienstgrad <br><b class='sql-befehl'>$query</b></h3>";
    echo "<div>";
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
echo "<hr>";


#Aufgabe 3g

$query = "SELECT COUNT(*) AS Anzahl FROM Engel";
$result=mysqli_query($link, $query);
$anzahl = mysqli_affected_rows($link);

  if ($anzahl == 0)
  echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
  else
  {
    echo "<h3>Aufgabe 3g: Registrierte Engel <br><b class='sql-befehl'>$query</b></h3>";
    echo "<div>";
    echo "<table>
    <tr>
    <td>Anzahl Engel</td>";
    while($fetch_list = mysqli_fetch_assoc($result)) {
      echo "
      <td>$fetch_list[Anzahl]</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
  }

echo "<hr>";


#Aufgabe 3h

$query = "SELECT
  SUBSTRING(Dienstgrad, 3, 1) AS Geschlecht,
  COUNT(*) AS Anzahl
FROM Engel
GROUP BY SUBSTRING(Dienstgrad, 3, 1)";
$result = mysqli_query($link, $query);
$anzahl = mysqli_affected_rows($link);

  if ($anzahl == 0)
  echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
  else
  {
    echo "<h3>Aufgabe 3h: Anzahl Engel männlich und weiblich <br><b class='sql-befehl'>$query</b></h3>";
    echo "<div>";
      echo "<table>
              <tr>
                <td>Engel Geschlecht</td>
                <td>Engel Anzahl</td>
              </tr>";
    while($fetch_list = mysqli_fetch_assoc($result)) {
      echo "
                <td>$fetch_list[Geschlecht]</td>
                <td>$fetch_list[Anzahl]</td>
              </tr>";
    }
      echo "</table>";
    echo "</div>";
}
echo "<hr>";


#Aufgabe 3i

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
aufsteigend <br><b class='sql-befehl'>$query</b></h3>";
    echo "<div>";
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
echo "<hr>";


#Aufgabe 3j

echo "<h3>Aufgabe 3j: Wie viele Tage bis Weihnachten haben die Engel für ihre Vorbereitungen noch Zeit? </h3>";
$heute = time(); // aktuelles Datum in Unix-Timestamp-Format
$weihnachten = strtotime('25 December'); // Weihnachtsdatum in Unix-Timestamp-Format
$diff_in_sec = $weihnachten - $heute; // Differenz in Sekunden
$diff_in_days = round($diff_in_sec / (60 * 60 * 24)); // Differenz in Tagen, aufgerundet
echo "<p>Anzahl der Tage bis Weihnachten: " . $diff_in_days . "</p>";

?>

</body>
</html>