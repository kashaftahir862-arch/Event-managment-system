document.getElementById("cultureForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const department = document.getElementById("department").value.trim();

  if (!name || !email || !department) {
    alert("⚠ Please fill out all fields before submitting.");
    return;
  }

  alert(`Thank you, ${name}! You have successfully registered for Culture Day.`);

  this.reset();
});