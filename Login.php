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
