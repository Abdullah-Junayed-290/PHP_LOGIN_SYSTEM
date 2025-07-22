<?php
session_start();
session_destroy();
setcookie("user", "", time() - 3600); // Remove cookie
header("Location: login.html");
?>