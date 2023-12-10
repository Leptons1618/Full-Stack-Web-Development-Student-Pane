<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #282a36;
            color: #f8f8f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #282a36;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }

        main {
            background-color: #282a36;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
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

        .user-details {
            line-height: 1.5;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #44475a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .navigation {
            margin-top: 20px;
        }

        .navigation a {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 5px;
            background-color: #6272a4;
            color: #f8f8f2;
            text-decoration: none;
            border-radius: 4px;
        }

        .navigation a:hover {
            background-color: #44475a;
        }

        .go-back {
            text-decoration: none; 
            color: #fff; 
            background-color: #f44336; 
            padding: 10px 20px; 
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Data Viewer</h1>
    </header>
    
    <main>
        <div class="container">
            <?php
            require_once('db_connection.php');

            // Get all student IDs
            $stmt = $conn->prepare("SELECT studentId FROM students");
            $stmt->execute();
            $result = $stmt->get_result();
            $studentIds = [];
            while ($row = $result->fetch_assoc()) {
                $studentIds[] = $row['studentId'];
            }
            $stmt->close();

            // Get current ID
            $currentId = 0;

            // Fetch data for the current ID
            $stmt = $conn->prepare("SELECT * FROM students WHERE studentId = ?");
            $stmt->bind_param("i", $studentIds[$currentId]);
            $stmt->execute();
            $result = $stmt->get_result();

            // Display data
            if ($row = $result->fetch_assoc()) {
                echo "<p style='font-size: 20px; color: black;'><strong>Reg. ID:</strong> " . $row['studentId'] . "</p>";
                echo "<hr>";
                echo "<div class='user-details'>";
                if ($row['photo']) {
                    echo "<p><img src='" . $row['photo'] . "' alt='User Photo' class='passport-size-photo'></a></p>";
                } else {
                    echo "<p><strong>Photo:</strong> Not provided</p>";
                }
                echo "<p><strong>Name:</strong> " . $row['first_name'] . " " . $row['last_name'] . "</p>";
                echo "<p><strong>Gender:</strong> " . $row['gender'] . "</p>";
                echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                echo "<p><strong>Phone:</strong> " . ($row['phone'] ? $row['phone'] : "N/A") . "</p>";
                echo "<p><strong>Highest Qualification:</strong> " . ($row['qualification'] ? $row['qualification'] : "N/A") . "</p>";
                echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";                
                echo "<p><strong>Course:</strong> " . $row['course'] . "</p>";
                echo "</div>";
            } else {
                echo "<p style='color: red;'>Data not found for ID: $currentId</p>";
            }
            $stmt->close();
            // Display navigation buttons
            echo "<div class='navigation'>";
            echo "<a href='view_data.php?studentId=" . ($currentId - 1) . "'>Previous</a>";
            echo "<a href='view_data.php?studentId=" . ($currentId + 1) . "'>Next</a>";
            echo "</div>";
            $conn->close();
            ?>
        </div>
    </main>
    <div style="text-align: center;">
        <a href="registration.php" class="go-back">Go to Registration Page</a>
    </div>
</body>
</html>
