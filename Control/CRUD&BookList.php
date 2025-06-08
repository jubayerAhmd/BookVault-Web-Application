<?php
include '../Model/SQL_Connection.php';
$conn = create_Connection();

// CREATE Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_create"])) {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];

    $insert = "INSERT INTO book (name, author, isbn) VALUES ('$name', '$author', '$isbn')";
    if ($conn->query($insert) === TRUE) {
        echo "New book added successfully!\n\n";
    } else {
        echo "Insert Error: " . $conn->error . "\n\n";
    }
}

// UPDATE Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_update"])) {
    $id = (int) $_POST['id'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];

    $update = "UPDATE book SET name='$name', author='$author', isbn='$isbn' WHERE id=$id";
    if ($conn->query($update) === TRUE) {
        echo "Book ID $id updated successfully!\n\n";
    } else {
        echo "Update Error: " . $conn->error . "\n\n";
    }
}

// DELETE Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_delete"])) {
    $delete_id = (int) $_POST['delete_id'];
    $delete = "DELETE FROM book WHERE id=$delete_id";

    if ($conn->query($delete) === TRUE) {
        echo "Book ID $delete_id deleted successfully!\n\n";
    } else {
        echo "Delete Error: " . $conn->error . "\n\n";
    }
}

// DISPLAY all books
$sql = "SELECT * FROM book";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " | ";
        echo "Name: " . $row["name"] . " | ";
        echo "Author: " . $row["author"] . " | ";
        echo "ISBN: " . $row["isbn"] . "\n";
    }
} else {
    echo "No books found.";
}

$conn->close();
?>