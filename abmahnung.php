<?php

require("./db_init.php");

$engelName = $_POST['e_name'];
print_r($engelName);

$query = "SELECT * FROM engel WHERE e_name='".$engelName."'" ;

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}



$query = "SELECT $engelName FROM engel";

$query = "UPDATE engel SET dienstgrad = $dienstgrad, abmahnung =" . $_POST['abmahnung'] . " WHERE e_name = $e_name";

$result = mysqli_query($link, $query);