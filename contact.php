<?php
include "connect.php";

$messageSent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (!empty($name) && !empty($email) && !empty($message)) {

        // Prepared Statement (SAFE)
        $sql = "INSERT INTO contact_messages(name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);
            $stmt->execute();
            $stmt->close();
            $messageSent = true;
        } else {
            die("SQL Error: " . $conn->error);
        }

    } else {
        die("All fields are required!");
    }
}
?>
<?php if ($messageSent): ?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
</head>

<body style="
    margin:0;
    font-family:Poppins, sans-serif;
    background:linear-gradient(135deg, rgb(5,5,82), #0b1f3f);
">

<!-- POPUP -->
<div style="
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    display:flex;
    justify-content:center;
    align-items:flex-start;
    padding-top:40px;
    z-index:9999;
    animation: fadeBg 0.4s ease;
">

    <div style="
        width:350px;
        background:white;
        padding:25px;
        border-radius:15px;
        text-align:center;
        box-shadow:0 0 25px #04eeee;
        animation: slideDown 0.6s ease;
    ">

        <h3 style="
            color:#0077b6;
            margin-bottom:10px;
        ">
            ✅ Message Sent Successfully!
        </h3>

        <p style="
            color:#333;
            font-size:14px;
            margin-bottom:15px;
        ">
            Thank you for contacting us. We will respond soon.
        </p>

        <button onclick="window.location.href='contact.html'" style="
            padding:10px 20px;
            background:linear-gradient(90deg, #04eeee, #7e3ff2);
            border:none;
            color:white;
            border-radius:8px;
            cursor:pointer;
            box-shadow:0 0 15px #04eeee;
            font-weight:bold;
        ">
            OK
        </button>

    </div>

</div>

<!-- ANIMATION -->
<style>
@keyframes slideDown {
    from {
        transform: translateY(-80px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes fadeBg {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style>

</body>
</html>

<?php endif; ?>

</body>
</html>