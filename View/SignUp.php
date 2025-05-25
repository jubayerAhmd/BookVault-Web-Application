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
    $roles = isset($_POST['Role']) ? implode(",", $_POST['Role']) : '';

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

<!-- Display Errors -->
<?php if (!empty($errors)): ?>
    <ul style="color:red;">
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="">
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>Full Name:</td>
            <td>
                <input type="text" name="fullname" value="<?php echo htmlspecialchars($_POST['fullname'] ?? '') ?>">
                <span style="color:red;"><?php echo $errors['fullname'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
                <span style="color:red;"><?php echo $errors['email'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <input type="password" name="password">
                <span style="color:red;"><?php echo $errors['password'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <input type="radio" name="gender" value="Male" <?php if(($_POST['gender'] ?? '')=='Male') echo 'checked'; ?>> Male
                <input type="radio" name="gender" value="Female" <?php if(($_POST['gender'] ?? '')=='Female') echo 'checked'; ?>> Female
                <span style="color:red;"><?php echo $errors['gender'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Country:</td>
            <td>
                <select name="country">
                    <option value="">--Select--</option>
                    <?php
                    $countries = ['USA', 'UK', 'India', 'Canada', 'Pakistan', 'Japan', 'Bangladesh'];
                    foreach ($countries as $c) {
                        $selected = ($_POST['country'] ?? '') == $c ? 'selected' : '';
                        echo "<option value=\"$c\" $selected>$c</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hobbies:</td>
            <td>
                <input type="checkbox" name="hobbies[]" value="Reading" <?php if(isset($_POST['hobbies']) && in_array('Reading', $_POST['hobbies'])) echo 'checked'; ?>> Reading
                <input type="checkbox" name="hobbies[]" value="Sports" <?php if(isset($_POST['hobbies']) && in_array('Sports', $_POST['hobbies'])) echo 'checked'; ?>> Sports
                <input type="checkbox" name="hobbies[]" value="Music" <?php if(isset($_POST['hobbies']) && in_array('Music', $_POST['hobbies'])) echo 'checked'; ?>> Music
            </td>
        </tr>
        <tr>
            <td>Role:</td>
            <td>
                <input type="checkbox" name="Role[]" value="Writer" <?php if(isset($_POST['Role']) && in_array('Writer', $_POST['Role'])) echo 'checked'; ?>> Writer
                <input type="checkbox" name="Role[]" value="Member" <?php if(isset($_POST['Role']) && in_array('Member', $_POST['Role'])) echo 'checked'; ?>> Member
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="Login" onclick="goToLogin()" style="cursor: pointer;" value="Login">
                <input type="submit" name="Register" value="Register">
                <input type="reset" value="Clear">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
