<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Details</title>
    <style>
        body{ font: 14px sans-serif; background-color: #282a36; color: #f8f8f2;}
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

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success-message {
            color: #008000;
            font-weight: bold;
        }

        .user-details {
            line-height: 1.5;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-top: 10px;
        }

        .passport-size-photo {
            width: 150px;
            height: 150px;
        }
        
        strong {
            font-weight: bold;
        }

        .go-back {
            text-decoration: none; 
            color: #fff; 
            background-color: #f44336; 
            padding: 10px 20px; 
            border-radius: 4px;
        }

        .view-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
        .view-button:hover {
            background-color: #0056b3;
        }

        .view-button-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        a {
            color: #f8f8f2;
            text-decoration: none;
            padding: 7px;
        }
        a:hover {
            color: #bd93f9;
        }

        .user-details {
            background-color: #bd93f9;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
        }

        .user-details p {
            color: black;
            font-weight:500;
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
    </div>
    <p class='success-message' style='text-align: center; color: #f00;'>Registration Successfull!</p>
    <div class="container">

        <!-- show the preview of provided details -->
        <h2>Registration Details</h2>
        <p><strong>Username: </strong>username</p>
        <p><strong>Last Name: </strong>lastName</p>
    </div>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Details</title>
    <style>
        body{ font: 14px sans-serif; background-color: #282a36; color: #f8f8f2;}
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

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success-message {
            color: #008000;
            font-weight: bold;
        }

        .user-details {
            line-height: 1.5;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-top: 10px;
        }

        .passport-size-photo {
            width: 150px;
            height: 150px;
        }
        
        strong {
            font-weight: bold;
        }

        .go-back {
            text-decoration: none; 
            color: #fff; 
            background-color: #f44336; 
            padding: 10px 20px; 
            border-radius: 4px;
        }

        .view-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
        .view-button:hover {
            background-color: #0056b3;
        }

        .view-button-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        a {
            color: #f8f8f2;
            text-decoration: none;
            padding: 7px;
        }
        a:hover {
            color: #bd93f9;
        }

        .user-details {
            background-color: #bd93f9;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
        }

        .user-details p {
            color: black;
            font-weight:500;
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
    </div>
    <p class='success-message' style='text-align: center; color: #f00;'>Registration Successfull!</p>
    <div class="container">
        <?php
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm_password"];
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $gender = $_POST["gender"];
        $mail = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $degree = $_POST["degree"];
        $qualification = $_POST["qualification"];
        $course = $_POST["course"];
        // Handle uploaded photo
        if ($_FILES["photo"]["error"] == 0) {
            $photoName = $_FILES["photo"]["name"];
            $photoPath = "uploads/" . $photoName; // Assuming you have an "uploads" folder
            move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);}
        // show the user details
        echo "<div class='user-details'>";
        echo "<p><strong>Username: </strong>" . $username . "</p>";
        echo "<p><strong>First Name: </strong>" . $firstName . "</p>";
        echo "<p><strong>Last Name: </strong>" . $lastName . "</p>";
    ?>
    </div>
</body>
</html>
>>>>>>> 3f5812bbad250e7dfae0cc9b14871c13a1685d48
