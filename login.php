<?php
session_start();

if(isset($_SESSION['username'])) {
  header("Location: profile.php");
  exit();
}
if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $valid = true; 

  if($valid) {
    $_SESSION['username'] = $username;

    $cookie_name = "login";
    $cookie_value = json_encode(array(
      "username" => $username,
      "password" => $password
    ));
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");
    header("Location: profile.php");
    exit();
  }
}
?>

<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>

  <?php if(isset($_POST['login']) && !$valid): ?>
    <p>Incorrect username or password</p>
  <?php endif; ?>

  <form method="post">
    <label>Username:</label>
    <input type="text" name="username"><br>

    <label>Password:</label>
    <input type="password" name="password"><br>

    <input type="submit" name="login" value="Login">
  </form>
</body>
</html>
