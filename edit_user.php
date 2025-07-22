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

 $id = $_GET["id"];
 $result = $conn->query("SELECT * FROM users_login WHERE id=$id");
 $user = $result->fetch_assoc();
 ?>
 
 <h2>Edit User</h2>
 <form action="update_user.php" method="post" accept-charset="utf-8">
   <input type="hidden" name="id" value="<?= $user["id"] ?>" />
   <br /><br />
   <input type="text" name="username" value="<?= $user["username"] ?>" />
  <br /><br />
  <input type="password" name="password" value="<?= $user["password"] ?>" />
  <br /><br />
  <button type="submit">Update</button>
 </form>
</body>
</html>