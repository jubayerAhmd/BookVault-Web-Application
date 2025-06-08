<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forget Password</title>
    <link rel="stylesheet" href="../CSS/ForgetPasswordStyle.css">
</head>
<body>
    <div class="container">
        <h1>BookVault</h1>
        <div class="form-box">
            <h2>Forget Password</h2>
            <form method="post">
                <table>
                     <tr>
                        <td>Name:</td>
                        <td><input type="name" name="name" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td><input type="password" name="new_password" required></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="confirm_password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" value="Reset Password" class="btn">
                            <input type="reset" value="Clear" class="btn">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
