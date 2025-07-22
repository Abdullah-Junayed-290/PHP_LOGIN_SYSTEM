<?php
session_start();
if (!isset($_SESSION['user']) && !isset($_COOKIE['user'])) {
  echo "⚠️ Access denied! <a href='login.html'>Login</a>";
  exit;
}
$user = $_SESSION['user'] ?? $_COOKIE['user'];
echo "👋 Welcome, $user<br>";
echo "<a href='change_password.php'>Change Password</a><br>";
echo "<a href='logout.php'>Logout</a>";
?>