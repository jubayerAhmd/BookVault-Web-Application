# BookVault web tech project.
# Going To Make an Web application 
# Task-1 Done

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<style>
    .error { color: red; font-size: 14px; }
</style>
</head>
<body>
 
  <h2>Login Form</h2>
<form onsubmit="return validateForm()">
<label>Email:</label><br>
<input type="text" id="email"><br>
<span id="emailError" class="error"></span><br>
 
    <label>Password:</label><br>
<input type="password" id="password"><br>
<span id="passwordError" class="error"></span><br><br>
 
    <button type="submit">Login</button>
</form>
 
  <script>
    function validateForm() {
      let isValid = true;
 
      // Get values
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
 
      // Clear previous errors
      document.getElementById("emailError").innerHTML = "";
      document.getElementById("passwordError").innerHTML = "";
 
      // 1. Email is required
      if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required.";
        isValid = false;
      }
 
      // 2. Email format validation
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email !== "" && !emailPattern.test(email)) {
        document.getElementById("emailError").innerHTML = "Enter a valid email address.";
        isValid = false;
      }
 
      // 3. Password is required
      if (password === "") {
        document.getElementById("passwordError").innerHTML = "Password is required.";
        isValid = false;
      }
 
      // 4. Password must be at least 6 characters
      if (password.length > 0 && password.length < 6) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters.";
        isValid = false;
      }
 
      // 5. Password must contain at least one number
      const numberPattern = /\d/;
      if (password.length >= 6 && !numberPattern.test(password)) {
        document.getElementById("passwordError").innerHTML = "Password must contain at least one number.";
        isValid = false;
      }
 
      return isValid;
    }
</script>
 
</body>
</html>


