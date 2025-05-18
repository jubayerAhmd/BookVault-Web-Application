<?php
$fullname = $email = $password = $gender = "";
$hobbies = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Full Name
    if (empty($_POST["fullname"])) {
        $errors['fullname'] = "Full Name is required.";
    } else {
        $fullname = trim($_POST["fullname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
            $errors['fullname'] = "Only letters and white space allowed.";
        }
    }

    // Email
    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required.";
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }
    }

    // Password
    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required.";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 6) {
            $errors['password'] = "Password must be at least 6 characters.";
        }
    }

    // Gender
    if (empty($_POST["gender"])) {
        $errors['gender'] = "Gender is required.";
    } else {
        $gender = $_POST["gender"];
    }
}
?>
