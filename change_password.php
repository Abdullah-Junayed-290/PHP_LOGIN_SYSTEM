<?php
session_start();
if (!isset($_SESSION['user']) && !isset($_COOKIE['user'])) {
  echo "⚠️ Access denied!";
  exit;
}
?>

<h2>Change Password</h2>
<form method="post" action="update_password.php">
  Current Password: <input type="password" name="current" required><br><br>
  New Password: <input type="password" name="new" required><br><br>
  <input type="submit" value="Update Password">
</form>