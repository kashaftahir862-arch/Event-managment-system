<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback
            (name, email, event_type, message)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssss",
                      $name,
                      $email,
                      $event,
                      $message);

    if ($stmt->execute()) {

        echo "

<!DOCTYPE html>
<html>

<head>

<title>Feedback Submitted</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Poppins,sans-serif;
}

body{

    background:
    radial-gradient(circle at top,#020617,#0f172a);

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

}

.popup-box{

    width:380px;

    background:white;

    padding:35px;

    border-radius:20px;

    text-align:center;

    border:3px solid #04eeee;

    box-shadow:
    0 0 20px rgba(4,238,238,0.5);

    animation:popup 0.4s ease;

}

.popup-box h2{

    color:#0077b6;

    margin-bottom:10px;

}

.popup-box p{

    color:#475569;

    margin-bottom:25px;

}

.popup-btn{

    padding:12px 25px;

    border:none;

    border-radius:30px;

    cursor:pointer;

    background:
    linear-gradient(135deg,#6366f1,#38bdf8);

    color:white;

    font-size:15px;

}

@keyframes popup{

    from{

        transform:scale(0.7);
        opacity:0;

    }

    to{

        transform:scale(1);
        opacity:1;

    }

}

</style>

</head>

<body>

<div class='popup-box'>

<h2>🎉 Thank You!</h2>

<p>Your feedback has been submitted successfully.</p>

<button class='popup-btn'
onclick=\"window.location.href='feedback.html'\">

OK

</button>

</div>

</body>
</html>

";

    } else {

        echo "

        <script>

            alert('Error Submitting Feedback');

            window.location.href='feedback.html';

        </script>

        ";
    }

    $stmt->close();
}

$conn->close();

?>