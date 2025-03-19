<!DOCTYPE html>
<html lang="en">
<head>
    <title>User SignUp</title>
</head>
<body>
    <h2>User Registration Form</h2>
    <form>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                </td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>
                    <select name="country">
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                        <option value="India">India</option>
                        <option value="Canada">Canada</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Japan">Japan</option>
                        <option value="Bangladesh">Bangladesh</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hobbies:</td>
                <td>
                    <input type="checkbox" name="hobbies[]" value="Reading"> Reading
                    <input type="checkbox" name="hobbies[]" value="Sports"> Sports
                    <input type="checkbox" name="hobbies[]" value="Music"> Music
                </td>
            </tr>
            <tr>
                <td>Profile Picture:</td>
                <td><input type="file" name="profile_pic"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Register">
                    <input type="reset" value="Clear">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
