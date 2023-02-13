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

require("./db_in_pruefung.php");

$query="SELECT * FROM engel WHERE dienstgrad > 5";

mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "Name: " . $row["e_name"]. " - Funktion: " . $row["funktion"]. " dienstgrad " . $row["dienstgrad"]. 
      " aufgaben " . $row["aufgaben"]. "<br>";
    }
  } else {
    echo "0 ergebnisse";
  }

$query = "ALTER TABLE engel ADD urlaubstage int; 

mysqli_query($link, $query);


?> 
</body>
</html>

