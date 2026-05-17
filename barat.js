document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");

  form.addEventListener("submit", (e) => {
    e.preventDefault(); 

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const guests = document.getElementById("guests").value.trim();

    if (!name || !email || !guests) {
      alert("⚠️ Please fill out all fields before submitting!");
      return;
    }

    alert(`Thank you, ${name}! 
Your booking for the Barat Ceremony has been received. 
We look forward to celebrating with you! 💜`);

    form.reset();
  });
});