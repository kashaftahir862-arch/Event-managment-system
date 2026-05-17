// ================= PAGE LOAD =================

window.addEventListener("load", () => {

    console.log("Feedback Page Loaded");

});


// ================= FORM VALIDATION =================

const form = document.querySelector(".feedback-form");

form.addEventListener("submit", function (e) {

    const name = document.querySelector("input[name='name']").value;
    const email = document.querySelector("input[name='email']").value;
    const message = document.querySelector("textarea[name='message']").value;

    // Empty Check

    if (name === "" || email === "" || message === "") {

        e.preventDefault();

        alert("Please fill all fields");

    }

});


// ================= BUTTON EFFECT =================

const btn = document.querySelector(".btn");

btn.addEventListener("mouseenter", () => {

    btn.style.transform = "scale(1.05)";

});

btn.addEventListener("mouseleave", () => {

    btn.style.transform = "scale(1)";

});