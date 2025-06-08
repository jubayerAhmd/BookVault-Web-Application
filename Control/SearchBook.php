<?php
include '../Model/SQL_Connection.php';

$conn = create_Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $bookName = trim($_POST['search-book']);

    $stmt = $conn->prepare("SELECT * FROM book WHERE name = ?");
    $stmt->bind_param("s", $bookName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " | ";
            echo "Name: " . $row["name"] . " | ";
            echo "Author: " . $row["author"] . " | ";
            echo "ISBN: " . $row["isbn"] . "<br>";
        }
    } else {
        echo "No books found.";
    }

    $stmt->close();
}
$conn->close();
?>
