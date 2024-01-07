document.addEventListener("DOMContentLoaded", function () {
    var navbarToggler = document.querySelector(".navbar-toggler");
    var navbarCollapse = document.querySelector(".navbar-collapse");
    navbarToggler.addEventListener("click", function () {
        navbarCollapse.classList.toggle("show");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var loginButton = document.getElementById("login");
    var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));

    loginButton.addEventListener("click", function () {
        loginModal.show();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var loginForm = document.getElementById("loginForm");
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username === "admin" && password === "password") {
            alert("Login berhasil!");
            loginModal.hide();
        } else {
            alert("Login gagal. Silakan coba lagi.");
        }
    });
});

document.getElementById("showLoginForm").addEventListener("click", function() {
    document.getElementById("registerModal").style.display = "none";
    document.getElementById("alreadyRegisteredText").style.display = "none";
    document.getElementById("loginModal").style.display = "block";
});

document.getElementById('showLoginForm').addEventListener('click', function() {
    document.getElementById('registerModal').style.display = 'none';
    document.getElementById('loginModal').style.display = 'block';
});