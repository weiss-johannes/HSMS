<!--
    Autor: Simon Kleinschmidt, Alex Glaser, Joseph Weiß
    erstellt am: 08.02.2023   zuletzt geändert: 15.02.2023
-->

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/loginstyle.css">
    <title>Registrieren</title>
  </head>
  <?php
    $_POST = array_map('htmlspecialchars', $_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = @$_POST['submit'];
    
    if ($submit) {
      require("./db_init.php");
      $sql = "INSERT INTO loginUser VALUES (\"$username\", \"$password\")"; 
      mysqli_query($link, $sql);
      header('Location: login.php');
    }
  ?>
  <body class="body">
    <div class="center">
      <h1>Registrieren</h1>
      <form action="signup.php" method="POST">
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
        <input type="submit" name="submit" value="Signup">
        <div class="signup_link">
        </div>
      </form>
    </div>
  </body>
</html>
