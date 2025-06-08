<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Writer Panel</title>
    <link rel="stylesheet" href="../CSS/MemberStyle.css">
</head>
<body>
    <div class="member-container">
        <header class="header">
            <a href="../Index.php" class="exit-link">&#8604;Home</a>
            <h1>BookVault</h1>
            <h2>Member Panel</h2>
        </header>

        <div class="button-group">
            <button class="crud-btn">Borrow Book</button>
        </div>

        <!-- Borrow-Text Field-->
        <div id="deleteForm" class="form-box" style="display:none;">
            <form method="POST">
                <label>Book ID to borrow: 
                    <input type="number" name="borrow_id" required></label>
                <button type="submit" name="submit_delete">Borrow Book</button>
            </form>
        </div>

        <!-- Data Handle & Display -->
        <div class="data-box">
            <textarea readonly><?php include '../Control/CRUD&BookList.php';?></textarea>
        </div>
    </div>
</body>
</html>
