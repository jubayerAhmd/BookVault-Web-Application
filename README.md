# BookVault web tech project.
# Going To Make an Web application 
# Task-1 Done

    
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector(".login-form");

        form.addEventListener("submit", function (e) {
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            // Basic validations
            if (username === "") {
                alert("Username cannot be empty.");
                e.preventDefault();
                return;
            }

            if (password === "") {
                alert("Password cannot be empty.");
                e.preventDefault();
                return;
            }

            // Example additional check: minimum password length
            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                e.preventDefault();
                return;
            }

            // Optional: Add regex check for username if needed (e.g., only alphanumeric)
            const usernameRegex = /^[a-zA-Z0-9_]+$/;
            if (!usernameRegex.test(username)) {
                alert("Username can only contain letters, numbers, and underscores.");
                e.preventDefault();
            }
        });
    });

