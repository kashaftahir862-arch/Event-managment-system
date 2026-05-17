const form = document.querySelector(".signup-form");

form.addEventListener("submit", (e) => {

  e.preventDefault();

  const username =
    document.getElementById("username").value.trim();

  const email =
    document.getElementById("email").value.trim();

  const password =
    document.getElementById("password").value.trim();

  if(username === "" || email === "" || password === ""){

    alert("⚠️ Please fill all fields");
    return;

  }

  const emailPattern =
    /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if(!email.match(emailPattern)){

    alert("📧 Enter valid email address");
    return;

  }

  if(password.length < 6){

    alert("🔒 Password must be at least 6 characters");
    return;

  }

  alert("✅ Registration Successful");

  form.reset();

});