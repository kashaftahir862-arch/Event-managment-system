// Contact Form Submission
const form = document.getElementById("contactForm");
const popup = document.getElementById("popup");
const closeBtn = document.getElementById("closePopup");

form.addEventListener("submit", function(e){
  e.preventDefault();
  popup.style.display = "flex";

  setTimeout(() => {
    popup.style.display = "none";
  }, 3000);
});

closeBtn.addEventListener("click", function(){
  popup.style.display = "none";
});