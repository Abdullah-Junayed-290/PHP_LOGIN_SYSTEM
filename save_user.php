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
try {
  session_start();
  $conn = new mysqli("localhost", "root", "", "testdb");
  // echo "<h2>Your connection is successful. ✅️</h2>";
} catch (Exprection $e) {
  echo "<h2>Your db connection is failed. 🚫</h2>" . $e;
}

$username = $_POST["username"];
$password= $_POST["password"];

$sql = "INSERT INTO users_login (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) == true) {
  echo "<h3 style='color: green;'Register user successful.</h3>";
  echo "<a href='register_form.html'>now login your account</a>";
} else {
  echo "<h3 style='color: red;'>Register user failed!</h3>";
  echo "<a href='login.html'>go back to login page</a>";
}
?>

</body>
</html>