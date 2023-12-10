<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);
    } else {
        $photoPath = ""; // If no file is uploaded
    }

    if ((empty($username) || empty($password) || empty($confirmPassword) || empty($firstName) || empty($lastName) || empty($gender) || empty($mail) || empty($phone) || empty($address) || empty($course)) || empty($qualification)) {
        echo "<p style='color: red;'>Please fill in all the fields.</p>";
    } else {
        // Check if username already exists
        // ...

        // Generate a student ID sequentially based on course
        if ($degree == "M.Sc" && $course == "Computer Science") {
            $studentId = "CS-" . rand(1000, 9999);
        } else if ($degree == "MCA" && $course == "MCA") {
            $studentId = "MCA-" . rand(1000, 9999);
        } else if ($degree == "M.Sc" && $course == "Mathematics") {
            $studentId = "MATH-" . rand(1000, 9999);
        } else if ($degree == "M.Sc" && $course == "Physics") {
            $studentId = "PHY-" . rand(1000, 9999);
        } else if ($degree == "M.Sc" && $course == "Chemistry") {
            $studentId = "CHEM-" . rand(1000, 9999);
        } else if ($degree == "M.Sc" && $course == "Statistics") {
            $studentId = "STAT-" . rand(1000, 9999);
        } else if ($degree == "M.Sc" && $course == "Biochemistry") {
            $studentId = "BIOCHEM-" . rand(1000, 9999);
        } else if ($degree == "M.Sc" && $course == "GeoPhysics") {
            $studentId = "GEOPHY-" . rand(1000, 9999);
        } else if ($degree == "M.Sc" && $course == "Other") {
            $studentId = "MSC-" . rand(1000, 9999);
        } else if ($degree == "MCA" && $course == "Other") {
            $studentId = "MCA-" . rand(1000, 9999);
        } else if ($degree == "Other" && $course == "Other") {
            $studentId = "OTHER-" . rand(1000, 9999);
        }

        // hash the password
        $password = password_hash($password, PASSWORD_DEFAULT); // Use PASSWORD_BCRYPT if your PHP version < 5.5

        // Save the user-account data to the database
        $stmt = $conn->prepare("INSERT INTO users (studentId, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $studentId, $username, $password);
        if ($stmt->execute()) {
            $stmt->close();
        } else {
            echo "<p style='color: red;'>Something error appeared when saving user account data: " . $stmt->error . "</p>";
            $stmt->close();
        }
        
        // Save the personal-info data to the database
        $stmt = $conn->prepare("INSERT INTO students (studentId, first_name, last_name, gender, email, phone, address, degree, qualification, course, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $studentId, $firstName, $lastName, $gender, $mail, $phone, $address, $degree, $qualification, $course, $photoPath);
        
        if ($stmt->execute()) {
            header("Location: preview_data.php?id=" . $stmt->insert_id);
            exit();
        } else {
            echo "<p style='color: red;'>Error saving data: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
    $conn->close();
}
?>