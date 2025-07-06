function togglePassword() {
  const field = document.getElementById("password");
  field.type = field.type === "password" ? "text" : "password";
}

// Optional: Close alert on click
document.addEventListener("DOMContentLoaded", function () {
  const alertClose = document.querySelector(".alert-close");
  if (alertClose) {
    alertClose.addEventListener("click", () => {
      alertClose.parentElement.style.display = "none";
    });
  }
});
