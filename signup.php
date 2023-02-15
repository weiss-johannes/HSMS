<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/loginstyle.css">
    <title>Registrieren</title>
  </head>
  <?php
    session_name('login');
    session_start();
  ?>
  <body class="body">
    <div class="center">
      <h1>Registrieren</h1>
      <form method="POST">
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
        <input type="submit" value="Signup">
        <div class="signup_link">
        </div>
      </form>
    </div>
  </body>
</html>
