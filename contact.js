document.addEventListener('DOMContentLoaded', () => {
  const form         = document.getElementById('contactForm');
  const alertBox     = document.getElementById('alert-box');
  const alertMessage = document.getElementById('alert-message');
  const alertClose   = document.getElementById('alert-close');

  // Close button hides the alert
  alertClose.addEventListener('click', () => {
    alertBox.style.display = 'none';
    alertBox.classList.remove('success');
  });

  // Utility to show alert (green if isSuccess)
  function showAlert(message, isSuccess = false) {
    alertMessage.innerHTML = message;
    alertBox.classList.toggle('success', isSuccess);
    alertBox.style.display = 'flex';
  }

  // Validation + new identity checks
  window.validateContactForm = function () {
    const name    = document.getElementById('name').value.trim();
    const email   = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();

    if (!isLoggedIn) {
      showAlert(
        `Please <a href="login.php?redirect=contact.php" style="color:#00cec9;font-weight:bold;">login now</a> to send a message.`,
        false
      );
      return false;
    }
    if (!name || !email || !message) {
      showAlert("All fields are required.", false);
      return false;
    }
    // 1) Must be exactly the logged-in username
    if (name !== loggedUsername) {
      showAlert("Credentials do not match your login info.", false);
      return false;
    }
    // 2) Must be exactly the logged-in email
    if (email !== loggedEmail) {
      showAlert("Credentials do not match your login info.", false);
      return false;
    }
    // (Optional) enforce domain
    if (!email.endsWith('@gmail.com')) {
      showAlert("Gmail invalid. Please try again.", false);
      return false;
    }
    return true;
  };

  // AJAX SUBMIT (unchanged)
  form.addEventListener('submit', async e => {
    e.preventDefault();
    alertBox.style.display = 'none';

    if (!validateContactForm()) return;

    try {
      const res  = await fetch('process_contact.php', {
        method: 'POST',
        body: new FormData(form)
      });
      const json = await res.json();
      if (json.success) {
        showAlert("Message sent successfully! Thank you for your feedback.", true);
        form.reset();
      } else {
        showAlert(json.message || "Error in sending message, please try again.", false);
      }
    } catch {
      showAlert("Error in sending message, please try again.", false);
    }
  });
});
