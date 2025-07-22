<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A new web page">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="favicon.ico">
    <title>Document</title>
    <style>
        /* Minimal CSS Reset */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; background: #fafbfc; color: #222; min-height: 100vh; line-height: 1.6; text-align: center; }
    </style>
</head>
<body>
  <?php
  session_start();
  $conn = new mysqli("localhost", "root", "", "testdb");
  if ($conn->connect_error) {
    die("<h2>DB connection failed! 🚫</h2>" . $conn->connect_error);
  }
  
  $id = $_POST["id"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $update_query = "UPDATE users_login SET username='$username', password='$password' WHERE id=$id";
  if($conn->query($update_query) == TRUE) {
    echo "<h2>✅️ User updated.</h2>";
    echo "<a href='show_users.php'>Back</a>";
  } else {
    echo "<h2>Error 🚫</h2>". $conn->error;
    echo "<a href='show_users.php'>Back</a>";
  }
  $conn->close();
  ?>
</body>
</html>