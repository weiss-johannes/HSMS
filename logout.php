<?php
session_name('login');
session_start();
$_SESSION['check'] = false;
session_unset();
session_destroy();
header("Location: index.php");
?>