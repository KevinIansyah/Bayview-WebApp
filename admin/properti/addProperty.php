<?php
$status = "";
if (isset($_POST['nama_properti'])) {
  $query = "INSERT INTO properti (id_agen, nama_properti, tipe_properti, deskripsi, alamat, kota, provinsi, luas_bangunan, kamar_tidur, kamar_mandi, dapur, ruang_keluarga, balkon, harga, status) VALUES ('" . $_POST['id_agen'] . "', '" . $_POST['nama_properti'] . "', '" . $_POST['tipe_properti'] . "', '" . $_POST['deskripsi'] . "', '" . $_POST['alamat'] . "', '" . $_POST['kota'] . "', '" . $_POST['provinsi'] . "', '" . $_POST['luas_bangunan'] . "', '" . $_POST['kamar_tidur'] . "', '" . $_POST['kamar_mandi'] . "', '" . $_POST['dapur'] . "', '" . $_POST['ruang_keluarga'] . "', '" . $_POST['balkon'] . "', '" . $_POST['harga'] . "', '" . $_POST['status'] . "')";
  $result = mysqli_query(connection(), $query);
  if ($result) {
    $querySearchUpload = "SELECT * from properti WHERE nama_properti = '" . $_POST['nama_properti'] . "' AND kota = '" . $_POST['kota'] . "' AND provinsi = '" . $_POST['provinsi'] . "' AND harga = '" . $_POST['harga'] . "' AND status = '" . $_POST['status'] . "'";
    $resultSearchUpload = mysqli_query(connection(), $querySearchUpload);
    $rowSearchUpload = mysqli_fetch_array($resultSearchUpload);
    if ($rowSearchUpload['id_properti'] != null) {
      foreach ($_FILES as $file) {
        $ext  = array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
        $tipe = $file['type'];
        $size = $file['size'];
        if (is_uploaded_file($file['tmp_name'])) { //cek apakah ada file yang di upload
          if (!in_array(($tipe), $ext)) { //cek ekstensi file
            echo '<script type="text/javascript">alert("Format gambar tidak diperbolehkan!");window.history.go(-1)</script>';
          } else if ($size > 2097152) {
            echo '<script type="text/javascript">alert("Ukuran gambar terlalu besar!");window.history.go(-1);</script>';
          } else {
            $extractFile = pathinfo($file['name']);
            $dir         = "../image/";
            $newName = microtime() . '.' . $extractFile['extension'];
            //pindahkan file yang di upload ke directory tujuan
            if (move_uploaded_file($file['tmp_name'], $dir . $newName)) {
              $queryUpload = "INSERT INTO gambar_properti (id_properti, gambar) VALUES ('" . $rowSearchUpload['id_properti'] . "', '" . $newName . "')";
              $resultUpload = mysqli_query(connection(), $queryUpload);
              if ($resultUpload) {
                continue;
              } else {
                echo '<script type="text/javascript">alert("Error Upload Gambar")</script>';
              }
            } else {
              echo '<script type="text/javascript">alert("Foto gagal diupload");window.history.go(-1);</script>';
            }
          }
        } else {
          echo '<script type="text/javascript">alert("Tidak ada foto yang dipilih");window.history.go(-1);</script>';
        }
      }
    }
    $status = "ok";
  } else {
    $status = "err";
  }
}
?>
<div class="welcome-box">
  <h2>Welcome To Your Property Menu</h2>
</div>
<h1 class="heading-1">Tambah Properti</h1>

<!-- Alert insert -->
<?php
if ($status == "ok") {
  echo '<div class="alert alert-success">
            <p><strong>Berhasil!</strong> Menyimpan data properti.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
}
if ($status == "err") {
  echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Menyimpan data properti.</p>
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

    <div class="grid-form-1">
      <label for="#" class="form-label">Tipe Properti</label>
      <select id="tipe_properti" name="tipe_properti" class="form-select" required>
        <option selected disabled value="">Choose...</option>
        <option value="Minimalis">Minimalis</option>
        <option value="Klasik">Klasik</option>
        <option value="Etnik">Etnik</option>
        <option value="Mediterranean">Mediterranean</option>
        <option value="Skandinavia">Skandinavia</option>
        <option value="Vintage">Vintage</option>
        <option value="Rustic">Rustic</option>
        <option value="Industrial">Industrial</option>
        <option value="Scandinavian">Scandinavian</option>
        <option value="Farmhouse">Farmhouse</option>
        <option value="Mid-Century Modern">Mid-Century Modern</option>
        <option value="Contemporary">Contemporary</option>
        <option value="Traditional">Traditional</option>
        <option value="Transitional">Transitional</option>
        <option value="Modern">Modern</option>
        <option value="Coastal">Coastal</option>
        <option value="Eclectic">Eclectic</option>
        <option value="Shabby Chic">Shabby Chic</option>
        <option value="Hamptons">Hamptons</option>
        <option value="French Country">French Country</option>
        <option value="Tropical">Tropical</option>
        <option value="Asian">Asian</option>
        <option value="Beach Style">Beach Style</option>
        <option value="Southwestern">Southwestern</option>
      </select>
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Nama Properti</label>
      <input type="text" class="form-control" id="nama_properti" name="nama_properti" required placeholder="name property" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Status</label>
      <select id="status" name="status" class="form-select" required>
        <option selected disabled value="">Choose...</option>
        <option value="Available">Available</option>
        <option value="Not Available">Not Available</option>
      </select>
    </div>
  </div>

  <div>
    <label for="#" class="form-label">Alamat Properti</label>
    <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="addres" />
  </div>

  <div>
    <label for="#" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required placeholder="description"></textarea>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Kota</label>
      <input type="text" class="form-control" id="kota" name="kota" required placeholder="city" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Provinsi</label>
      <input type="text" class="form-control" id="provinsi" name="provinsi" required placeholder="province" />
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Luas Bangunan</label>
      <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" required placeholder="Luas bangunan" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Kamar Mandi</label>
      <input type="text" class="form-control" id="kamar_mandi" name="kamar_mandi" required placeholder="jumlah kamar mandi 1-10" />
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Kamar Tidur</label>
      <input type="text" class="form-control" id="kamar_tidur" name="kamar_tidur" required placeholder="jumlah kamar tidur 1-10" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Dapur</label>
      <input type="text" class="form-control" id="dapur" name="dapur" required placeholder="jumlah dapur 1-10" />
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Ruang Keluarga</label>
      <input type="text" class="form-control" id="ruang_keluarga" name="ruang_keluarga" required placeholder="jumlah ruang keluarga 1-10" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Balkon</label>
      <input type="text" class="form-control" id="balkon" name="balkon" required placeholder="jumlah balkon 1-10" />
    </div>
  </div>

  <div>
    <label for="#" class="form-label">Harga</label>
    <input type="text" class="form-control" id="harga" name="harga" required placeholder="harga" />
  </div>

  <div>
    <label for="#" class="form-label">Gambar 1</label>
    <div id="imagePreviewGambar1"></div>
    <input type="file" class="form-control" id="gambar1" name="gambar1" onchange="return fileValidation('gambar1', 'imagePreviewGambar1')" aria-label="file example" required />
  </div>

  <div id="formfield">
  </div>
  <div>
    <button type="button" class="button button-submit" style="margin-bottom: 1rem;" onclick="addUpload()">Add Upload</button>
    <button type="button" class="button button-submit" style="margin-bottom: 1rem;" onclick="removeUpload()">Remove Upload</button>
  </div>
  <button type="submit" class="button button-submit">Submit</button>
</form>
<!-- Akhir form -->
<script>
  let no = 2;
  let max = 10;

  function addUpload() {
    if (no <= max) {
      var form = '<div class="col-12">' +
        '<label for="#" class="form-label">Gambar ' + no + '</label>' +
        '<div id="imagePreviewGambar' + no + '"></div>' +
        '<input type="file" class="form-control" id="gambar' + no + '" onchange="return fileValidation(\'gambar' + no + '\', \'imagePreviewGambar' + no + '\')" name="gambar' + no + '" aria-label="file example" required />' +
        '</div>';
      document.getElementById('formfield').insertAdjacentHTML("beforeend", form);
      no++;
    } else {
      alert('Maximal upload 10');
    }
  }

  function removeUpload() {
    if (no > 2) {
      no--;
      document.getElementById('formfield').removeChild(document.getElementById('formfield').lastChild);
    } else {
      alert('Minimal upload 1');
    }
  }

  function fileValidation(id, idPreview) {
    var fileInput = document.getElementById(id);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(filePath)) {
      alert('Invalid file type');
      fileInput.value = '';
      return false;
    } else {
      if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById(idPreview).innerHTML =
            '<img src="' + e.target.result +
            '" width="200px" />';
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  }
</script>