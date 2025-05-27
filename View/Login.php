<!--Create Session and Cookie-->
<?php
// Start session
session_start();
// Set session data
$_SESSION['username'] = 'Rakib'; // Example data
$_SESSION['id'] = '0123456789'; // Example data

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


<!--This used when PHP Validation and connect DB-->
<?php 
include '../Control/LoginValidation.php';
include '../Model/SQL_Connection.php';

// Initialize form variables
$id = 0;
$fullname = $password = $role = '';
$flag=true;

// Database connection
$conn = create_Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Login'])) {

    // Collect and sanitize form Input data
    $fullname = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';


    // Checking (FullName,Email,Password,Gender,Role) is not empty.
    if (empty($fullname)) {
    $flag=false;
    }

    if (empty($password)) {
    $flag=false;
    }

    if ($flag) {
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, name, password, role FROM user WHERE name = ? AND password = ?");
    $stmt->bind_param("ss", $fullname, $password); // "ss" = two strings
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . 
                 " - Name: " . $row["name"] . 
                 " - Role: " . $row["role"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    $stmt->close();
    $conn->close();
}

}
?>

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
                        <input type="text" id="username" name="username" placeholder="Enter your username">
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
                            <button type="submit" name="Login" class="login-button">Login</button>
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
