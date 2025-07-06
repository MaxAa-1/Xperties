document.getElementById("contactForm")?.addEventListener("submit", function (e) {
  const email = document.getElementById("email").value;
  const validDomains = ["gmail.com", "hotmail.com", "yahoo.com"];
  const domain = email.split("@")[1];

  if (!domain || !validDomains.includes(domain.toLowerCase())) {
    e.preventDefault();
    alert("Only Gmail, Hotmail, or Yahoo emails are accepted.");
  }
});


function togglePassword() {
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.querySelector(".toggle-password");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.textContent = "🔓";
    } else {
      passwordInput.type = "password";
      toggleIcon.textContent = "🔒";
    }
  }
  
