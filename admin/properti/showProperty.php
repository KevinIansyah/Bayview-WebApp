<?php
$statusDelete = "";
if (isset($_GET['kode'])) {
  $queryDeletePenjualan = "DELETE FROM penjualan WHERE id_properti = '$_GET[kode]'";
  $resultDeletePenjualan = mysqli_query(connection(), $queryDeletePenjualan);
  if ($resultDeletePenjualan) {
    $queryDeleteGambar = "DELETE FROM gambar_properti WHERE id_properti = '$_GET[kode]'";
    $resultDeleteGambar = mysqli_query(connection(), $queryDeleteGambar);
    if ($resultDeleteGambar) {
      $queryDeleteProperty = "DELETE FROM properti WHERE id_properti = '$_GET[kode]'";
      $resultDeleteProperty = mysqli_query(connection(), $queryDeleteProperty);
      if ($resultDeleteProperty) {
        $statusDelete = "ok";
      } else {
        $statusDelete = "err";
      }
    }
  }
}
?>
<div class="welcome-box welcome-box-search">
  <h2>Welcome To Your Property Menu</h2>
  <form action="" method="GET" class="search-form" role="search">
    <input name="page" type="hidden" value="showProperty" />
    <input class="form-input" name="search" type="search" placeholder="Search" <?= isset($_GET['search']) ? 'value="' . $_GET['search'] . '"' : '' ?> aria-label="Search" />
    <button class="button search-button" type="submit">
      Search
    </button>
    <?= isset($_GET['search']) ? '<a class="button search-button"  href="?page=showProperty">Reset</a>' : '' ?>
  </form>
</div>
<h1 class="heading-1">Data Properti</h1>

<?php
// Alert delete
if ($statusDelete == "ok") {
  echo '<div class="alert alert-success">
            <p><strong>Berhasil!</strong> Menghapus data properti.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
} else if ($statusDelete == "err") {
  echo '<div class="alert alert-danger">
        <p><strong>Gagal!</strong> Menghapus data properti.</p>
          <button type="button" onclick="closeAlert(this)" class="btn-close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>';
}

// Alert update
if (@$_GET["statusUpdate"] !== NULL) {
  $statusUpdate = $_GET["statusUpdate"];
  if ($statusUpdate == "ok") {
    echo '<div class="alert alert-success">
            <p><strong>Berhasil!</strong> Mengubah data properti.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
  } else {
    echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Mengubah data properti.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
  }
}
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Id Properti</th>
      <th scope="col">Nama Properti</th>
      <th scope="col">Tipe Properti</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kota</th>
      <th scope="col">Provinsi</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody id="table-body">
    <?php
    $queryShowProperty = "SELECT * FROM properti";
    if (isset($_GET['search'])) {
      $search = mysqli_real_escape_string(connection(), $_GET['search']);
      $queryShowProperty = "SELECT * FROM properti WHERE nama_properti LIKE '%$search%' OR tipe_properti LIKE '%$search%' OR alamat LIKE '%$search%' OR kota LIKE '%$search%' OR provinsi LIKE '%$search%' OR status LIKE '%$search%'";
    }
    $resultShowProperty = mysqli_query(connection(), $queryShowProperty);
    $no = 1;
    while ($dataShowProperty = mysqli_fetch_array($resultShowProperty)) {
    ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $dataShowProperty['id_properti'] ?></td>
        <td><?= $dataShowProperty['nama_properti'] ?></td>
        <td><?= $dataShowProperty['tipe_properti'] ?></td>
        <td><?= $dataShowProperty['alamat'] ?></td>
        <td><?= $dataShowProperty['kota'] ?></td>
        <td><?= $dataShowProperty['provinsi'] ?></td>
        <td><?= $dataShowProperty['status'] ?></td>
        <td class="action">
          <a href="?page=detailProperty&id_properti=<?php echo $dataShowProperty["id_properti"]; ?>"><i class="fa-solid fa-circle-info"></i></a>
          <a href="?page=updateProperty&kode=<?= $dataShowProperty['id_properti']; ?> "><i class="fa-solid fa-pen"></i></a>
          <a href="?page=showProperty&kode=<?= $dataShowProperty['id_properti']; ?>" onclick="return confirm('Menghapus properti akan menghapus data penjualan dengan properti yang berkaitan. Apakah anda yakin?');"><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr>
    <?php
      $no++;
    } ?>
  </tbody>
</table>