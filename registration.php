<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title>Student Registration</title>
    <script src="validation.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #282a36;
            margin: 0;
            padding: 0;
            color: #f8f8f2;
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
        }

        form {
            max-width: 800px;
            margin: 20px auto;
            background-color: #44475a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #f8f8f2;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #6272a4;
            border-radius: 4px;
            background-color: #3b3b3b;
            color: #f8f8f2;
        }

        input[type="radio"] {
            display: inline-block;
            width: auto;
            margin-right: 10px;
        }

        input[type="radio"] + label {
            display: inline-block;
            margin-right: 20px;
            color: #f8f8f2;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 1.1em;
            color: #f8f8f2;
        }

        .personal-info {
            display: none;
        }

        .user-account {
            display: block;
        }

        .required::before {
            content: "*";
            color: red;
            margin-right: 4px;
        }

        .error-message {
            color: #ff5555;
            font-weight: bold;
        }

        .success-message {
            color: #50fa7b;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 3em;
            color: #fff;
        }

        hr {
            border: 1px solid #fff;
            margin: 20px 0;
        }

        .top-panel-container {
            background-color: #282a36;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }

        a {
            padding: 10px 20px;
            color: #007bff;
            /* font-weight: bold; */
        }

        .view-button-container {
            position: absolute;
            top: 20px;
            right: 20px;
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

        .submit-button {
            display: inline-block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: rgb(155, 36, 48);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        /* .submit-button:disabled {
            background-color: rgb(155, 36, 48, 0.5);
            cursor: not-allowed;
        } */

        .submit-button:hover {
            background-color: rgb(56, 7, 30);
        }

        .academic-info {
            display: none;
        }

        .preview-info p {
            text-align: left;
        }
    </style>
    <script>
        function nextPage() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            if (password == confirm_password) {
                document.querySelector('.user-account').style.display = "none";
                document.querySelector('.personal-info').style.display = "block";
                return;
            }
            else {
                alert("Passwords do not match!");
            }
        }
        function nextAcademic() {
            document.querySelector('.personal-info').style.display = "none";
            document.querySelector('.academic-info').style.display = "block";
        }
        function previewPage() {
            // Get values from form inputs
            var username = document.getElementById("username").value;
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;
            var gender = document.querySelector('input[name="gender"]:checked').value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;
            var degree = document.getElementById("degree").value;
            var qualification = document.getElementById("qualification").value;
            var course = document.getElementById("course").value;
            var photo = document.getElementById("photo").value;

            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                document.getElementById("preview_photo").textContent = reader.result;
            }

            // Set values in preview section
            document.getElementById("preview_username").textContent = username;
            document.getElementById("preview_first_name").textContent = first_name;
            document.getElementById("preview_last_name").textContent = last_name;
            document.getElementById("preview_gender").textContent = gender;
            document.getElementById("preview_email").textContent = email;
            document.getElementById("preview_phone").textContent = phone;
            document.getElementById("preview_address").textContent = address;
            document.getElementById("preview_degree").textContent = degree;
            document.getElementById("preview_qualification").textContent = qualification;
            document.getElementById("preview_course").textContent = course;
            document.getElementById("preview_photo_path").textContent = photo;

            // Hide current section and show preview section
            document.querySelector('.academic-info').style.display = "none";
            document.querySelector('.preview-info').style.display = "block";
        }

        function editForm() {
            // Hide preview section and show academic info section
            document.querySelector('.preview-info').style.display = "none";
            document.querySelector('.academic-info').style.display = "block";
        }
    </script>
</head>
<body>
    <main>
        <?php
        require_once('save_data.php');
        ?>
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
        <form method="post" action="save_data.php" enctype="multipart/form-data">

            <h1>Student Registration</h1>
            <p>Welcome to our student registration page. Fill in the details below to register.</p>
            <hr>
            <div class="user-account">
                <h2>User Account</h2>
                <label for="username" class="required">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password" class="required">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password" class="required">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <button type="button" onclick="nextPage()" class="submit-button">Next</button>
            </div>
            <div class="personal-info">
                <h2>Personal Information</h2>
                <label for="first_name" class="required">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name" class="required">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>

                <label class="required">Gender:</label>
                <input type="radio" name="gender" id="male" value="Male" required> 
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="Female" required> 
                <label for="female">Female</label>
                <input type="radio" name="gender" id="other" value="Other" required> 
                <label for="other">Other</label>

                <label for="email" class="required">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone" class="required">Phone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="address" class="required">Address:</label>
                <textarea name="address" id="address" rows="5" required></textarea>

                <button type="button" onclick="nextAcademic()" class="submit-button">Next</button>
            </div>
            <div class="academic-info">
                <h2>Academic Information</h2>
                <label for="degree" class="required">Degree:</label>
                <select name="degree" id="degree" required>
                    <option value="M.Sc">M.Sc</option>
                    <option value="MCA">MCA</option>
                    <option value="Other">Other</option>
                </select>
                <label for="qualification" class="required">Qualification:</label>
                <select name="qualification" id="qualification" required>
                    <option value="B.Sc">B.Sc</option>
                    <option value="BCA">BCA</option>
                    <option value="Other">Other</option>
                </select>
                <label for="course" class="required">Course:</label>
                <select name="course" id="course" required>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Statistics">Statistics</option>
                    <option value="Biochemistry">Biochemistry</option>
                    <option value="GeoPhysics">GeoPhysics</option>
                </select>

                <label for="photo" class="required">Photo:</label>
                <input type="file" id="photo" name="photo" required>

                <button type="button" onclick="previewPage()" class="submit-button">Preview</button>
            </div>

            <div class="preview-info" style="display: none;">
                <h2>Preview</h2>
                <span id="preview_photo"></span>
                <p><strong>Username:</strong> <span id="preview_username"></span></p>
                <p><strong>Password:</strong> ********</p>
                <p><strong>First Name:</strong> <span id="preview_first_name"></span></p>
                <p><strong>Last Name:</strong> <span id="preview_last_name"></span></p>
                <p><strong>Gender:</strong> <span id="preview_gender"></span></p>
                <p><strong>Email:</strong> <span id="preview_email"></span></p>
                <p><strong>Phone:</strong> <span id="preview_phone"></span></p>
                <p><strong>Address:</strong> <span id="preview_address"></span></p>
                <p><strong>Degree:</strong> <span id="preview_degree"></span></p>
                <p><strong>Qualification:</strong> <span id="preview_qualification"></span></p>
                <p><strong>Course:</strong> <span id="preview_course"></span></p>
                <p><strong>Photo:</strong> <span id="preview_photo_path"></span></p>

                <div style="display: inline-block;">
                    <button type="button" onclick="editForm()" class="submit-button">Edit</button>
                    <button type="submit" class="submit-button">Submit</button>
                </div> 
            </div>
        </form>
    </main>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title>Student Registration</title>
    <script src="validation.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #282a36;
            margin: 0;
            padding: 0;
            color: #f8f8f2;
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
        }

        form {
            max-width: 800px;
            margin: 20px auto;
            background-color: #44475a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #f8f8f2;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #6272a4;
            border-radius: 4px;
            background-color: #3b3b3b;
            color: #f8f8f2;
        }

        input[type="radio"] {
            display: inline-block;
            width: auto;
            margin-right: 10px;
        }

        input[type="radio"] + label {
            display: inline-block;
            margin-right: 20px;
            color: #f8f8f2;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 1.1em;
            color: #f8f8f2;
        }

        .personal-info {
            display: none;
        }

        .user-account {
            display: block;
        }

        .required::before {
            content: "*";
            color: red;
            margin-right: 4px;
        }

        .error-message {
            color: #ff5555;
            font-weight: bold;
        }

        .success-message {
            color: #50fa7b;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 3em;
            color: #fff;
        }

        hr {
            border: 1px solid #fff;
            margin: 20px 0;
        }

        .top-panel-container {
            background-color: #282a36;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }

        a {
            padding: 10px 20px;
            color: #007bff;
            /* font-weight: bold; */
        }

        .view-button-container {
            position: absolute;
            top: 20px;
            right: 20px;
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

        .submit-button {
            display: inline-block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: rgb(155, 36, 48);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        /* .submit-button:disabled {
            background-color: rgb(155, 36, 48, 0.5);
            cursor: not-allowed;
        } */

        .submit-button:hover {
            background-color: rgb(56, 7, 30);
        }

        .academic-info {
            display: none;
        }

        .preview-info p {
            text-align: left;
        }
    </style>
    <script>
        function nextPage() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            if (password == confirm_password) {
                document.querySelector('.user-account').style.display = "none";
                document.querySelector('.personal-info').style.display = "block";
                return;
            }
            else {
                alert("Passwords do not match!");
            }
        }
        function nextAcademic() {
            document.querySelector('.personal-info').style.display = "none";
            document.querySelector('.academic-info').style.display = "block";
        }
        function previewPage() {
            // Get values from form inputs
            var username = document.getElementById("username").value;
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;
            var gender = document.querySelector('input[name="gender"]:checked').value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;
            var degree = document.getElementById("degree").value;
            var qualification = document.getElementById("qualification").value;
            var course = document.getElementById("course").value;
            var photo = document.getElementById("photo").value;

            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                document.getElementById("preview_photo").textContent = reader.result;
            }

            // Set values in preview section
            document.getElementById("preview_username").textContent = username;
            document.getElementById("preview_first_name").textContent = first_name;
            document.getElementById("preview_last_name").textContent = last_name;
            document.getElementById("preview_gender").textContent = gender;
            document.getElementById("preview_email").textContent = email;
            document.getElementById("preview_phone").textContent = phone;
            document.getElementById("preview_address").textContent = address;
            document.getElementById("preview_degree").textContent = degree;
            document.getElementById("preview_qualification").textContent = qualification;
            document.getElementById("preview_course").textContent = course;
            document.getElementById("preview_photo_path").textContent = photo;

            // Hide current section and show preview section
            document.querySelector('.academic-info').style.display = "none";
            document.querySelector('.preview-info').style.display = "block";
        }

        function editForm() {
            // Hide preview section and show academic info section
            document.querySelector('.preview-info').style.display = "none";
            document.querySelector('.academic-info').style.display = "block";
        }
    </script>
</head>
<body>
    <main>
        <?php
        require_once('save_data.php');
        ?>
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
        <form method="post" action="save_data.php" enctype="multipart/form-data">

            <h1>Student Registration</h1>
            <p>Welcome to our student registration page. Fill in the details below to register.</p>
            <hr>
            <div class="user-account">
                <h2>User Account</h2>
                <label for="username" class="required">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password" class="required">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password" class="required">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <button type="button" onclick="nextPage()" class="submit-button">Next</button>
            </div>
            <div class="personal-info">
                <h2>Personal Information</h2>
                <label for="first_name" class="required">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name" class="required">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>

                <label class="required">Gender:</label>
                <input type="radio" name="gender" id="male" value="Male" required> 
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="Female" required> 
                <label for="female">Female</label>
                <input type="radio" name="gender" id="other" value="Other" required> 
                <label for="other">Other</label>

                <label for="email" class="required">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone" class="required">Phone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="address" class="required">Address:</label>
                <textarea name="address" id="address" rows="5" required></textarea>

                <button type="button" onclick="nextAcademic()" class="submit-button">Next</button>
            </div>
            <div class="academic-info">
                <h2>Academic Information</h2>
                <label for="degree" class="required">Degree:</label>
                <select name="degree" id="degree" required>
                    <option value="M.Sc">M.Sc</option>
                    <option value="MCA">MCA</option>
                    <option value="Other">Other</option>
                </select>
                <label for="qualification" class="required">Qualification:</label>
                <select name="qualification" id="qualification" required>
                    <option value="B.Sc">B.Sc</option>
                    <option value="BCA">BCA</option>
                    <option value="Other">Other</option>
                </select>
                <label for="course" class="required">Course:</label>
                <select name="course" id="course" required>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Statistics">Statistics</option>
                    <option value="Biochemistry">Biochemistry</option>
                    <option value="GeoPhysics">GeoPhysics</option>
                </select>

                <label for="photo" class="required">Photo:</label>
                <input type="file" id="photo" name="photo" required>

                <button type="button" onclick="previewPage()" class="submit-button">Preview</button>
            </div>

            <div class="preview-info" style="display: none;">
                <h2>Preview</h2>
                <span id="preview_photo"></span>
                <p><strong>Username:</strong> <span id="preview_username"></span></p>
                <p><strong>Password:</strong> ********</p>
                <p><strong>First Name:</strong> <span id="preview_first_name"></span></p>
                <p><strong>Last Name:</strong> <span id="preview_last_name"></span></p>
                <p><strong>Gender:</strong> <span id="preview_gender"></span></p>
                <p><strong>Email:</strong> <span id="preview_email"></span></p>
                <p><strong>Phone:</strong> <span id="preview_phone"></span></p>
                <p><strong>Address:</strong> <span id="preview_address"></span></p>
                <p><strong>Degree:</strong> <span id="preview_degree"></span></p>
                <p><strong>Qualification:</strong> <span id="preview_qualification"></span></p>
                <p><strong>Course:</strong> <span id="preview_course"></span></p>
                <p><strong>Photo:</strong> <span id="preview_photo_path"></span></p>

                <div style="display: inline-block;">
                    <button type="button" onclick="editForm()" class="submit-button">Edit</button>
                    <button type="submit" class="submit-button">Submit</button>
                </div> 
            </div>
        </form>
    </main>
</body>
>>>>>>> 3f5812bbad250e7dfae0cc9b14871c13a1685d48
</html>