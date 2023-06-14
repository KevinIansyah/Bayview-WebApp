<?php
include 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>

  <!-- Logo -->
  <link rel="icon" href="image/logoatas.png" type="image/x-icon" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/app.css" />
</head>

<body>
  <!-- Header -->
  <header class="slider-container-image">
    <div class="slider-image">
      <img src="image/1.jpg" alt="Image 1" />
      <img src="image/2.jpg" alt="Image 2" />
      <img src="image/6.jpg" alt="Image 6" />
      <img src="image/7.jpg" alt="Image 7" />
      <img src="image/9.jpg" alt="Image 9" />
      <img src="image/10.jpg" alt="Image 10" />
    </div>
    <div class="slider-overlay">
      <div class="header-box">
        <div class="header-content">
          <h1>CARI RUMAH IMPIAN ANDA</h1>
          <h1>BERSAMA KAMI!!</h1>
          <form class="search-form" method="GET" action="">
            <input class="form-input" type="text" name="search" placeholder="Masukkan yang anda cari" <?= isset($_GET['search']) ? 'value="' . $_GET['search'] . '"' : '' ?> />
            <button type="submit" class="button search-button">search</button>
            <?= isset($_GET['search']) ? '<a class="button search-button"  href="./">Reset</a>' : '' ?>
          </form>
        </div>
      </div>
    </div>
  </header>
  <!-- Akhir header -->

  <!-- Navbar -->
  <nav class="navbar-container">
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
      <div class="bar bar-putih"></div>
      <div class="bar bar-putih"></div>
      <div class="bar bar-putih"></div>
    </div>
  </nav>
  <!-- Akhir navbar -->

  <!-- Properti kami -->
  <div class="property-container">
    <h2>Properti kami</h2>
    <div class="card-box">
      <?php
      if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string(connection(), $_GET['search']);
        $query = "SELECT * FROM properti WHERE nama_properti LIKE '%$search%' OR kota LIKE '%$search%' OR alamat LIKE '%$search%' OR deskripsi LIKE '%$search%' OR harga LIKE '%$search%' OR luas_bangunan LIKE '%$search%' OR kamar_tidur LIKE '%$search%' OR kamar_mandi LIKE '%$search%' OR balkon LIKE '%$search%' OR ruang_keluarga LIKE '%$search%' OR dapur LIKE '%$search%' OR tipe_properti LIKE '%$search%'";
      } else {
        $query = "SELECT * FROM properti LIMIT 6";
      }
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
    <a href="property.php" class="lihat-selengkapnya-box">
      <p>lihat selengkapnya</p>
      <i class="fa-solid fa-arrow-right"></i>
    </a>
  </div>
  <!-- Akhir properti kami -->

  <!-- Mengapa memilih kami -->
  <div class="why-container">
    <div class="why-boxs">
      <div class="why-box">
        <h2>Mengapa memilih kami</h2>
        <div class="why-contents">
          <div class="bg-icon">
            <i class="fa-solid fa-medal"></i>
          </div>
          <div class="why-content">
            <h3>Tepercaya</h3>
            <p>
              Kami memahami betapa pentingnya kepercayaan dalam bisnis ini.
              Oleh karena itu, kami selalu mengutamakan integritas dan
              transparansi dalam setiap transaksi. Kami akan memberikan
              informasi yang jujur dan lengkap mengenai properti yang kami
              jual, dan kami akan memastikan bahwa proses transaksi berjalan
              lancar dan sesuai dengan peraturan yang berlaku.
            </p>
          </div>
        </div>
        <div class="why-contents">
          <div class="bg-icon">
            <i class="fa-solid fa-building-circle-check"></i>
          </div>
          <div class="why-content">
            <h3>Berkualitas</h3>
            <p>
              Kami mengutamakan kualitas dalam setiap aspek pekerjaan yang
              kami lakukan. Tim kami terdiri dari profesional berpengalaman
              yang ahli di bidang penjualan properti. Kami memastikan bahwa
              setiap properti yang kami jual diperiksa dengan teliti dan
              dijaga dengan baik sebelum ditawarkan kepada calon pembeli.
            </p>
          </div>
        </div>
        <div class="why-contents">
          <div class="bg-icon">
            <i class="fa-solid fa-user"></i>
          </div>
          <div class="why-content">
            <h3>Agen berpengalaman</h3>
            <p>
              Tim kami terdiri dari agen-agen berpengalaman yang ahli dalam
              bidang penjualan properti. Kami memiliki jaringan yang luas dan
              dapat membantu Anda mencari pembeli yang tepat untuk properti
              Anda. Kami juga dapat memberikan saran dan dukungan dalam setiap
              tahap transaksi, dari penawaran hingga akhir proses pembayaran.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir mengapa memilih kami -->

  <!-- Review -->
  <div class="container-review">
    <h2>Apa kata mereka tentang bayview?</h2>
    <div class="slider-container-review">
      <div class="slider-review">
        <img src="image/profil1.jpg" alt="profil 1" />
        <p class="comment">
          "Bayview ini adalah tempat terbaik untuk mencari properti impian
          Anda. Saya sangat terbantu dengan fitur pencarian yang sangat detail
          dan akurat, serta Tim customer service yang sangat responsif dalam
          menjawab pertanyaan saya. Saya sangat merekomendasikan situs ini
          kepada siapa saja yang mencari properti."
        </p>
        <p class="author">- Akge, 25 Tahun, UI/UX Designer</p>
      </div>
      <div class="slider-review">
        <img src="image/profil2.jpg" alt="profil 2" />
        <p class="comment">
          "Saya baru saja selesai menggunakan website penjualan properti rumah
          ini, dan saya sangat terkesan dengan pengalaman yang saya dapatkan.
          Situs ini memberikan layanan yang luar biasa bagi para calon pembeli
          rumah seperti saya. Berikut adalah beberapa hal yang membuat
          pengalaman saya begitu istimewa."
        </p>
        <p class="author">- Kevin, 25 Tahun, Front End Developer</p>
      </div>
      <div class="slider-review">
        <img src="image/profil3.jpg" alt="profil 3" />
        <p class="comment">
          "Saya baru saja selesai menggunakan website penjualan properti rumah
          ini, dan saya sangat terkesan dengan pengalaman yang saya dapatkan.
          Situs ini memberikan layanan yang luar biasa bagi para calon pembeli
          rumah seperti saya. Berikut adalah beberapa hal yang membuat
          pengalaman saya begitu istimewa."
        </p>
        <p class="author">- Aris, 25 Tahun, Back End Developer</p>
      </div>
      <div class="slider-review">
        <img src="image/profil4.jpg" alt="profil 4" />
        <p class="comment">
          "Saya baru saja menggunakan website ini untuk mencari dan membeli
          properti rumah, dan saya benar-benar terkesan dengan layanan yang
          diberikan. Berikut adalah beberapa hal yang membuat pengalaman saya
          menjadi yang terbaik."
        </p>
        <p class="author">- Hubed, 25 Tahun, Mobile Development</p>
      </div>
      <div class="slider-review">
        <img src="image/profil5.jpg" alt="profil 5" />
        <p class="comment">
          "Saya sangat merekomendasikan website ini kepada siapa pun yang
          mencari properti rumah. Layanan yang mereka berikan sangat
          profesional, dan pengalaman pengguna yang mereka tawarkan
          benar-benar luar biasa."
        </p>
        <p class="author">- Lukman, 25 Tahun, Data Analist</p>
      </div>
    </div>
  </div>
  <!-- Akhir review -->

  <!-- Alur pembelian -->
  <div class="container-alur">
    <h2>Alur pembelian properti</h2>
    <div class="alur-box">
      <div class="alur-detail">
        <img src="image/alur1.jpg" alt="alur1" />
        <p>Cek detail properti</p>
        <p>melalui website</p>
      </div>
      <div class="alur-detail">
        <img src="image/alur2.jpg" alt="alur1" />
        <p>Hubungi sales jika</p>
        <p>merasa cocok</p>
      </div>
      <div class="alur-detail">
        <img src="image/alur3.jpg" alt="alur1" />
        <p>Cek unit properti</p>
        <p>secara langsung</p>
      </div>
      <div class="alur-detail">
        <img src="image/alur4.jpg" alt="alur1" />
        <p>Lakukan proses</p>
        <p>pembayaran</p>
      </div>
    </div>
  </div>
  <!-- Akhir alur pembelian -->

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

  <!-- Javascript -->
  <script src="javascript/navbar.js"></script>
  <script src="javascript/navbarScrool.js"></script>
  <script src="javascript/barScrool.js"></script>
  <script src="javascript/sliderImage.js"></script>
  <script src="javascript/sliderReview.js"></script>

  <!-- Fontawsome -->
  <script src="https://kit.fontawesome.com/ee9e0f07f2.js" crossorigin="anonymous"></script>
</body>

</html>