<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $event_type = mysqli_real_escape_string($conn, $_POST['event_type']);
    $full_name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $guests = mysqli_real_escape_string($conn, $_POST['guests']);

    // Insert Query
    $sql = "INSERT INTO wedding_registrations 
            (event_type, full_name, email, guests)
            VALUES 
            ('$event_type', '$full_name', '$email', '$guests')";

    if (mysqli_query($conn, $sql)) {

        echo "
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
</head>

<body style='margin:0; font-family:Poppins, sans-serif;'>

<!-- Overlay -->
<div style=\"
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background:rgba(2,6,23,0.85);
  display:flex;
  justify-content:center;
  align-items:center;
  z-index:9999;
\">

  <!-- Popup Box -->
  <div style=\"
    width:360px;
    background:white;
    padding:35px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 0 40px rgba(56,189,248,0.6);
    animation: pop 0.4s ease;
  \">

    <h2 style='color:#4f46e5; margin-bottom:10px;'>
      🎉 Success!
    </h2>

    <p style='color:#333; font-size:14px; margin-bottom:20px;'>
      Your registration has been submitted successfully.
    </p>

    <button onclick=\"window.location.href='wedding.html'\"
      style=\"
        padding:12px 24px;
        border:none;
        border-radius:25px;
        background:linear-gradient(135deg,#6366f1,#38bdf8);
        color:white;
        font-weight:bold;
        cursor:pointer;
      \"
    >
      OK
    </button>

  </div>

</div>

<!-- Animation -->
<style>
@keyframes pop {
  from {
    transform: scale(0.7);
    opacity: 0;
  }
  to {
    transform: scale(1);
    opacity: 1;
  }
}
</style>

</body>
</html>
";

    mysqli_close($conn);
}
}
?>