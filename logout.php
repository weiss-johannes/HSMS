<!--
    Autor: Simon Kleinschmidt, Alex Glaser, Joseph Weiß
    erstellt am: 08.02.2023   zuletzt geändert: 15.02.2023
-->

<?php
session_name('login');
session_start();
$_SESSION['check'] = false;
session_unset();
session_destroy();
header("Location: index.php");
?>