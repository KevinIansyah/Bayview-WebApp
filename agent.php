<?php
include('database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agent</title>

  <!-- Logo -->
  <link rel="icon" href="image/logoatas.png" type="image/x-icon" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/app.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar-container navbar-fix">
    <div class="logo">
      <img src="image/logo-3.png" alt="logo" />
      <p>bayview.</p>
    </div>
    <div class="navbar-menu">
      <a href="index.php">home</a>
      <a href="aboutMe.php">about me</a>
      <a href="contact.php">contact</a>
      <a href="property.php">property</a>
      <a href="agent.php">agent</a>
    </div>
    <div class="hamburger">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
  </nav>
  <!-- Akhir navbar -->

  <!-- Agent -->
  <div class="property-container">
    <h2>Agen kami</h2>
    <div class="card-box">
      <?php
      $queryDataAgen = "SELECT * FROM agen";
      $resultDataAgen = mysqli_query(connection(), $queryDataAgen);
      $no = 1;
      while ($dataDataAgen = mysqli_fetch_array($resultDataAgen)) {

      ?>
        <div class="card">
          <div class="property-content-1" style="
              background-image: url('image/<?php echo $dataDataAgen['gambar'] ?>');
              background-size: cover;
              background-position: center;
            "></div>
          <div class="property-content-2 agent-box">
            <h4><?php echo $dataDataAgen['nama'] ?></h4>
            <div class="addres-box">
              <h5>agen - properti</h5>
            </div>
          </div>
        </div>
      <?php }
      ?>
    </div>
  </div>
  <!-- Akhir agent -->

  <!-- Footer -->
  <footer class="footer-container">
    <div class="footer-boxs">
      <div class="footer-box bayview">
        <div class="logo-footer">
          <img src="image/logo-3.png" alt="logo" />
          <h5>bayview.</h5>
        </div>
        <p>
          Kami mengutamakan kualitas dalam setiap aspek pekerjaan yang kami
          lakukan. Tim kami terdiri dari profesional berpengalaman yang ahli
          di bidang penjualan properti.
        </p>
      </div>
      <div class="footer-box tautan-langsung">
        <h5>Tautan langsung</h5>
        <div class="footer-menu">
          <a href="aboutMe.php">about me</a>
          <a href="contact.php">contact</a>
          <a href="property.php">property</a>
          <a href="agent.php">agent</a>
        </div>
      </div>
      <div class="footer-box">
        <h5>Kontak</h5>
        <div class="footer-menu">
          <a href="#">Surabaya, Indonesia</a>
          <a href="#">085730130649</a>
          <a href="#">bayview@gmail.com</a>
        </div>
      </div>
    </div>
    <hr />
    <p>&copy; 2023 Property Website - Dikembangkan Oleh bayview</p>
  </footer>
  <!-- Akhir footer -->

  <script src="javascript/navbar.js"></script>
</body>

</html>