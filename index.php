<!--
    Autor: Simon Kleinschmidt, Alex Glaser, Joseph Weiß
    erstellt am: 08.02.2023   zuletzt geändert: 15.02.2023
-->


<!doctype html>
<html lang="de" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holy Sky Managment System</title>
    <link rel="shortcut icon" href="./img/logo/favicon-invert.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/bootstrap.bundle.js"></script>
  </head>
  <?php
    session_name('login');
    session_start();

    $check = @$_SESSION['check'];

    // Check bitte auskommentieren, sobald die Datenbank erstellt und werte eingetragen wurden.
    // Ansonsten funktioniert der login nicht.
    $check = true;
  ?>
  <body style="cursor: url(./img/cursor/Christian_cross.svg), auto;">

    <!--
      Navigationsbar
    -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php?action=home">

            <!--
              Logo der Gruppe
            -->
            <img src="./img/logo/original/logo-invert.png" alt="Logo" width="100" class="d-inline-block align-text-top">
            </a>

          <!--
            Burgermenü
          -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link reiter" href="index.php?action=engel">Engel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link reiter" href="index.php?action=spielzeug">Spielzeug</a>
              </li>

              <?php

              // 
              // Exclusiv Content für Angemeldete
              //
              if ($check) {
                echo "<li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle reiter' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Kinder</a>
                        <ul class='dropdown-menu'>
                          <li><a class='dropdown-item' href='index.php?action=uebersicht'>Übersicht</a></li>
                          <li><hr class='dropdown-divider'></li>
                          <li><a class='dropdown-item' href='index.php?action=aenderungen'>Änderungen</a></li>
                        </ul>
                      </li> ";
              }
              ?>

              <!--
                Navigationsbar-Dropdown
              -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-danger" role="button" data-bs-toggle="dropdown" aria-expanded="false">Einstellungen</a>
                <ul class="dropdown-menu">

                  <?php

                  //
                  // Admin comands
                  //
                  if ($check) {
                    echo "
                      <li><a class='dropdown-item text-danger' href='index.php?action=erstellen'>Datenbank erstellen</a></li>
                      <li><hr class='dropdown-divider'></li>
                      <li><a class='dropdown-item' href='index.php?action=eintragen'>Daten eintragen</a></li>";
                  }
                  ?>

                  <!--
                    Alex´s Spielzeug
                  -->
                  <li><a class="dropdown-item" href="index.php?action=something">Something else here</a></li>

                  <!--
                    Login/out
                  -->
                  <?php
                  if (!$check) { echo "<li><a class='dropdown-item' href='login.php'>login</a></li>"; }
                  ?>
                  <?php
                  if ($check) { echo "<li><a class='dropdown-item' href='logout.php'>logout</a></li>"; }
                  ?>

                </ul>
              </li>
              <li class="nav-item">
            </ul>
          </div>
        </div>
      </nav>

      <section>

      <!--
        Bag-end Stuff
      -->
        <?php
        $action = @$_GET['action'];
        
        if ($action == 'home') {
          echo "<b><div class='hg'>Ausgabe mit foreach() - Standard</b><br>";
          foreach ($_SESSION as $key => $value) {
              echo "<label>" . $key . ":</label> <b>" . $value . "</b><br>";
          }
          echo "</div>";
        }

        if ($action == 'engel') {
          include("./w_engel.php");
        }

        if ($action == 'spielzeug') {
          require("./w_spielzeug.php");
        }

        if ($action == 'eintragen') {
          require("./w_eintragen.php");
        }

        if ($action == 'uebersicht') {
          require("./w_kinderSicht.php");
        }

        if ($action == 'aenderungen') {
          require("./w_kinder.php");
        }

        if ($action == 'erstellen') {
          require("./w_erstellen.php");
        }

        if ($action == 'something') {
          echo "<style>
                  body {
                    animation: background-color-change 0.1s infinite;
                  }

                  @keyframes background-color-change {
                    50% { background-color: red; }
                  }
                </style>";
        }
    ?>
      </section>
  </body>
</html>
