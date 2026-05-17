document.getElementById("receptionForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const guests = document.getElementById("guests").value.trim();

  if (name && guests) {
    alert(`🎉 Thank you, ${name}! Your Reception booking for ${guests} guest(s) has been received.`);
    this.reset();
  } else {
    alert("⚠️ Please fill in all required fields before submitting.");
  }
});