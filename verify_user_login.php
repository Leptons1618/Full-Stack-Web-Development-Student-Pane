    <?php
    session_start();

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: welcome.php");
        exit;
    }

    require_once "db_connection.php";

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check if username is empty
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter username.";
        } else {
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if (empty($username_err) && empty($password_err)) {

            // Prepare a select statement
            $sql = "SELECT studentId, username, password FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($conn, $sql)) {

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {

                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {

                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $studentId, $username, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            // $hashed_password = trim($hashed_password);
                            // if ($password == $hashed_password) {
                            if (password_verify($password, $hashed_password)) {
                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION["studentId"] = $studentId;
                                $_SESSION["username"] = $username;

                                // Redirect user to welcome page
                                header("location: welcome.php");
                            } else {
                                // Password is not valid, display a generic error message with entered password and hashed password
                                header("location: login.php?error=invalid_password&username=$username&password=$password&hashed_password=$hashed_password");
                                mysqli_stmt_close($stmt);
                            }
                        }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
                }
            }
        }
        mysqli_close($conn);
    }
    ?>