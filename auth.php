<?php
$conn = mysqli_connect("localhost", "root", "", "eventify");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

/* ================= USER REGISTER ================= */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $check_email_sql = "SELECT * FROM register WHERE email = ?";
    $check_stmt = $conn->prepare($check_email_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $row = $check_result->fetch_assoc();
        
        if ($password === $row['password']) {
            $check_stmt->close();
            show_success_popup("🎉 Registration Successful", "Welcome back! Your account is verified.", "user.html");
            exit();
        } 
    }
}

/* ================= ADMIN LOGIN ================= */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM register WHERE email=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        show_success_popup("✅ Login Successful", "Welcome back to Eventify Admin Panel.", "index.html");
    } else {
        echo "<h2 style='color:red; text-align:center; margin-top:100px; font-family:Poppins,sans-serif;'>Invalid Email or Password</h2>";
    }
    $stmt->close();
}

$conn->close();
function show_success_popup($title, $message, $redirect_url) {
    echo <<<EOT
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>$title</title>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap' rel='stylesheet'>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { 
            background: radial-gradient(circle at top, #020617, #0f172a); 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .popup-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); display: flex; justify-content: center; align-items: center; }
        .popup-box { width: 380px; background: white; padding: 35px; border-radius: 20px; text-align: center; border: 3px solid #04eeee; box-shadow: 0 0 20px rgba(4,238,238,0.5), 0 0 40px rgba(4,238,238,0.2); animation: popup 0.4s ease; }
        .popup-box h2 { color: #0077b6; margin-bottom: 10px; font-size: 28px; }
        .popup-box p { color: #475569; font-size: 14px; margin-bottom: 25px; }
        .popup-btn { padding: 12px 25px; border: none; border-radius: 30px; cursor: pointer; background: linear-gradient(135deg, #6366f1, #38bdf8); color: white; font-size: 15px; font-weight: 600; transition: 0.3s; }
        .popup-btn:hover { transform: scale(1.05); }
        @keyframes popup { from { transform: scale(0.7); opacity: 0; } to { transform: scale(1); opacity: 1; } }
    </style>
</head>
<body>
    <div class='popup-overlay'>
        <div class='popup-box'>
            <h2>$title</h2>
            <p>$message</p>
            <button class='popup-btn' onclick="window.location.href='$redirect_url'">OK</button>
        </div>
    </div>
</body>
</html>
EOT;
}
?>