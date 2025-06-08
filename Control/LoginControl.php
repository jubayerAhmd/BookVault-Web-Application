<?php
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


    // Checking (FullName,Password) is not empty.
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
            $id=$row["id"];
            $role=$row["role"];
        }
        if($role==="Member")
        {
            header("Location: ../View/Member.php");
            exit();        
        }
        if($role==="Writer")
        {
            header("Location: ../View/Writer.php");
            exit();
        }

    } else {
        echo "0 results";
    }

    $stmt->close();
    $conn->close();
    }
    else
    {
        echo "Invalid Data!!!";
    }
}
?>