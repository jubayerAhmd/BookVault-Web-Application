<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Writer Panel</title>
    <link rel="stylesheet" href="../CSS/WriterStyle.css">
    <script>
        function toggleForm(formId) {
            document.getElementById('createForm').style.display = 'none';
            document.getElementById('updateForm').style.display = 'none';
            document.getElementById('deleteForm').style.display = 'none';
            document.getElementById(formId).style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="writer-container">
        <header class="header">
            <h1>BookVault</h1>
            <h2>Writer Panel</h2>
        </header>

        <div class="button-group">
            <button class="crud-btn" onclick="toggleForm('createForm')">Create Book</button>
            <button class="crud-btn" onclick="toggleForm('updateForm')">Update Book</button>
            <button class="crud-btn" onclick="toggleForm('deleteForm')">Delete Book</button>
        </div>

        <!-- Create Book Form -->
        <div id="createForm" style="display:none; margin: 20px 0;">
            <form method="POST">
                <label>Name: <input type="text" name="name" required></label><br><br>
                <label>Author: <input type="text" name="author" required></label><br><br>
                <label>ISBN: <input type="number" name="isbn" required></label><br><br>
                <button type="submit" name="submit_create">Add Book</button>
            </form>
        </div>

        <!-- Update Book Form -->
        <div id="updateForm" style="display:none; margin: 20px 0;">
            <form method="POST">
                <label>ID: <input type="number" name="id" required></label><br><br>
                <label>Name: <input type="text" name="name" required></label><br><br>
                <label>Author: <input type="text" name="author" required></label><br><br>
                <label>ISBN: <input type="number" name="isbn" required></label><br><br>
                <button type="submit" name="submit_update">Update Book</button>
            </form>
        </div>

        <!-- Delete Book Form -->
        <div id="deleteForm" style="display:none; margin: 20px 0;">
            <form method="POST">
                <label>Book ID to delete: <input type="number" name="delete_id" required></label><br><br>
                <button type="submit" name="submit_delete">Delete Book</button>
            </form>
        </div>

        <!-- Data Display -->
        <div class="data-box">
            <textarea readonly>
<?php
include '../Model/SQL_Connection.php';
$conn = create_Connection();

// CREATE Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_create"])) {
    $name = $conn->real_escape_string($_POST['name']);
    $author = $conn->real_escape_string($_POST['author']);
    $isbn = $conn->real_escape_string($_POST['isbn']);

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
    $name = $conn->real_escape_string($_POST['name']);
    $author = $conn->real_escape_string($_POST['author']);
    $isbn = $conn->real_escape_string($_POST['isbn']);

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
            </textarea>
        </div>
    </div>
</body>
</html>
