<?php
$conn = new mysqli("localhost", "root", "", "testdb");

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if username exists
$check = $conn->query("SELECT * FROM users_login WHERE username='$username'");
if ($check->num_rows > 0) {
  echo "⚠️ Username already exists!";
  exit;
}

$sql = "INSERT INTO users_login (username, password) VALUES ('$username', '$hashedPassword')";
if ($conn->query($sql) === TRUE) {
  echo "✅ Registered! <a href='login.html'>Login Now</a>";
} else {
  echo "❌ Error: " . $conn->error;
}
?>