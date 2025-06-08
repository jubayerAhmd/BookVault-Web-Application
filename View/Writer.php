<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Writer Panel</title>
    <link rel="stylesheet" href="../CSS/WriterStyle.css">
    <script src="../JS/ToggleForm.js" defer></script>
</head>
<body>
    <div class="writer-container">
        <header class="header">
            <a href="../Index.php" class="exit-link">&#8604;Home</a>
            <h1>BookVault</h1>
            <h2>Writer Panel</h2>
        </header>

        <div class="button-group">
            <button class="crud-btn" onclick="toggleForm('createForm')">Create Book</button>
            <button class="crud-btn" onclick="toggleForm('updateForm')">Update Book</button>
            <button class="crud-btn" onclick="toggleForm('deleteForm')">Delete Book</button>
        </div>

        <!-- Create-Text Field-->
        <div id="createForm" class="form-box" style="display:none;">
            <form method="POST">
                <label>Name:
                    <input type="text" name="name" required></label><br><br>
                <label>Author:
                    <input type="text" name="author" required></label><br><br>
                <label>ISBN:
                    <input type="number" name="isbn" required></label><br><br>
                <button type="submit" name="submit_create">Add Book</button>
            </form>
        </div>

        <!-- Update-Text Field-->
        <div id="updateForm" class="form-box" style="display:none;">
            <form method="POST">
                <label>ID:
                    <input type="number" name="id" required></label><br><br>
                <label>Name:
                    <input type="text" name="name" required></label><br><br>
                <label>Author:
                    <input type="text" name="author" required></label><br><br>
                <label>ISBN:
                    <input type="number" name="isbn" required></label><br><br>
                <button type="submit" name="submit_update">Update Book</button>
            </form>
        </div>

        <!-- Delete-Text Field-->
        <div id="deleteForm" class="form-box" style="display:none;">
            <form method="POST">
                <label>Book ID to delete: 
                    <input type="number" name="delete_id" required></label>
                <button type="submit" name="submit_delete">Delete Book</button>
            </form>
        </div>

        <!-- Data Handle & Display -->
        <div class="data-box">
            <textarea readonly><?php include '../Control/CRUD&BookList.php';?></textarea>
        </div>
    </div>
</body>
</html>
