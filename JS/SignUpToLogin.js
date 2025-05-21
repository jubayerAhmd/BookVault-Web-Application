
function goToLogin() {
    window.open("Login.php", "_self");   // Opens Login.php in the same tab
    window.close();  // Attempts to close the current tab (works only if the tab was opened by script)
}
