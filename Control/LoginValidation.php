<?php
// Initialize variables
$username = $password = "";
$usernameErr = $passwordErr = "";
 
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required.";
    } else {
        $username = htmlspecialchars($_POST["username"]);
    }
 
    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required.";
    } else {
        $password = htmlspecialchars($_POST["password"]);
    }
}
?>