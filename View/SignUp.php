<?php
// Include validation file,Database-Connection file.
include '../Control/SignUpValidation.php';
include '../Model/SQL_Connection.php';

// Database connection
$conn = create_Connection();  // Store the connection object

$flag = true;
$success = '';

// Get user info then insert into Database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Register'])) {

    // Collect and sanitize form data
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'];
    $hobbies = isset($_POST['hobbies']) ? implode(",", $_POST['hobbies']) : '';
    $roles = isset($_POST['roles']) ? implode(",", $_POST['roles']) : '';

    // Basic Checking
    if (empty($fullname)) {
        $flag = false;
    }
    if (empty($email)) {
        $flag = false;
    }
    if (empty($password)) {
        $flag = false;
    }
    if (empty($roles)) {
        $flag = false;
    }

    if ($flag) {
        // Optional: Hash the password (recommended for security)
       // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO user (name, email, password, gender, country, hobbie, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssssss", $fullname, $email, $password, $gender, $country, $hobbies, $roles);

            if ($stmt->execute()) {
                $success = "Registration successful!";
            } else {
                $errors['db'] = "Database error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errors['db'] = "Prepare failed: " . $conn->error;
        }
    }
}
// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>User SignUp</title>
    <link rel="stylesheet" href="../CSS/SignUpStyle.css">
    <script src="../JS/SignUpToLogin.js" defer></script>
</head>
<body>

<header class="header">
    <?php echo "BookVault"; ?>
</header>

<h2>User Registration Form</h2>

<!-- Display Success Message -->
<?php if (!empty($success)): ?>
    <p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>


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
            <td>Role:</td>
            <td>
                <input type="checkbox" name="roles[]" value="Writer"> Writer
                <input type="checkbox" name="roles[]" value="Member"> Member
                <span id="roleError" style="color:red;"><?php echo $errors['roles'] ?? ''; ?></span>
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
