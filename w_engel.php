<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>🕊Engel</title>
</head>
<?php
    session_name('login');
    session_start();
  ?>
<body>

<?php

require("./db_init.php");

$query="SELECT * FROM engel WHERE dienstgrad ";

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "Name: " . $row["e_name"]. " - Funktion: " . $row["funktion"]. " dienstgrad " . $row["dienstgrad"]. 
      " aufgabe " . $row["aufgabe"]. "<br>";
    }
  } else {
    echo "0 ergebnisse";
  }

$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS urlaubstage int";

mysqli_query($link, $query);

$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS abmahnung varchar(255)";

mysqli_query($link, $query);

?>
<br>
<form method="post" action="abmahnung.php">
<label for="e_name">Name Engel</label>
<input type="text" name="e_name" id="e_name">
<label for="grund_abmahung">Grund der abmahnung</label>
<input type="text" name="grund_abmahung" id="grund_abmahung">
<input type="submit" value="Eintragen">
<input type="reset" value="Zurücksetzen">
</form>
<br>
<?php

$query = "ALTER TABLE engel ADD COLUMN IF NOT EXISTS geruechte varchar(255)";

mysqli_query($link, $query);

$query = "UPDATE engel SET geruechte = 'Franz und Antonia ein Paar sind' WHERE e_name = 'Antonia' ";
mysqli_query($link, $query);
echo "Eintragung bei Antonia und Franz wegen Beziehung";
$query = "UPDATE engel SET geruechte = 'Franz und Antonia ein Paar sind' WHERE e_name = 'Franz' ";
mysqli_query($link, $query);
$query = "UPDATE engel SET geruechte = 'Aloisius hat ein Auge auf Magdalena' WHERE e_name = 'Magdalena' ";
mysqli_query($link, $query);
echo "<br>Eintragung bei Magdalena und Aloisius wegen potentieller Beziehung";
$query = "UPDATE engel SET geruechte = 'Aloisius hat ein Auge auf Magdalena' WHERE e_name = 'Aloisius' ";
mysqli_query($link, $query);

$query = "UPDATE engel SET dienstgrad = dienstgrad + 1 WHERE geruechte IS NULL";
mysqli_query($link, $query);
echo "<br>Dienstgraderhöhung bei Engeln mit Gerüchten<br>";

$query = "SELECT * FROM engel WHERE e_name LIKE 'M%'";
mysqli_query($link, $query);

$query = "SELECT *
FROM engel
ORDER BY
  CASE 
    WHEN SUBSTRING(dienstgrad, 3, 1) = 'm' THEN 1
    WHEN SUBSTRING(dienstgrad, 3, 1) = 'w' THEN 2
  END,
  CAST(SUBSTRING(dienstgrad, 1, 1) AS UNSIGNED),
  SUBSTRING(dienstgrad, 2, 1) ASC
";

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["e_name"]. " - Funktion: " . $row["funktion"]. " dienstgrad " . $row["dienstgrad"].
            " aufgabe " . $row["aufgabe"]. "<br>";
    }
} else {
    echo "0 ergebnisse";
}

$query = "SELECT COUNT(*) FROM Engel";
$result=mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Anzahl Engel: " . $row["COUNT(*)"] ."<br>";
    }
} else {
    echo "0 Engel";
}

$query = "SELECT
  SUBSTRING(Dienstgrad, 3, 1) AS Geschlecht,
  COUNT(*) AS Anzahl
FROM Engel
GROUP BY SUBSTRING(Dienstgrad, 3, 1)";
$result=mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Geschlecht: " . $row["Geschlecht"]. " - Anzahl: " . $row["Anzahl"] . "<br>";
    }
} else {
    echo "0 ergebnisse";
}

$query = "SELECT
  SUBSTRING(Dienstgrad, 1, 1) AS Dienstgrad,
  COUNT(*) AS Anzahl
FROM Engel
GROUP BY SUBSTRING(Dienstgrad, 1, 1)
ORDER BY Dienstgrad ASC";
$result=mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Dienstgrad: " . $row["Dienstgrad"]. " - Anzahl: " . $row["Anzahl"] . "<br>";
    }
} else {
    echo "0 ergebnisse";
}

$heute = time(); // aktuelles Datum in Unix-Timestamp-Format
$weihnachten = strtotime('25 December'); // Weihnachtsdatum in Unix-Timestamp-Format
$diff_in_sec = $weihnachten - $heute; // Differenz in Sekunden
$diff_in_days = round($diff_in_sec / (60 * 60 * 24)); // Differenz in Tagen, aufgerundet
echo "Anzahl der Tage bis Weihnachten: " . $diff_in_days;

?>

</body>
</html>