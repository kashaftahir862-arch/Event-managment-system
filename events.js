// LOADER
window.addEventListener("load", function () {

  const loader = document.getElementById("loader");

  if (loader) {
    loader.style.display = "none";
  }

});


// SCROLL REVEAL
function revealCards() {

  const reveals = document.querySelectorAll(".reveal");

  reveals.forEach(function (el) {

    const windowHeight = window.innerHeight;

    const elementTop = el.getBoundingClientRect().top;

    if (elementTop < windowHeight - 100) {

      el.classList.add("active");

    }

  });

}

window.addEventListener("scroll", revealCards);

// RUN ON PAGE LOAD
revealCards();