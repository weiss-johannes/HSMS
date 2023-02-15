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

    require("./db_init.php");
    $_POST = array_map('htmlspecialchars', $_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3>";
    } else {
        echo "<table>
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

			$abfragee = "SELECT * FROM login";
      $ergebniss = mysqli_query($link, $abfragee);

      while ($row = mysqli_fetch_object($ergebniss)) {
        if ($username == $row->username and $password == $row->password) {
          header('Location: index.php?check=true');
        } else {
          echo "
              <div class='center'>
                <h1>Login</h1>
                <form action='login.php' method='post'>
                  <div class='txt_field'>
                    <input type='text' name='username' required>
                    <span></span>
                    <label>Username</label>
                  </div>
                  <div class='txt_field'>
                    <input type='password' name='password' required>
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
              </div>";
          $check = true;
        }
      }
    }
  }
?>

    <div class="center">
      <h1>Login</h1>
      <form action="login.php" method="post">
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
        </div>
      </form>
    </div>
</html>