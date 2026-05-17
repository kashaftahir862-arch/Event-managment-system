<?php
include "connect.php";

$sql = "SELECT * FROM gallery";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wedding Gallery</title>

  <link rel="stylesheet" href="Gallery.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="logo">Wedding Gallery</div>

  <ul>
    <li><a href="hennasample.html">Henna</a></li>
    <li><a href="baratsample.html">Barat</a></li>
    <li><a href="receptionsample.html">Reception</a></li>
  </ul>
</nav>

<!-- Header -->
<header>
  <h1>Welcome to Wedding Gallery </h1>
</header>

<!-- Gallery Section -->
<section class="cards-section">

<?php
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){
?>

    <div class="event-card">

        <img src="<?php echo $row['image_path']; ?>" 
             alt="Gallery Image"
             style="width:100%; height:220px; object-fit:cover; border-radius:12px;">

        <h3 style="margin-top:15px;">
            <?php echo $row['image_title']; ?>
        </h3>

        <p style="margin-top:8px;">
            <?php echo $row['event_type']; ?>
        </p>

    </div>

<?php
    }

}else{
    echo "<h2 style='color:white;'>No Gallery Images Found</h2>";
}
?>

</section>

<!-- Footer -->
<footer>
  <p>&copy; Eventify | Designed with 💜</p>
</footer>

</body>
</html>