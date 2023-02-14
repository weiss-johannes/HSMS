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
          <input type="text" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required>
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
        </tr>
        </table>';
        }
    }
?>