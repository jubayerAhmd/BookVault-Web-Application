
function goToSignup() {
    window.open("./SignUp.php", "_self"); // Opens Signup.php in the same tab
    window.close(); // Attempts to close the current tab (works only if the tab was opened by script)
}

function goToForgetPassword() {
    window.open("../View/ForgetPassword.php", "_self");
    window.close(); // Attempts to close the current tab (works only if the tab was opened by script)
}
