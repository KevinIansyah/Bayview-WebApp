<?php
$statusDelete = "";
if (isset($_GET['kode'])) {
  $queryDeletePenjualan = "DELETE FROM penjualan WHERE id_agen = '$_GET[kode]'";
  $resultDeletePenjualan = mysqli_query(connection(), $queryDeletePenjualan);
  if ($resultDeletePenjualan) {
    $querySearchProperty = "SELECT * FROM properti WHERE id_agen = '$_GET[kode]'";
    $resultSearchProperty = mysqli_query(connection(), $querySearchProperty);
    while ($dataSearchProperty = mysqli_fetch_array($resultSearchProperty)) {
      $queryDeleteGambar = "DELETE FROM gambar_properti WHERE id_properti = '$dataSearchProperty[id_properti]'";
      $resultDeleteGambar = mysqli_query(connection(), $queryDeleteGambar);
    }
    $queryDeleteProperty = "DELETE FROM properti WHERE id_agen = '$_GET[kode]'";
    $resultDeleteProperty = mysqli_query(connection(), $queryDeleteProperty);
    if ($resultDeleteProperty) {
      $queryDelete = "DELETE FROM agen WHERE id_agent = '$_GET[kode]'";
      $resultDelete = mysqli_query(connection(), $queryDelete);
      if ($resultDelete) {
        $statusDelete = "ok";
      } else {
        $statusDelete = "err";
      }
    }
  }
}
?>

<div class="welcome-box welcome-box-search">
  <h2>Welcome To Your Agent Menu</h2>
  <form action="" method="GET" class="search-form" role="search">
    <input name="page" type="hidden" value="showAgent" />
    <input class="form-input" name="search" type="search" placeholder="Search" <?= isset($_GET['search']) ? 'value="' . $_GET['search'] . '"' : '' ?> aria-label="Search" />
    <button class="button search-button" type="submit">
      Search
    </button>
    <?= isset($_GET['search']) ? '<a class="button search-button"  href="?page=showAgent">Reset</a>' : '' ?>
  </form>
</div>
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Data Agen</h1>


<?php
// Alert delete
if ($statusDelete == "ok") {
  echo '<div class="alert alert-success">
            <p><strong>Berhasil!</strong> Menghapus data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
} else if ($statusDelete == "err") {
  echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Menghapus data agen.</p>
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
            <p><strong>Berhasil!</strong> Mengubah data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
  } else {
    echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Mengubah data agen.</p>
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
      <th scope="col">Id Agen</th>
      <th scope="col">Nama Agen</th>
      <th scope="col">Umur</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">Email</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody id="table-body">
    <?php
    $queryDataAgen = "SELECT * FROM agen";
    if (isset($_GET['search'])) {
      $search = mysqli_real_escape_string(connection(), $_GET['search']);
      $queryDataAgen = "select * from agen where nama like '%$search%' or email like '%$search%' or no_telp like '%$search%' or alamat like '%$search%' or umur like '%$search%' or jenis_kelamin like '%$search%' or id_agent like '%$search%'";
    }
    $resultDataAgen = mysqli_query(connection(), $queryDataAgen);
    $no = 1;
    while ($dataDataAgen = mysqli_fetch_array($resultDataAgen)) {
    ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $dataDataAgen['id_agent'] ?></td>
        <td><?= $dataDataAgen['nama'] ?></td>
        <td><?= $dataDataAgen['umur'] ?></td>
        <td><?= $dataDataAgen['jenis_kelamin'] ?></td>
        <td><?= $dataDataAgen['alamat'] ?></td>
        <td><?= $dataDataAgen['email'] ?></td>
        <td><?= $dataDataAgen['no_telp'] ?></td>
        <td>
          <img src="../image/<?= $dataDataAgen['gambar'] ?>" alt="" style="width: 8rem" />
        </td>
        <td class="action" style="width: 5.5rem;">
          <a href="?page=updateAgent&kode=<?= $dataDataAgen['id_agent']; ?>"><i class="fa-solid fa-pen"></i></a>
          <a href="?page=showAgent&kode=<?= $dataDataAgen['id_agent']; ?>" onclick="return confirm('Menghapus properti akan menghapus data properti dan penjualan dengan agen yang berkaitan. Apakah anda yakin?');"><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>