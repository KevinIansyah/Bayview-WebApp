<?php
$status = "";
if (isset($_POST['nama'])) {
  $ext  = array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
  $tipe = $_FILES['gambar']['type'];
  $size = $_FILES['gambar']['size'];
  if (is_uploaded_file($_FILES['gambar']['tmp_name'])) { //cek apakah ada file yang di upload
    if (!in_array(($tipe), $ext)) { //cek ekstensi file
      echo '<script type="text/javascript">alert("Format gambar tidak diperbolehkan!");window.history.go(-1)</script>';
    } else if ($size > 2097152) {
      echo '<script type="text/javascript">alert("Ukuran gambar terlalu besar!");window.history.go(-1);</script>';
    } else {
      $extractFile = pathinfo($_FILES['gambar']['name']);
      $dir         = "../image/";
      $newName = microtime() . '.' . $extractFile['extension'];
      //pindahkan file yang di upload ke directory tujuan
      if (move_uploaded_file($_FILES['gambar']['tmp_name'], $dir . $newName)) {
        $queryInsert = "INSERT INTO agen (nama, jenis_kelamin, email, umur, alamat, no_telp, gambar) VALUES ('" . $_POST['nama'] . "','" . $_POST['jenis_kelamin'] . "','" . $_POST['email'] . "','" . $_POST['umur'] . "','" . $_POST['alamat'] . "','" . $_POST['no_telp'] . "','" . $newName . "')";
        $resultInsert = mysqli_query(connection(), $queryInsert);
        if ($resultInsert) {
          $status = "ok";
        } else {
          $status = "err";
        }
      } else {
        echo '<script type="text/javascript">alert("Foto gagal diupload");window.history.go(-1);</script>';
      }
    }
  } else {
    echo '<script type="text/javascript">alert("Tidak ada foto yang dipilih");window.history.go(-1);</script>';
  }
}
?>
<div class="welcome-box">
  <h2>Welcome To Your Agent Menu</h2>
</div>
<h1 class="heading-1">Tambah Agen</h1>

<!-- Alert insert -->
<?php
if ($status == "ok") {
  echo '<div class="alert alert-success">
            <p><strong>Berhasil!</strong> Menyimpan data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
}
if ($status == "err") {
  echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Menyimpan data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
}

?>

<!-- Form -->
<form class="form" action="" method="POST" novalidate enctype="multipart/form-data">
  <div>
    <label for="#" class="form-label">Nama Agen</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="name" required />
  </div>

  <div>
    <label for="#" class="form-label">Jenis Kelamin</label>
    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
      <option selected disabled value="">Choose...</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  </div>

  <div>
    <label for="#" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email" required />
  </div>

  <div>
    <label for="#" class="form-label">Umur</label>
    <input type="text" class="form-control" id="umur" name="umur" placeholder="age" required />
  </div>

  <div>
    <label for="#" class="form-label">alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="addres" required />
  </div>

  <div>
    <label for="#" class="form-label">No Telepon</label>
    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="phone number" required />
  </div>

  <div>
    <label for="#" class="form-label">Foto</label>
    <input type="file" class="form-control-file" aria-label="file example" name="gambar" required />
  </div>

  <button type="submit" class="button button-submit" name="kirim">Submit</button>
</form>
<!-- Akhir form -->