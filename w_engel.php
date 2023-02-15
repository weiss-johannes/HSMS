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

$query = "ALTER TABLE engel ADD COLUMN  IF NOT EXISTS urlaubstage int";

mysqli_query($link, $query);

$query = "ALTER TABLE engel ADD abmahnung varchar(255)";

mysqli_query($link, $query);

?>

<form method="post" action="abmahnung.php">
<label for="e_name">Name Engel</label>
<input type="text" name="e_name" id="e_name">
<label for="grund_abmahung">Grund der abmahnung</label>
<input type="text" name="grund_abmahung" id="grund_abmahung">
<input type="submit" value="Eintragen">
<input type="reset" value="Zurücksetzen">
</form>

<?php

$query = "ALTER TABLE engel ADD geruechte varchar(255)";  

mysqli_query($link, $query);



?> 

</body>
</html>