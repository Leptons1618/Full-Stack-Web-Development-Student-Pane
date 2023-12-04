<<<<<<< HEAD
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "admin" && $password == "admin123") {
        header("Location: admin.php?username=$username");
    } else {
        header("Location: admin-login.php?error=Invalid username or password");
    }
}
?>
=======
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "admin" && $password == "admin123") {
        header("Location: admin.php?username=$username");
    } else {
        header("Location: admin-login.php?error=Invalid username or password");
    }
}
?>
>>>>>>> 3f5812bbad250e7dfae0cc9b14871c13a1685d48
