<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="./login.php" method="post">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="signup.php">Signup</a>
        </div>
      </form>
    </div>
  </body>
</html>

<?php
    require("./db_init.php");
    $_POST = array_map('htmlspecialchars', $_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login";
    $erg = mysqli_query($link, $sql);
    $anzahl = mysqli_affected_rows($link);
    if ($anzahl == 0) {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
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

	if (isset($_POST['Login'])) {

		/************** Abfrage ob überhaupt was übergeben wurde **************/
		if ($password != "" && $username != "") {

			/*** Auswahl ob ein Schüler mit dem Namen und Password existiert **/
			$select_login = "SELECT username, password from login WHERE username = '$username' and password = '$password'";
			$qry_select_login = mysqli_query($link, $select_login) or die("Error: " . mysqli_error($link));

      $anzahl = mysqli_affected_rows($link);
      if ($anzahl != 0) {
        echo "<h3 style='color: red;'>Falscher Username oder Passwort</h3><br>";
      } else {
        echo "<h3 style='color: red;'>Keine Datensätze gefunden</h3><br>";
        $sql = "INSERT INTO login ('username', 'password') VALUES ('admin', 'admin')";
        $erg = mysqli_query($link, $sql); 
      }
					
			if (mysqli_affected_rows($link) > 0) {
			  $check = mysqli_fetch_array($qry_select_login, MYSQLI_BOTH);
			} else {
        $check = 0;
      }

      /************* Setzen der Readalr-Variable, damit nur einmalige Abfrage möglich ist ***********************/
			if ($check > 0) {
        $select_schueler = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
				$qry_select_schueler = mysqli_query($link, $select_schueler);
				$fetch_select_schueler = mysqli_fetch_array($qry_select_schueler, MYSQLI_BOTH);
        echo "Hat funktioniert";
      }
    }
  }
?>