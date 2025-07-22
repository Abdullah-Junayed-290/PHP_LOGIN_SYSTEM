<?php
session_start();
$conn = new mysqli("localhost", "root", "", "testdb");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users_login WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $user = $result->fetch_assoc();

  if (password_verify($password, $user['password'])) {
    $_SESSION['user'] = $username;

    // ✅ Remember Me (set cookie for 1 day)
    if (isset($_POST['remember'])) {
      setcookie("user", $username, time() + 86400);
    }

    echo "✅ Login successful! <a href='dashboard.php'>Go to Dashboard</a>";
  } else {
    echo "❌ Wrong password!";
  }
} else {
  echo "❌ User not found!";
}
?>