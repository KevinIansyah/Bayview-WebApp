<div class="welcome-box">
  <h2>Hii, Admin</h2>
  <h2>Welcome To Your Dashboard</h2>
</div>
<div class="grid-boxs">
  <div class="grid-1 grid-box">
    <div class="bg-icon">
      <i class="fa-solid fa-building-circle-check"></i>
    </div>
    <?php
    $dataProperty = mysqli_query(connection(), "SELECT * FROM properti");
    $countProperty = mysqli_num_rows($dataProperty);
    ?>
    <h1><?= $countProperty ?></h1>
    <h6>Data property</h6>
  </div>
  <div class="grid-2 grid-box">
    <div class="bg-icon">
      <i class="fa-solid fa-user"></i>
    </div>
    <?php
    $dataAgen = mysqli_query(connection(), "SELECT * FROM agen");
    $countAgen = mysqli_num_rows($dataAgen);
    ?>
    <h1><?= $countAgen ?></h1>
    <h6>Data agen</h6>
  </div>
  <div class="grid-3 grid-box">
    <div class="bg-icon">
      <i class="fa-solid fa-cart-shopping"></i>
    </div>
    <?php
    $dataPenjualan = mysqli_query(connection(), "SELECT * FROM penjualan");
    $countPenjualan = mysqli_num_rows($dataPenjualan);
    ?>
    <h1><?= $countPenjualan ?></h1>
    <h6>Data penjualan</h6>
  </div>
  <div class="grid-box">
    <div class="bg-icon">
      <i class="fa-solid fa-user-gear"></i>
    </div>
    <?php
    $dataAdmin = mysqli_query(connection(), "SELECT * FROM admin");
    $countAdmin = mysqli_num_rows($dataAdmin);
    ?>
    <h1><?= $countAdmin ?></h1>
    <h6>Data admin</h6>
  </div>
</div>