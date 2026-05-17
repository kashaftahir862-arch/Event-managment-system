// Wait until the page is fully loaded
document.addEventListener("DOMContentLoaded", () => {
  const eventCards = document.querySelectorAll(".event-card");

  eventCards.forEach(card => {
    card.addEventListener("click", () => {
      const eventName = card.querySelector("h2").innerText;

      if (eventName.includes("Welcome")) {
        window.location.href = "welcome.html";
      } 
      else if (eventName.includes("Culture")) {
        window.location.href = "culture.html";
      } 
      else if (eventName.includes("Farewell")) {
        window.location.href = "farewell.html";
      } 
      else if (eventName.includes("Sports")) {
        window.location.href = "sports.html";
      }
    });
  });
});