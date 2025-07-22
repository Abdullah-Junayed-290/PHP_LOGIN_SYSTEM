<?php 
  session_start();
  $conn = new mysqli("localhost", "root", "", "testdb");
  if ($conn->connect_error) {
    die("DB Connection failed! ❌️". $conn->connect_error);
  }
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM users_login WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $_SESSION["user"] = $username;
    echo "<h2>Login Successful.</h2> <br /> <a href='dashboard.php'>Go to Dashboard</a>";
  } else {
    echo "❌️ Invalid credentials!";
  }
?>