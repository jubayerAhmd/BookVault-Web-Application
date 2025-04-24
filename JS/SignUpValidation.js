function validateForm() {
  let isValid = true;

  // Get form values
  const fullName = document.getElementById("fullname").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const gender = document.querySelector('input[name="gender"]:checked');

  // Clear previous errors
  document.getElementById("nameError").innerHTML = "";
  document.getElementById("emailError").innerHTML = "";
  document.getElementById("passwordError").innerHTML = "";
  document.getElementById("genderError").innerHTML = "";

  // Full Name Validation
  if (fullName === "") {
      document.getElementById("nameError").innerHTML = "Full Name is required.";
      isValid = false;
  } else if (!/^[a-zA-Z\s]+$/.test(fullName)) {
      document.getElementById("nameError").innerHTML = "Only letters and spaces are allowed.";
      isValid = false;
  }

  // Email Validation
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (email === "") {
      document.getElementById("emailError").innerHTML = "Email is required.";
      isValid = false;
  } else if (!emailPattern.test(email)) {
      document.getElementById("emailError").innerHTML = "Enter a valid email address.";
      isValid = false;
  }

  // Password Validation
  if (password === "") {
      document.getElementById("passwordError").innerHTML = "Password is required.";
      isValid = false;
  } else if (password.length < 6) {
      document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters.";
      isValid = false;
  } else if (!/\d/.test(password)) {
      document.getElementById("passwordError").innerHTML = "Password must contain at least one number.";
      isValid = false;
  }

  // Gender Validation
  if (!gender) {
      document.getElementById("genderError").innerHTML = "Please select your gender.";
      isValid = false;
  }

  return isValid;
}
