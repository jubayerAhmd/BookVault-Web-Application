<?php
include '../Model/SQL_Connection.php';

// Initialize form variables
$fullname = $email = $password = $gender = $country = '';
$hobbies = $roles = [];
$success = '';
$flag=true;

// Database connection
$conn = create_Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Register'])) {

    // Collect and sanitize form Input data
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'] ?? '';
    $hobbies = isset($_POST['hobbies']) ? implode(",", $_POST['hobbies']) : '';
    $roles = $_POST['roles'] ?? '';

    // Checking (FullName,Email,Password,Gender,Role) is not empty.
    if (empty($fullname)) {
    $flag=false;
    }

    if (empty($email)) {
    $flag=false;
    }

    if (empty($password)) {
    $flag=false;
    }

    if (empty($gender)) {
    $flag=false;
    }

    if (empty($roles)) {
    $flag=false;
    }

    if ($flag) {
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
    else
    {
        echo "Invalid Data!!!";
    }
}
$conn->close();
?>