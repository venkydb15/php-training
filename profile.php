<?php
session_start();

if(!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

if(isset($_COOKIE['login'])) {
  $login_data = json_decode($_COOKIE['login'], true);
  $username = $login_data['username'];

  // Check if the saved password matches the current password (e.g. by querying a database)
  $valid = true; // Replace with actual validation logic

  if(!$valid) {
    // If the saved password is no longer valid, clear the cookie
    setcookie("login", "", time() - 3600, "/");
  }
}

?>

<html>
<head>
  <title>Profile</title>
</head>
<body>
  <h1>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></h1>

  <?php if(isset($username)): ?>
    <p>Your login information is saved</p>
  <?php endif; ?>

  <a href="logout.php">Logout</a>
</body>
</html>
