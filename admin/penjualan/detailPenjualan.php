<div class="welcome-box">
  <h2>Welcome To Your Sale Menu</h2>
</div>
<div class="container">
  <div class="header-name">
    <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i></a>
    <h1 class="heading-1-detail">Detail Penjualan</h1>
  </div>
  <div class="container-detail">
    <table class="table table-detail">
      <tbody>
        <?php
        $id_penjualan = $_GET["id_penjualan"];
        $queryDataPenjualan = "SELECT * FROM penjualan WHERE id_penjualan = $id_penjualan";
        $resultDataPenjualan = mysqli_query(connection(), $queryDataPenjualan);
        $dataDataPenjualan = mysqli_fetch_array($resultDataPenjualan);

        // Data properti
        $queryDataProperti = "SELECT * FROM properti WHERE id_properti = '{$dataDataPenjualan['id_properti']}'";
        $resultDataProperti = mysqli_query(connection(), $queryDataProperti);
        $dataDataProperti = mysqli_fetch_array($resultDataProperti);

        // Data agen
        $queryDataAgen = "SELECT * FROM agen WHERE id_agent = '{$dataDataPenjualan['id_agen']}'";
        $resultDataAgen = mysqli_query(connection(), $queryDataAgen);
        $dataDataAgen = mysqli_fetch_array($resultDataAgen);
        ?>

        <tr>
          <th>Id Penjualan</th>
          <td><?= $dataDataPenjualan['id_penjualan'] ?></td>
        </tr>
        <tr>
          <th>Id Properti</th>
          <td><?= $dataDataPenjualan['id_properti'] ?></td>
        </tr>
        <tr>
          <th>Nama Properti</th>
          <td><?= $dataDataProperti['nama_properti'] ?></td>
        </tr>
        <tr>
          <th>Tipe Properti</th>
          <td><?= $dataDataProperti['tipe_properti'] ?></td>
        </tr>
        <tr>
          <th>Alamat Properti</th>
          <td><?= $dataDataProperti['alamat'] ?></td>
        </tr>
        <tr>
          <th>Kota Properti</th>
          <td><?= $dataDataProperti['kota'] ?></td>
        </tr>
        <tr>
          <th>Provinsi Properti</th>
          <td><?= $dataDataProperti['provinsi'] ?></td>
        </tr>
        <tr>
          <th>Id Agen</th>
          <td><?= $dataDataPenjualan['id_agen'] ?></td>
        </tr>
        <tr>
          <th>Nama Agen</th>
          <td><?= $dataDataAgen['nama'] ?></td>
        </tr>
        <tr>
          <th>Email Agen</th>
          <td><?= $dataDataAgen['email'] ?></td>
        </tr>
        <tr>
          <th>No Telepon Agen</th>
          <td><?= $dataDataAgen['no_telp'] ?></td>
        </tr>
        <tr>
          <th>Nama Pembeli</th>
          <td><?= $dataDataPenjualan['nama'] ?></td>
        </tr>
        <tr>
          <th>Nik Pembeli</th>
          <td><?= $dataDataPenjualan['nik'] ?></td>
        </tr>
        <tr>
          <th>Alamat Pembeli</th>
          <td><?= $dataDataPenjualan['alamat'] ?></td>
        </tr>
        <tr>
          <th>No Telepon Pembeli</th>
          <td><?= $dataDataPenjualan['no_telp'] ?></td>
        </tr>
        <tr>
          <th>Email Pembeli</th>
          <td><?= $dataDataPenjualan['email'] ?></td>
        </tr>
        <tr>
          <th>Tanggal Pesan</th>
          <td><?= $dataDataPenjualan['tgl_pesan'] ?></td>
        </tr>
        <tr>
          <th>Tanggal Selesai</th>
          <td><?= $dataDataPenjualan['tgl_selesai'] ?></td>
        </tr>
        <tr>
          <th>Jumlah Dp</th>
          <td>Rp <?= number_format($dataDataPenjualan['jumlah_dp'], 2, ',', '.') ?></td>
        </tr>
        <tr>
          <th>Sisa bayar</th>
          <td>Rp <?= number_format($dataDataPenjualan['sisa_bayar'], 2, ',', '.') ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>