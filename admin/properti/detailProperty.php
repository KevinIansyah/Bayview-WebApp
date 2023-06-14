<div class="welcome-box">
    <h2>Welcome To Your Property Menu</h2>
</div>
<div class="container">
    <div class="header-name">
        <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="heading-1-detail">Detail Properti</h1>
    </div>
    <div class="container-detail">
        <table class="table table-detail">
            <tbody>
                <?php
                $id_properti = $_GET["id_properti"];
                $queryShowProperty = "SELECT * FROM properti WHERE id_properti = $id_properti";
                $resultShowProperty = mysqli_query(connection(), $queryShowProperty);
                $dataShowProperty = mysqli_fetch_array($resultShowProperty);
                ?>
                <tr>
                    <th>Id Properti</th>
                    <td><?= $dataShowProperty['id_properti'] ?></td>
                </tr>
                <tr>
                    <th>Id Agen</th>
                    <td><?= $dataShowProperty['id_agen'] ?></td>
                </tr>
                <tr>
                    <th>Nama Properti</th>
                    <td><?= $dataShowProperty['nama_properti'] ?></td>
                </tr>
                <tr>
                    <th>Tipe Properti</th>
                    <td><?= $dataShowProperty['tipe_properti'] ?></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td><?= $dataShowProperty['deskripsi'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $dataShowProperty['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Kota</th>
                    <td><?= $dataShowProperty['kota'] ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td><?= $dataShowProperty['provinsi'] ?></td>
                </tr>
                <tr>
                    <th>Luas Bangunan</th>
                    <td><?= $dataShowProperty['luas_bangunan'] ?></td>
                </tr>
                <tr>
                    <th>Kamar Tidur</th>
                    <td><?= $dataShowProperty['kamar_tidur'] ?></td>
                </tr>
                <tr>
                    <th>Kamar mandi</th>
                    <td><?= $dataShowProperty['kamar_mandi'] ?></td>
                </tr>
                <tr>
                    <th>Dapur</th>
                    <td><?= $dataShowProperty['dapur'] ?></td>
                </tr>
                <tr>
                    <th>Ruang Keluarga</th>
                    <td><?= $dataShowProperty['ruang_keluarga'] ?></td>
                </tr>
                <tr>
                    <th>Balkon</th>
                    <td><?= $dataShowProperty['balkon'] ?></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>Rp <?= number_format($dataShowProperty['harga'], 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?= $dataShowProperty['status'] ?></td>
                </tr>
                <?php
                $querySearchGambar = "SELECT * FROM gambar_properti WHERE id_properti = $id_properti";
                $resultSearchGambar = mysqli_query(connection(), $querySearchGambar);
                $no = 1;
                while ($dataSearchGambar = mysqli_fetch_array($resultSearchGambar)) {
                ?>
                    <tr>
                        <th>Gambar <?= $no ?></th>
                        <td><img src="../image/<?= $dataSearchGambar['gambar'] ?>" alt="" width="200px"></td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</div>