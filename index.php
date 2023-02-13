<!doctype html>
<html lang="de" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holy Sky Managment System</title>
    <link rel="shortcut icon" href="./img/logo/favicon-invert.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.js"></script>
  </head>
  <body style="cursor: url(./img/cursor/Christian_cross.svg), auto;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0431f9;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php?action=home">
            <img src="./img/logo/original/logo.png" alt="Logo" width="100" class="d-inline-block align-text-top">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=engel">Engel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=spielzeug">Spielzeug</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=eintragen">Eintragen</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kinder</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="index.php?action=uebersicht">Übersicht</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="index.php?action=aenderungen">Änderungen</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-danger" role="button" data-bs-toggle="dropdown" aria-expanded="false">Einstellungen</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-danger" href="index.php?action=erstellen">Datenbank erstellen</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="index.php?action=eintragen">Daten eintragen</a></li>
                  <li><a class="dropdown-item" href="index.php?action=something">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
            </ul>
          </div>
        </div>
      </nav>
<?php
$action = @$_GET['action'];

if ($action == 'home') {
    echo "home";
}

if ($action == 'engel') {
  require("./w_engel.php");
}

if ($action == 'spielzeug') {
  require("./w_spielzeug.php");
}

if ($action == 'eintragen') {
  require("./w_eintragen.php");
}

if ($action == 'uebersicht') {
    echo "uebersicht";
}

if ($action == 'aenderungen') {
    echo "aenderungen";
}

if ($action == 'erstellen') {
  require("./w_erstellen.php");
}

if ($action == 'something') {
  echo "<style>
          body {
            animation: background-color-change 0.5s infinite;
          }

          @keyframes background-color-change {
            50% { background-color: red; }
          }
        </style>";
}
?>
  </body>
</html>
