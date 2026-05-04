function togglePassword() {
    const passwordField = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.src = "assets/svg/eye-slash-solid-full.svg";
    } else {
        passwordField.type = "password";
        icon.src = "assets/svg/eye-solid-full.svg";
    }
}
