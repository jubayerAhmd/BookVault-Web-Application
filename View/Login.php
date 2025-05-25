<!--Create Session and Cookie-->
<?php
// Start session
session_start();
// Set session data
$_SESSION['username'] = 'Rakib'; // Example data
$_SESSION['email'] = 'rakib27@example.com'; // Example data

// Set a cookie named "visited_login" with a value and expiration time (1 hour here)
setcookie(
    "visited_login",   // name
    "YES.",             // value
    time() + 3600,     // expire (1 hour from now)
    "/",               // path (root directory)
    "localhost",       // domain (local server, e.g., localhost or .example.com)
    false,             // secure (false = allow HTTP, true = only HTTPS)
    true               // httponly (true = not accessible via JavaScript)
);
?>


<!--This used when PHP Validation-->
<?php include '../Control/LoginValidation.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BookVault Login</title>
    <link rel="stylesheet" href="../CSS/LoginStyle.css">

    <!--This is for JS validation-->
        <script src="../JS/LoginValidation.js" defer></script>
    <!-- -->
    <!--This is for change page using JS-->
        <script src="../JS/LoginToSignUp.js" defer></script>
    <!-- -->

</head>
<body>
    <div class="login-container">
        <header class="header">
            <h2>BookVault Login</h2>
        </header>

        <!-- Added onsubmit event -->
        <!--This used when PHP Validation-->
        <form  method="POST" class="login-form" action="">
        <!-- -->
        <!--This used when JS Validation--
            <form id="LoginForm" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
         -->
            <table>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td>
                        <input type="text" id="username" name="username<" placeholder="Enter your username">
                        <span id="usernameError" class="error-message"><?php if(isset($usernameErr)) echo $usernameErr ?></span> <!-- Error span -->
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                        <span id="passwordError" class="error-message"><?php if(isset($passwordErr)) echo $passwordErr ?></span> <!-- Error span -->
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="button-container">
                            <button type="submit" class="login-button">Login</button>
                            <button type="submit" class="forget-password-button">Forget Password</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>

        <div class="register">
             <h3 class="register-heading" onclick="goToSignup()" style="cursor: pointer;">Register</h3>
        </div>

    </div>
    
</body>
</html>
