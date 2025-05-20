<!-- this is for PHP validation-->
<?php include './Control/SignUpValidation.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User SignUp</title>
    <link rel="stylesheet" href="./CSS/SignUpStyle.css">

    <!--This is for JS validation--
        <script src="./JS/SignUpValidation.js" defer></script>
    -->
    <!--This is for change page using JS--
        <script src="./JS/SignUpToLogin.js" defer></script>
    -->

</head>
<body>

<header class="header">
    <?php echo "BookVault"; ?>
</header>

<h2>User Registration Form</h2>

<!--This used when PHP Validation-->
<form method="POST" action="">

<!--This used when JS Validation--
<form id="signupForm" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
-->

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>Full Name:</td>
            <td>
                <input type="text" id="fullname" name="fullname">
                <span id="nameError" style="color:red;"><?php echo $errors['fullname'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" id="email" name="email">
                <span id="emailError" style="color:red;"><?php echo $errors['email'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <input type="password" id="password" name="password">
                <span id="passwordError" style="color:red;"><?php echo $errors['password'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
                <span id="genderError" style="color:red;"><?php echo $errors['gender'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Country:</td>
            <td>
                <select name="country">
                    <option value="">--Select--</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>
                    <option value="India">India</option>
                    <option value="Canada">Canada</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Japan">Japan</option>
                    <option value="Bangladesh">Bangladesh</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hobbies:</td>
            <td>
                <input type="checkbox" name="hobbies[]" value="Reading"> Reading
                <input type="checkbox" name="hobbies[]" value="Sports"> Sports
                <input type="checkbox" name="hobbies[]" value="Music"> Music
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" onclick="goToLogin()" style="cursor: pointer;" value="Login">
                <input type="submit" value="Register">
                <input type="reset" value="Clear">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
