function validateForm() {
    let isValid = true;

    // Get values
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    // Clear previous errors
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    // 1. Username is required
    if (username === "") {
        document.getElementById("usernameError").innerHTML = "Username is required.";
        isValid = false;
    }

    // 2. Username must be at least 4 characters
    if (username.length > 0 && username.length < 4) {
        document.getElementById("usernameError").innerHTML = "Username must be at least 4 characters.";
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
