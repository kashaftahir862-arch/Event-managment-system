// Scroll Reveal Animation

function revealOnScroll() {

  const reveals =
  document.querySelectorAll(".reveal");

  reveals.forEach((el) => {

    const windowHeight =
    window.innerHeight;

    const elementTop =
    el.getBoundingClientRect().top;

    if (elementTop < windowHeight - 100) {

      el.classList.add("active");
    }
  });
}

/* Run on Scroll */

window.addEventListener(
  "scroll",
  revealOnScroll
);

/* Run on Page Load */

window.addEventListener(
  "load",
  revealOnScroll
);


/* LOGOUT FUNCTION */

function logout() {

  // SHOW POPUP
  document
    .getElementById("logout-popup")
    .style.display = "flex";

  // REDIRECT AFTER 2 SECONDS
  setTimeout(() => {

    window.location.href =
      "Register.html";

  }, 2000);
}