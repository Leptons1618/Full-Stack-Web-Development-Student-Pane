<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
// else extract the user data from the session
else {
    $studentId = $_SESSION["studentId"];
    $username = $_SESSION["username"];
}

require_once('db_connection.php');

// Get the user data from the database
$sql = "SELECT * FROM students WHERE studentId = '$studentId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        header {
            background-color: #282a36;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }

        .top-panel-container {
            background-color: #282a36;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }

        a {
            color: #f8f8f2;
            text-decoration: none;
            padding: 7px;
        }
        a:hover {
            color: #bd93f9;
        }

        .student-info {
            text-align: center;
            padding: 1em;
        }

        .passport-size-photo {
            width: 150px;
            height: 150px;
        }

        strong {
            font-weight: bold;
        }

        hr {
            border: 1px solid #282a36;
            width: 40%;
        }

        .student-info-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Panel</h1>
    </header >
    <div class="top-panel-container">
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="registration.php">Register</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="privacy_policy.php">Privacy Policy</a>
        <a style="float: right;" class="logout" href="<?php session_destroy() ?>">Logout</a>
        <a style="float: right;" class="reset" href="reset_password.php">Reset Password</a>
    </div>
    <div class="student-info">
        <h2 class="student-info">Student Information</h2>
        <hr>
        <img src="<?php echo $row["photo"]; ?>" alt="Passport Size Photo" class="passport-size-photo">
        <p class="student-info">Welcome, <strong><?php echo $row["first_name"] . " " . $row["last_name"]; ?></strong></p>
        <p class="student-info">Your Student ID is: <strong><?php echo $row["studentId"]; ?></strong></p>
        <p class="student-info">Your Username is: <strong><?php echo $_SESSION["username"]; ?></strong></p>
        <p class="student-info">Your Gender is: <strong><?php echo $row["gender"]; ?></strong></p>
        <p class="student-info">Your Email is: <strong><?php echo $row["email"]; ?></strong></p>
        <p class="student-info">Your Phone Number is: <strong><?php echo $row["phone"]; ?></strong></p>
        <p class="student-info">Your Address is: <strong><?php echo $row["address"]; ?></strong></p>
        <p class="student-info">Your Course is: <strong><?php echo $row["course"]; ?></strong></p>
        <p class="student-info">Your Qualification is: <strong><?php echo $row["qualification"]; ?></strong></p>
        <p class="student-info">Your Ongoing Degree is: <strong><?php echo $row["degree"]; ?></strong></p>
    </div>
</body>
</html>
