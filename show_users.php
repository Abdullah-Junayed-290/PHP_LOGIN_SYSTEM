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
      die("<h2>DB connection failed! 🚫</h2>". $conn->connect_error);
    }
    
    $search_query = "SELECT * FROM users_login";
    $result = $conn->query($search_query);
    
    echo "
      <table border='1' cellspacing='0' width='100%'>
        <tr>
          <th>ID</th>
          <th>USERNAME</th>
          <th>PASSWORD</th>
        </tr>
    ";
    if ($result->num_rows > 0 && $_SESSION["user"] == "Admin") {
      while($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>".$row["id"]."</td>
          <td rowspan='2'>".$row["username"]."</td>
          <td rowspan='2'>".$row["password"]."</td>
        </tr>
        <td>
          <a href='edit_user.php?id={$row['id']}'>Edit ✏️</a> |
          <a href='delete_user.php?id={$row['id']}'>Delete 🗑</a>
        </td>
      ";
      }
    } else {
      echo "
        <tr>
          <td colspan='3' align='center'>no users found.</td>
        </tr>
      ";
    }
    echo "</table>";
    
    $conn->close();
  ?>
</body>
</html>