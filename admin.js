// Select the form and the message element
const feedbackForm = document.getElementById("feedbackForm");
const feedbackResponse = document.getElementById("feedbackResponse");

// Listen for form submission
feedbackForm.addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent page reload

  // Get form values
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const eventType = document.getElementById("event").value;
  const message = document.getElementById("message").value.trim();

  // Simple validation (optional, already required in HTML)
  if (!name || !email || !eventType || !message) {
    feedbackResponse.textContent = "Please fill in all fields before submitting.";
    feedbackResponse.style.color = "red";
    return;
  }

  // Show a confirmation message
  feedbackResponse.textContent = `Thank you, ${name}! 💜 Your feedback has been submitted successfully.`;
  feedbackResponse.style.color = "#6a0dad";

  // Reset the form
  feedbackForm.reset();
});