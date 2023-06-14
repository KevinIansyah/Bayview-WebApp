<?php
$queryShow = mysqli_query(connection(), "SELECT * FROM properti WHERE id_properti = '$_GET[kode]'");
$resultShow = mysqli_fetch_array($queryShow);

$status = "";
if (isset($_GET['hapusGambar'])) {
  $querySearchGambar = mysqli_query(connection(), "SELECT * FROM gambar_properti WHERE gambar = '$_GET[hapusGambar]'");
  $resultSearchGambar = mysqli_fetch_array($querySearchGambar);
  $queryHapusGambar = "DELETE FROM gambar_properti WHERE id_gambar_properti = '$resultSearchGambar[id_gambar_properti]'";
  $resultHapusGambar = mysqli_query(connection(), $queryHapusGambar);
  if ($resultHapusGambar) {
    unlink("../image/" . $resultSearchGambar['gambar']);
  }
  header('Location: ?page=updateProperty&kode=' . $_GET['kode']);
}

if (isset($_POST['nama_properti'])) {
  $queryUpdate = "UPDATE properti SET 
  id_agen = '$_POST[id_agen]', 
  tipe_properti = '$_POST[tipe_properti]',
  nama_properti = '$_POST[nama_properti]', 
  status = '$_POST[status]',
  alamat = '$_POST[alamat]', 
  deskripsi = '$_POST[deskripsi]', 
  kota = '$_POST[kota]', 
  provinsi = '$_POST[provinsi]', 
  luas_bangunan = '$_POST[luas_bangunan]', 
  kamar_tidur = '$_POST[kamar_tidur]', 
  kamar_mandi = '$_POST[kamar_mandi]', 
  dapur = '$_POST[dapur]', 
  ruang_keluarga ='$_POST[ruang_keluarga]', 
  balkon = '$_POST[balkon]', 
  harga = '$_POST[harga]' Where id_properti='$_GET[kode]'";
  $resultUpdate = mysqli_query(connection(), $queryUpdate);
  if ($resultUpdate) {
    $status = "ok";
    header('Location: ?page=showProperty&statusUpdate=' . $status);
    foreach ($_FILES as $key => $file) {
      if (is_uploaded_file($file['tmp_name'])) {
        foreach ($_POST as $key => $value) {
          if (preg_match("/currentGambar/", $key)) {
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
                  unlink("../image/" . $value);
                  $queryUpdateGambar = "UPDATE gambar_properti SET gambar = '$newName' WHERE gambar = '$value' ";
                  $resultUpdateGambar = mysqli_query(connection(), $queryUpdateGambar);
                  if ($resultUpdateGambar) {
                    $status = "ok";
                    header('Location: ?page=showProperty&statusUpdate=' . $status);
                  } else {
                    echo '<script type="text/javascript">alert("Error Query Gambar");window.history.go(-1);</script>';
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
        if (!preg_match("/currentGambar/", $key)) {
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
                $queryUpload = "INSERT INTO gambar_properti (id_properti, gambar) VALUES ('" . $_GET['kode'] . "', '" . $newName . "')";
                $resultUpload = mysqli_query(connection(), $queryUpload);
                if ($resultUpload) {
                  $status = "ok";
                  header('Location: ?page=showProperty&statusUpdate=' . $status);
                } else {
                  echo '<script type="text/javascript">alert("Error Query Gambar");window.history.go(-1);</script>';
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
    }
  } else {
    echo '<script type="text/javascript">alert("Terjadi Kesalahan");window.history.go(-1);</script>';
  }
}

?>
<div class="welcome-box">
  <h2>Welcome To Your Property Menu</h2>
</div>
<h1 class="heading-1">Ubah Properti</h1>

<!-- Form -->
<form class="form" action="" method="POST" enctype="multipart/form-data">
  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Id Agen</label>
      <select id="id_agen" name="id_agen" class="form-select" required>
        <?php
        $queryAgen = "SELECT * FROM agen";
        $resultAgen = mysqli_query(connection(), $queryAgen);
        while ($rowAgen = mysqli_fetch_array($resultAgen)) {
          echo "<option value='$rowAgen[id_agent]'";
          echo $resultShow['id_agen'] == $rowAgen['id_agent'] ? "selected" : "";
          echo ">$rowAgen[nama]</option>";
        }
        ?>
      </select>
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Tipe Properti</label>
      <select id="tipe_properti" name="tipe_properti" class="form-select">
        <option value="Minimalis" <?php $resultShow['tipe_properti'] == "Minimalis" ? "selected" : "" ?>>Minimalis</option>
        <option value="Klasik" <?php $resultShow['tipe_properti'] == "Klasik" ? "selected" : "" ?>>Klasik</option>
        <option value="Etnik" <?php $resultShow['tipe_properti'] == "Etnik" ? "selected" : "" ?>>Etnik</option>
        <option value="Mediterranean" <?php $resultShow['tipe_properti'] == "Mediterranean" ? "selected" : "" ?>>Mediterranean</option>
        <option value="Skandinavia" <?php $resultShow['tipe_properti'] == "Skandinavia" ? "selected" : "" ?>>Skandinavia</option>
        <option value="Vintage" <?php $resultShow['tipe_properti'] == "Vintage" ? "selected" : "" ?>>Vintage</option>
        <option value="Rustic" <?php $resultShow['tipe_properti'] == "Rustic" ? "selected" : "" ?>>Rustic</option>
        <option value="Industrial" <?php $resultShow['tipe_properti'] == "Industrial" ? "selected" : "" ?>>Industrial</option>
        <option value="Farmhouse" <?php $resultShow['tipe_properti'] == "Farmhouse" ? "selected" : "" ?>>Farmhouse</option>
        <option value="Mid-Century Modern" <?php $resultShow['tipe_properti'] == "Mid-Century Modern" ? "selected" : "" ?>>Mid-Century Modern</option>
        <option value="Contemporary" <?php $resultShow['tipe_properti'] == "Contemporary" ? "selected" : "" ?>>Contemporary</option>
        <option value="Traditional" <?php $resultShow['tipe_properti'] == "Traditional" ? "selected" : "" ?>>Traditional</option>
        <option value="Transitional" <?php $resultShow['tipe_properti'] == "Transitional" ? "selected" : "" ?>>Transitional</option>
        <option value="Modern" <?php $resultShow['tipe_properti'] == "Modern" ? "selected" : "" ?>>Modern</option>
        <option value="Coastal" <?php $resultShow['tipe_properti'] == "Coastal" ? "selected" : "" ?>>Coastal</option>
        <option value="Eclectic" <?php $resultShow['tipe_properti'] == "Eclectic" ? "selected" : "" ?>>Eclectic</option>
        <option value="Shabby Chic" <?php $resultShow['tipe_properti'] == "Shabby Chic" ? "selected" : "" ?>>Shabby Chic</option>
        <option value="Hamptons" <?php $resultShow['tipe_properti'] == "Hamptons" ? "selected" : "" ?>>Hamptons</option>
        <option value="French Country" <?php $resultShow['tipe_properti'] == "French Country" ? "selected" : "" ?>>French Country</option>
        <option value="Tropical" <?php $resultShow['tipe_properti'] == "Tropical" ? "selected" : "" ?>>Tropical</option>
        <option value="Asian" <?php $resultShow['tipe_properti'] == "Asian" ? "selected" : "" ?>>Asian</option>
        <option value="Beach Style" <?php $resultShow['tipe_properti'] == "Beach Style" ? "selected" : "" ?>>Beach Style</option>
        <option value="Southwestern" <?php $resultShow['tipe_properti'] == "Southwestern" ? "selected" : "" ?>>Southwestern</option>
      </select>
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Nama Properti</label>
      <input type="text" class="form-control" id="nama_properti" name="nama_properti" required placeholder="name property" value="<?php echo $resultShow['nama_properti']; ?>" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Status</label>
      <select id="status" name="status" class="form-select">
        <option><?php echo $resultShow['status']; ?></option>
        <option value="Available" <?php echo $resultShow['status'] == 1 ? "selected" : ""; ?>>Available</option>
        <option value="Not Available" <?php echo $resultShow['status'] == 0 ? "selected" : ""; ?>>Not Available</option>
      </select>
    </div>
  </div>

  <div>
    <label for="#" class="form-label">Alamat Properti</label>
    <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="addres" value="<?php echo $resultShow['alamat']; ?>" />
  </div>

  <div>
    <label for="#" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required placeholder="description"><?php echo $resultShow['deskripsi']; ?></textarea>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Kota</label>
      <input type="text" class="form-control" id="kota" name="kota" required placeholder="city" value="<?php echo $resultShow['kota']; ?>" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Provinsi</label>
      <input type="text" class="form-control" id="provinsi" name="provinsi" required placeholder="province" value="<?php echo $resultShow['provinsi']; ?>" />
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Luas Bangunan</label>
      <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" required placeholder="Luas bangunan" value="<?php echo $resultShow['luas_bangunan']; ?>" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Kamar Mandi</label>
      <input type="text" class="form-control" id="kamar_mandi" name="kamar_mandi" required placeholder="jumlah kamar mandi 1-10" value="<?php echo $resultShow['kamar_mandi']; ?>" />
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Kamar Tidur</label>
      <input type="text" class="form-control" id="kamar_tidur" name="kamar_tidur" required placeholder="jumlah kamar tidur 1-10" value="<?php echo $resultShow['kamar_tidur']; ?>" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Dapur</label>
      <input type="text" class="form-control" id="dapur" name="dapur" required placeholder="jumlah dapur 1-10" value="<?php echo $resultShow['dapur']; ?>" />
    </div>
  </div>

  <div class="grid-form">
    <div class="grid-form-1">
      <label for="#" class="form-label">Ruang Keluarga</label>
      <input type="text" class="form-control" id="ruang_keluarga" name="ruang_keluarga" required placeholder="jumlah ruang keluarga 1-10" value="<?php echo $resultShow['ruang_keluarga']; ?>" />
    </div>

    <div class="grid-form-2">
      <label for="#" class="form-label">Balkon</label>
      <input type="text" class="form-control" id="balkon" name="balkon" required placeholder="jumlah balkon 1-10" value="<?php echo $resultShow['balkon']; ?>" />
    </div>
  </div>

  <div>
    <label for="#" class="form-label">Harga</label>
    <input type="text" class="form-control" id="harga" name="harga" required placeholder="harga" value="<?php echo $resultShow['harga']; ?>" />
  </div>

  <?php
  $queryGambar = mysqli_query(connection(), "SELECT * FROM gambar_properti WHERE id_properti = '$_GET[kode]'");
  $no = 1;
  while ($resultGambar = mysqli_fetch_array($queryGambar)) {
  ?>
    <div>
      <label for="#" class="form-label">Gambar <?= $no ?></label>
      <div class="image-preview" id="imagePreviewGambar<?= $no ?>">
        <img src="../image/<?= $resultGambar['gambar'] ?>" alt="image preview" style="width: 200px;" />
        <a class="button button-danger" href="?page=updateProperty&kode=<?= $_GET['kode'] ?>&hapusGambar=<?= $resultGambar['gambar'] ?>" onclick="return confirm('This action cannot be undone')">Hapus Gambar</a>
      </div>
      <div id="currentDivGambar<?= $no ?>"></div>
      <input type="file" class="form-control" id="gambar<?= $no ?>" name="gambar<?= $no ?>" onchange="return fileValidation('<?= $no ?>', '<?= $resultGambar['gambar'] ?>')" aria-label="file example" />
    </div>
  <?php $no++;
  } ?>
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
  let no = <?= $no ?>;
  let max = 10;

  function addUpload() {
    if (no <= max) {
      var form = '<div class="col-12">' +
        '<label for="#" class="form-label">Gambar ' + no + '</label>' +
        '<div id="imagePreviewGambar' + no + '"></div>' +
        '<input type="file" class="form-control" id="gambar' + no + '" onchange="return fileValidation(\'' + no + '\')" name="gambar' + no + '" aria-label="file example" required />' +
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

  function fileValidation(id, current = null) {
    var fileInput = document.getElementById('gambar' + id);
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
          if (current != null) document.getElementById('currentDivGambar' + id).innerHTML = '<input type="hidden" name="currentGambar' + id + '" value="' + current + '">';
          document.getElementById('imagePreviewGambar' + id).innerHTML = '<img src="' + e.target.result + '" width="200px" />';
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  }
</script>