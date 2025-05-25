<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookVault_Index</title>
    <link rel="stylesheet" href="./CSS/IndexStyle.css">
</head>
<body>

    <!-- Header section with buttons -->
    <div class="header">
        <div class="top-right-buttons">
            <form action="search.php" method="GET" class="search-form">
                <input type="text" name="query" placeholder="Search books...">
                <button type="submit">Search</button>
            </form>
            <a href="./View/Login.php" class="btn">Login</a>
            <a href="./View/SignUp.php" class="btn">SignUp</a>
        </div>
    </div>

    <div class="main-content">
        <h1>Welcome To BookVault</h1>
        <h2>Lots of Books</h2>
    </div>

</body>
</html>
