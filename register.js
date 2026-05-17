// Loader
window.addEventListener("load", () => {

  document.getElementById("loader").style.display = "none";

});

// User Page
function openUserPage(){

  window.location.href = "user.html";

}

// Admin Page
function openAdminPage(){

  window.location.href = "admin.html";

}

/* Scroll Reveal Animation */
const reveals = document.querySelectorAll(".reveal");

window.addEventListener("scroll", () => {

  reveals.forEach((element) => {

    const windowHeight = window.innerHeight;

    const revealTop = element.getBoundingClientRect().top;

    const revealPoint = 100;

    if(revealTop < windowHeight - revealPoint){

      element.classList.add("active");

    } else {

      element.classList.remove("active");

    }

  });

});