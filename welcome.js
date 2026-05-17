document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const department = document.getElementById("department").value.trim();

    if (name === "" || email === "" || department === "") {
      alert("⚠️ Please fill in all fields before submitting.");
      return;
    }
    const registration = { name, email, department, event: "Welcome Party 2025" };
    localStorage.setItem("welcomeRegistration", JSON.stringify(registration));
    alert(`✅ Thank you, ${name}! You have successfully registered for the Welcome Party 🎉`);
    form.reset();
  });
});