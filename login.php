<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
  </head>
<?php
    session_name('login');
    session_start();
    $_SESSION = array_map('htmlspecialchars', $_POST);
    $username = @$_SESSION['username'];
    $password = @$_SESSION['password'];

    
    
    require("./db_init.php");
    $sql = "SELECT * FROM loginUser";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3>";
    } else {
        echo "<table>
                <tr>
                  <b style='text-align: center; color: white; font-size: 30px;'>Ausgabe der Login Tabelle</b>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>Password</td>
                </tr>";
        $fetch = mysqli_query($link, $sql);
        while($fetch_anzahl = mysqli_fetch_assoc($fetch)) {
        echo '<tr>
              <td>'.$fetch_anzahl['username'].'</td>
              <td>'.$fetch_anzahl['password'].'</td>
            </tr>';
        }
        echo '</table>';
    }

	if (isset($_SESSION['anmelden'])) {

		/************** Abfrage ob überhaupt was übergeben wurde **************/
		if ($password != "" && $username != "") {

			$abfragee = "SELECT * FROM loginUser";
      $ergebniss = mysqli_query($link, $abfragee);
      while ($row = mysqli_fetch_object($ergebniss)) {
        if ($username == $row->username && $password == $row->password) {
          $_SESSION['check'] = true;
          header('Location: index.php?action=home');
        } else {
          echo "
              <body class='body'>
                <div  style='z-index: 100;' class='center'>
                  <h1>Login</h1>
                  <form action='login.php' method='POST'>
                    <div class='txt_field'>
                      <input type='text' name='username' value='$username' required>
                      <span></span>
                      <label>Username</label>
                    </div>
                    <div class='txt_field'>
                      <input type='password' name='password' value='$password' required>
                      <span></span>
                      <label>Passwort</label>
                    </div>
                    <div class='pass'>Passwort vergessen?</div>
                    <input type='submit' name='anmelden' value='Login'>
                    <div class='signup_link'><h3 style='color: red;'>Falsches Passwort oder Name</h3></div>
                    <div class='signup_link'>
                      Noch kein Account? <a href='signup.php'>Registrieren</a>
                    </div>
                  </form>
                </div>
              </body>";
        }
      }
    }
  }
?>
  <body class="body">
    <div class="center">
      <h1>Login</h1>
      <form action="login.php" method="POST">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Passwort</label>
        </div>
        <div class="pass">Passwort vergessen?</div>
        <input type="submit" name="anmelden" value="Login">
        <div class="signup_link">
          Noch kein Account? <a href="signup.php">Registrieren</a>
          <input type="hidden" name="check" value="false">
        </div>
      </form>
    </div>
  </body>