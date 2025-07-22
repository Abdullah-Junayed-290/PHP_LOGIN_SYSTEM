<?php 
  session_start();
  
  if (!isset($_SESSION["user"])) {
    echo "⚠️ Access denied! <a href='login.html'>Login</a>";
    exit;
  }
  
  echo "👋 Welcome ". $_SESSION["user"];
  if ($_SESSION["user"] == "Admin") {
    echo "<br /><a href='show_users.php'>Manage Users</a>";
  }
  echo "<br /><a href='logout.php'>logout</a>";
?>