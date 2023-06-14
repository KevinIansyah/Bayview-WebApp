<?php
$status = "";
if (isset($_POST['nama'])) {
  $query = "INSERT INTO penjualan VALUES (NULL,'" . $_POST['id_properti'] . "','" . $_POST['id_agen'] . "','" . $_POST['nama'] . "','" . $_POST['nik'] . "','" . $_POST['alamat'] . "','" . $_POST['no_telp'] . "','" . $_POST['email'] . "','" . $_POST['tanggal_pesan'] . "','" . $_POST['tanggal_selesai'] . "','" . $_POST['jumlah_dp'] . "','" . $_POST['sisa_bayar'] . "')";
  $result = mysqli_query(connection(), $query);
  if ($result) {
    $status = "ok";
  } else {
    $status = "err";
  }
}
?>
<div class="welcome-box">
  <h2>Welcome To Your Sale Menu</h2>
</div>
<h1 class="heading-1">Tambah Penjualan</h1>

<!-- Alert insert -->
<?php
if ($status == "ok") {
  echo '<div class="alert alert-success">
            <p><strong>Berhasil!</strong> Menyimpan data penjualan.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
} else if ($status == "err") {
  echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Menyimpan data penjualan.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
}
?>

<!-- Form -->
<form class="form" action="" method="POST" enctype="multipart/form-data">
  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Id Properti</label>
      <select id="id_properti" name="id_properti" class="form-select" required>
        <option selected disabled value="">Choose...</option>
        <?php
        $queryProperty = "SELECT * FROM properti";
        $resultProperty = mysqli_query(connection(), $queryProperty);
        while ($rowProperty = mysqli_fetch_array($resultProperty)) {
          echo "<option value='$rowProperty[id_properti]'>$rowProperty[nama_properti]</option>";
        }
        ?>
      </select>
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Id Agen</label>
      <select id="id_agen" name="id_agen" class="form-select" required>
        <option selected disabled value="">Choose...</option>
        <?php
        $queryAgen = "SELECT * FROM agen";
        $resultAgen = mysqli_query(connection(), $queryAgen);
        while ($rowAgen = mysqli_fetch_array($resultAgen)) {
          echo "<option value='$rowAgen[id_agent]'>$rowAgen[nama]</option>";
        }
        ?>
      </select>
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" required placeholder="nama pembeli" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Nik</label>
      <input type="number" class="form-control" id="nik" name="nik" required placeholder="nik pembeli" />
    </div>
  </div>

  <div class="col-md-12">
    <label for="#" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="alamat pembeli" />
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">No Telepon</label>
      <input type="number" class="form-control" id="no_telp" name="no_telp" required placeholder="nomor telepon pembeli" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" required placeholder="email pembeli" />
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Tanggal Pesan</label>
      <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" required placeholder="tanggal beli" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Tanggal Selesai</label>
      <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required placeholder="tanggal selesai" />
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Jumlah Dp</label>
      <input type="number" class="form-control" id="jumlah_dp" name="jumlah_dp" required placeholder="jumlah dp" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Sisa Bayar</label>
      <input type="number" class="form-control" id="sisa_bayar" name="sisa_bayar" required placeholder="sisa bayar" />
    </div>
  </div>

  <button type="submit" class="button button-submit">Submit</button>
</form>
<!-- Akhir form -->