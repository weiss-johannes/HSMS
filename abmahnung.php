<?php

require("./db_init.php");

$e_name = $_POST['e_name'];

$query = "SELECT $e_name FROM $engel";

$result = mysqli_query($link, $query);

$dienstgrad = $result["dienstgrad"] - 1 ;

$query = "SELECT $e_name FROM $engel";

$query = "UPDATE table SET dienstgrad = $dienstgrad, abmahnung =" . $_POST['abmahnung'] . " WHERE e_name = $e_name";

$result = mysqli_query($link, $query);