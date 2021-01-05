<?php if($_SERVER['REQUEST_METHOD'] == "POST"): ?>
<?php if(isset($_POST['transaksi_id'])): ?>
<?php
    require 'templates\header.php';
    require 'modules\login-check.php';
    require 'modules\koneksi.php';

    $transaksi_id = $_POST['transaksi_id'];
    $idkategoriforrelated = "";
    $sqltransaksi = "SELECT * from tb_transaksi WHERE transaksi_id = '$transaksi_id'";
    $row_transaksi = mysqli_fetch_assoc(mysqli_query($conn, $sqltransaksi));
    $transaksi_status = $row_transaksi['transaksi_status'];
    $buku_id = $row_transaksi['buku_id'];
    $paket_id = $row_transaksi['paket_id'];
    require 'modules/readable_date.php';
    $transaksi_timestamp = readable_date(date('Y-m-d', strtotime($row_transaksi['transaksi_timestamp'])));
    
    $sql="SELECT * FROM tb_buku WHERE buku_id='$buku_id'";
    $result = mysqli_query($conn, $sql);
?>
<?php if (mysqli_num_rows($result) > 0):?>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<div class="container">
    <?php if($transaksi_status == 0): ?>
    <div class="alert alert-warning mt-5">
        <?php 
            $sqlgettagihan = "SELECT paket_harga FROM tb_paket WHERE paket_id =     '$paket_id'";
            $rowgettagihan = mysqli_fetch_assoc(mysqli_query($conn, $sqlgettagihan));
            $tagihan = $rowgettagihan['paket_harga'];
        ?>
        Harap Segera Lakukan Pembayaran!
        Tagihan Anda <strong><?php echo "Rp " . number_format($tagihan,2,',','.') ?></strong>
    </div>
    <?php endif; ?>
    <div class="row pt-5 pb-5">
        <div class="col-md-4">
            <img class="img-fluid" src="assets/img/books/<?php echo $row['buku_cover']; ?>">
        </div>
        <div class="col-md-8">
            <h1 class="mb-3"><?php echo $row['buku_judul'] ?></h1>
            <table class="table table-borderless">
                <tr>
                    <td>Pengarang</td>
                    <td>:
                        <?php 
                        $bukupengarangid = $row['pengarang_id'];
                        $sqlpengarang = "SELECT pengarang_nama FROM tb_pengarang WHERE pengarang_id='$bukupengarangid'";
                        $namapengarang = mysqli_fetch_assoc(mysqli_query($conn, $sqlpengarang));
                        echo $namapengarang['pengarang_nama'];
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Bahasa</td>
                    <td>:
                        <?php 
                        $bahasabuku = $row['bahasa_id'];
                        $sqlbahasa = "SELECT bahasa_nama FROM tb_bahasa WHERE bahasa_id='$bahasabuku'";
                        $namabahasa = mysqli_fetch_assoc(mysqli_query($conn, $sqlbahasa));
                        echo $namabahasa['bahasa_nama'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>:
                        <?php
                         $kategoriid = $row['kategori_id'];
                         $idkategoriforrelated = $row['kategori_id'];
                         $sqlkategori = "SELECT kategori_nama FROM tb_kategori WHERE kategori_id='$kategoriid'";
                         $namakategori = mysqli_fetch_assoc(mysqli_query($conn, $sqlkategori));
                         echo $namakategori['kategori_nama'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td>:
                        <?php echo $row['buku_isbn'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:
                        <?php
                         $penerbitbuku = $row['penerbit_id'];
                         $sqlpenerbit = "SELECT penerbit_nama FROM tb_penerbit WHERE penerbit_id='$penerbitbuku'";
                         $namapenerbit = mysqli_fetch_assoc(mysqli_query($conn, $sqlpenerbit));
                         echo $namapenerbit['penerbit_nama'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Pilihan Paket</td>
                    <td>
                        <?php 
                    $sqlpaket = "SELECT paket_nama FROM tb_paket WHERE paket_id='$paket_id'";
                    $resultpaket = mysqli_query($conn, $sqlpaket);
                    ?>
                        <?php while($rowpaket = mysqli_fetch_assoc($resultpaket)): ?>
                        <span class="badge badge-primary"><?php echo $rowpaket['paket_nama']; ?></span>
                        <?php endwhile; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <h6>Riwayat Transaksi</h6>
    <hr>
    <div class="row pt-5 pb-5">
        <table class="table table-borderless">
            <tr>
                <td>Tanggal Sewa</td>
                <td>: <?php echo $transaksi_timestamp; ?></td>
            </tr>
            <tr>
                <td>Status Pembayaran</td>
                <td>:
                    <?php if($transaksi_status == 0): ?>
                    <span class="badge badge-warning">
                        Belum Bayar
                    </span>
                    <?php elseif($transaksi_status == 1): ?>
                    <span class="badge badge-primary">
                        Sudah Bayar
                    </span>
                    <?php elseif($transaksi_status == 2): ?>
                    <span class="badge badge-success">
                        Transaksi Selesai
                    </span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php 
                $sqlgetkodeakses = "SELECT * FROM tb_akses WHERE transaksi_id = '$transaksi_id'";
                if (mysqli_num_rows(mysqli_query($conn, $sqlgetkodeakses)) > 0) {
                    $rowgetkodeakses = mysqli_fetch_assoc(mysqli_query($conn, $sqlgetkodeakses));
                    $akses_kode = $rowgetkodeakses['akses_kode'];
                    $tanggal_awal = readable_date($rowgetkodeakses['akses_tanggal_awal']);
                    $tanggal_akhir = readable_date($rowgetkodeakses['akses_tanggal_akhir']);
                }
            ?>
            <?php if(mysqli_num_rows(mysqli_query($conn, $sqlgetkodeakses))): ?>
            <tr>
                <td>Kode Akses</td>
                <td>: <?php echo $akses_kode; ?></td>
            </tr>
            <?php endif; ?>
            <?php if(mysqli_num_rows(mysqli_query($conn, $sqlgetkodeakses))): ?>
            <tr>
                <td>Masa Sewa</td>
                <td>: <?php echo $tanggal_awal . " - " . $tanggal_akhir; ?></td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <h6>Related Products</h6>
    <hr>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php
    $sqlrelated = "SELECT buku_judul, pengarang_id, kategori_id, buku_cover FROM tb_buku WHERE kategori_id='$idkategoriforrelated'";
    require 'templates\related-products.php';
    require 'templates\footer.php';
?>