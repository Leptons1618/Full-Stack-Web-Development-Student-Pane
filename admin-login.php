<!-- Admin Login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
        body{ 
            font: 14px sans-serif;
            background-color: #282a36;
        }
        .wrapper{ width: 350px; padding: 20px; }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #f8f8f2;
        }
        .logo {
            background-color: #282a36;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
            font-size: 50px;
        }
        .login-form {
            background-color: #282a36;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }
        .login-form input {
            background-color: #282a36;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }
        .login-form input:hover {
            background-color: #44475a;
            color: #fff;
            text-align: center;
            padding: 1em;
        }
        .login-form input:focus {
            background-color: #44475a;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }
        .login-form input:active {
            background-color: #44475a;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }
        .login-form input:visited {
            background-color: #fff;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
        }
        form {
            background-color: #44475a;
            color: #f8f8f2;
            text-align: center;
            padding: 1em;
            max-width: 300px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            align-items: center;
        }
        h1 {
            font-size: 50px;
        }
        .login-button {
            display: block;
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

        .login-button:hover {
            background-color: rgb(56, 7, 30);
        }
    </style>
</head>
<body>
    <div class="logo">
        <h1>Admin Login</h1>
    </div>
    <div class="login-form">
        <form action="check_admin_login.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="admin" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="admin123" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="login-button">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
