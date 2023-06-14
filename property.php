<?php
include 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Property</title>

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

  <!-- Properti kami -->
  <div class="property-container">
    <h2>Properti kami</h2>
    <div class="card-box">
      <?php
      $query = "SELECT * FROM properti";
      $result = mysqli_query(connection(), $query);
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <a href="detail.php?property=<?= $row['id_properti'] ?>">
          <div class="card">
            <?php
            $queryGambar = "SELECT * FROM gambar_properti WHERE id_properti = " . $row['id_properti'] . " LIMIT 1";
            $resultGambar = mysqli_query(connection(), $queryGambar);
            $rowGambar = mysqli_fetch_array($resultGambar);
            ?>
            <div class="property-content-1" style="
                background-image: url('image/<?php echo $rowGambar['gambar'] ?>');
                background-size: cover;
                background-position: center;
              ">
              <div class="card-overlay">
                <div class="price-tag">
                  <h3>Rp <?= number_format($row['harga'], 2, ',', '.') ?></h3>
                  <h5><?= $row['luas_bangunan'] ?> Sqft</h5>
                </div>
              </div>
            </div>
            <div class="property-content-2">
              <h4><?= $row['nama_properti'] ?></h4>
              <div class="addres-box">
                <i class="fa-sharp fa-solid fa-location-dot"></i>
                <h5><?= $row['kota'] ?></h5>
              </div>
            </div>
            <div class="property-content-3">
              <div class="detail-box">
                <h5><?= $row['kamar_tidur'] ?></h5>
                <h6>Bedroom</h6>
              </div>
              <div class="detail-box">
                <h5><?= $row['kamar_mandi'] ?></h5>
                <h6>Bathroom</h6>
              </div>
              <div class="detail-box">
                <h5><?= $row['balkon'] ?></h5>
                <h6>Balcony</h6>
              </div>
              <div class="detail-box">
                <h5><?= $row['ruang_keluarga'] ?></h5>
                <h6>Hall</h6>
              </div>
              <div class="detail-box">
                <h5><?= $row['dapur'] ?></h5>
                <h6>Kitchen</h6>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>
  <!-- Akhir properti kami -->

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