<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $full_name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    $sql = "INSERT INTO college_registrations(event_name, full_name, email, department)
            VALUES('$event_name', '$full_name', '$email', '$department')";

    if (mysqli_query($conn, $sql)) {

        // ================= SUCCESS POPUP =================
        echo "
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
</head>

<body style='margin:0;font-family:Poppins;background:#0f172a;'>

<div style='
  position:fixed;
  inset:0;
  background:rgba(0,0,0,0.6);
  display:flex;
  justify-content:center;
  align-items:center;
'>

  <div style='
    width:360px;
    background:white;
    padding:35px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 0 40px rgba(56,189,248,0.6);
    animation:pop 0.4s ease;
  '>

    <h2 style='color:#4f46e5;'>🎉 Success!</h2>
    <p style='color:#333;font-size:14px;margin-bottom:20px;'>
      Your registration has been submitted successfully.
    </p>

    <button onclick=\"window.location.href='college.html'\" style='
      padding:12px 24px;
      border:none;
      border-radius:25px;
      background:linear-gradient(135deg,#6366f1,#38bdf8);
      color:white;
      font-weight:bold;
      cursor:pointer;
    '>
      OK
    </button>

  </div>

</div>

<style>
@keyframes pop {
  from { transform:scale(0.7); opacity:0; }
  to { transform:scale(1); opacity:1; }
}
</style>

</body>
</html>
";

    } else {

        // ================= FAILURE POPUP =================
        echo "
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
</head>

<body style='margin:0;font-family:Poppins;background:#0f172a;'>

<div style='
  position:fixed;
  inset:0;
  background:rgba(0,0,0,0.6);
  display:flex;
  justify-content:center;
  align-items:center;
'>

  <div style='
    width:360px;
    background:white;
    padding:35px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 0 40px rgba(255,0,0,0.4);
    animation:pop 0.4s ease;
  '>

    <h2 style='color:#e63946;'>❌ Error!</h2>
    <p style='color:#333;font-size:14px;margin-bottom:20px;'>
      Something went wrong. Please try again.
    </p>

    <button onclick=\"window.location.href='college.html'\" style='
      padding:12px 24px;
      border:none;
      border-radius:25px;
      background:linear-gradient(135deg,#6366f1,#38bdf8);
      color:white;
      font-weight:bold;
      cursor:pointer;
    '>
      Try Again
    </button>

  </div>

</div>

<style>
@keyframes pop {
  from { transform:scale(0.7); opacity:0; }
  to { transform:scale(1); opacity:1; }
}
</style>

</body>
</html>
";
    }
}

?>