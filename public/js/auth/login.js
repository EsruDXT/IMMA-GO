function togglePassword() {
    const password = document.getElementById("password");
    const eyeOpen = document.getElementById("eyeOpen");
    const eyeClose = document.getElementById("eyeClose");

    if (password.type === "password") {
        password.type = "text";
        // Mata Terbuka
        eyeOpen.classList.remove("hidden");
        eyeClose.classList.add("hidden");

    } else {
        password.type = "password";
        // Mata Tertutup
        eyeOpen.classList.add("hidden");
        eyeClose.classList.remove("hidden");
    }
}