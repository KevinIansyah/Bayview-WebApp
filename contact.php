<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>

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

  <!-- Contact -->
  <div class="judul-halaman">
    <h2>Hubungi kami</h2>
  </div>
  <div class="contact-container">
    <div class="contact-box-1">
      <img src="image/contact.jpg" alt="contact" />
    </div>
    <div class="contact-box-2">
      <form method="post" action="https://formspree.io/f/mayzgwql">
        <div class="email-form">
          <div class="name">
            <input type="text" class="form-input" id="name" name="name" placeholder="nama" />
          </div>
          <div class="email">
            <input type="email" class="form-input" id="email" name="email" placeholder="email" />
          </div>
          <div class="phone">
            <input type="text" class="form-input" id="phone" name="phone" placeholder="nomor hp" />
          </div>
          <div class="subjek">
            <input type="text" class="form-input" id="subjek" name="subjek" placeholder="subjek" />
          </div>
        </div>
        <div class="message">
          <textarea class="form-input" id="massage" name="massage" rows="3" placeholder="pesan"></textarea>
        </div>
        <button type="submit" class="button email-button">kirim</button>
      </form>
    </div>
  </div>
  <!-- Akhir contact -->

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