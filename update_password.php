<?php
session_start();
$conn = new mysqli("localhost", "root", "", "testdb");

$user = $_SESSION['user'] ?? $_COOKIE['user'];
$current = $_POST['current'];
$new = $_POST['new'];

$result = $conn->query("SELECT * FROM users_login WHERE username='$user'");
$data = $result->fetch_assoc();

// ✅ Verify old password
if (password_verify($current, $data['password'])) {
  $newHash = password_hash($new, PASSWORD_DEFAULT);
  $conn->query("UPDATE users_login SET password='$newHash' WHERE username='$user'");
  echo "🔒 Password updated successfully!";
} else {
  echo "❌ Current password is wrong!";
}
?>