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
  ?>
  <body style="cursor: url(./img/cursor/kreuz-weiß.svg), auto;">

    <!--
      Navigationsbar
    -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff; cursor: url(./img/cursor/kreuz-schwarz.svg), auto;">
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
              if (!$check) {
                echo "<li class='nav-item'>
                  <a class='nav-link reiter' href='index.php?action=login'>Login Tabelle anlegen</a>
                </li>";
              }
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
                  // Anzeigen wenn angemeldet
                  //
                  if ($check) {
                    echo "
                      <li><a class='dropdown-item text-success' href='index.php?action=erstellen'>Datenbank erstellen</a></li>
                      <li><hr class='dropdown-divider'></li>
                      <li><a class='dropdown-item' href='index.php?action=eintragen'>Daten eintragen</a></li>";
                  }
                  ?>
                  <!--
                    Alex´s Spielzeug (Bitte nicht beachten)
                  -->
                  <li><a class="dropdown-item" href="index.php?action=something">Something else here</a></li>
                  <li>
                    <a class='dropdown-item text-danger' href='index.php?action=löschen'>Datenbank löschen</a>
                  </li>
                  <!--
                    Login/out
                  -->
                  <?php
                  if (!$check) echo "<li><a class='dropdown-item' href='login.php'>login</a></li>";
                  if ($check) echo "<li><a class='dropdown-item' href='logout.php'>logout</a></li>";
                  ?>

                </ul>
              </li>
              <li class="nav-item">
            </ul>
          </div>
        </div>
      </nav>

      <!--
        Bag-end Stuff
      -->
        <?php
        $action = @$_GET['action'];
        
        if ($action == 'home') {
        echo "<h1>Holy <br><span style='width: fit-content; filter: brightness(200%);background: linear-gradient(75deg,#39d7ff, #0000ff);
        -webkit-background-clip: text;-webkit-text-fill-color: transparent;'>Sky</span> <br>Management <br>System</h1>";

        // Ausgabe der Session values
        // if ($action == 'home') {
        //   echo "<b><div class='hg'>Ausgabe mit foreach() - Standard</b><br>";
        //   foreach ($_SESSION as $key => $value) {
        //       echo "<label>" . $key . ":</label> <b>" . $value . "</b><br>";
        //   }
        //   echo "</div>";
        }

        if ($action == 'engel') {
          require("./w_engel.php");
        } 

        if ($action == 'spielzeug') {
          require("./w_spielzeug.php");
        }

        if ($action == 'login') {
          include("./login-tab.php");
        }

        if ($action == 'löschen') {
          require("drop-db.php");
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

        if ($action == 'abmahnung') {
          require("./w_engel.php");
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
  </body>
</html>
