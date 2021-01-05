<?php if (isset($_GET['idbuku'])):?>
<?php if ($_GET['idbuku'] != ""):?>
<?php
    require 'templates\header.php';
    require 'modules\koneksi.php';

    $idbuku= $_GET['idbuku'];
    $sql="SELECT * FROM tb_buku WHERE buku_id='$idbuku'";
    $result = mysqli_query($conn, $sql);
    $idkategoriforrelated = "";
    $idpaket = "";
?>
<?php if (mysqli_num_rows($result) > 0):?>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<div class="container">
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
                <!-- Cek apakah user sudah pernah memesan -->
                <?php if(isset($_SESSION['idpenyewa'])): ?>
                <?php 
                    $get_id_penyewa = $_SESSION['idpenyewa'];
                    $sql_cek_transaksi = "SELECT transaksi_id, transaksi_status FROM tb_transaksi WHERE buku_id = '$idbuku' AND penyewa_id = '$get_id_penyewa' AND (transaksi_status = 0 OR transaksi_status = 2)";
                    $get_transaksi = mysqli_fetch_assoc(mysqli_query($conn, $sql_cek_transaksi));                     
                ?>
                <?php if(mysqli_num_rows(mysqli_query($conn, $sql_cek_transaksi)) <= 0 ): ?>
                <tr>
                    <td>Pilihan Paket</td>
                    <td>
                        <?php 
                    $sqlpaket = "SELECT * FROM tb_paket WHERE paket_status = 1";
                    $resultpaket = mysqli_query($conn, $sqlpaket);
                    ?>
                        <select class="form-control" aria-label="Default select example">
                            <?php while($rowpaket = mysqli_fetch_assoc($resultpaket)): ?>
                            <option value="<?php echo $idpaket= $rowpaket['paket_id']; ?>"><?php echo $rowpaket['paket_nama']; ?> (<?php echo "Rp " . number_format($rowpaket['paket_harga'],2,',','.'); ?> - <?php echo $rowpaket['paket_durasi']; ?> Hari)</option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endif; ?>
            </table>
            <?php if(isset($_SESSION['idpenyewa'])): ?>
            <?php if(mysqli_num_rows(mysqli_query($conn, $sql_cek_transaksi)) > 0 ): ?>
            <form action="detail_transaksi.php" method="POST" class="float-right">
                <input type="hidden" name="transaksi_id" value="<?php echo $get_transaksi['transaksi_id']; ?>">
                <button type="submit" class="btn-primary btn">Lihat Detail Transaksi</button>
            </form>
            <?php else: ?>
            <form action="modules/sewa.php" method="POST" class="float-right">
                <input type="hidden" name="idpenyewa" value="<?php echo $_SESSION['idpenyewa']?>">
                <input type="hidden" name="idbuku" value="<?php echo $idbuku; ?>">
                <input type="hidden" name="idpaket" value="<?php echo $idpaket; ?>">
                <button type="submit" class="btn-primary btn">Sewa</button>
            </form>
            <?php endif; ?>
            <?php else: ?>
            <div class="alert alert-danger">Silakan login untuk menyewa buku! atau <a href="pendaftaran/index.php" class="alert-link">daftar di sini.</a></div>
            <?php endif; ?>
        </div>
    </div>
    <h6>Sinopsis</h6>
    <hr>
    <p class="mb-8"><?php echo $row['buku_sinopsis']; ?></p>
    <h6>Related Products</h6>
    <hr>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php
    $sqlrelated = "SELECT buku_id, buku_judul, pengarang_id, kategori_id, buku_cover FROM tb_buku WHERE kategori_id='$idkategoriforrelated'";
    require 'templates\related-products.php';
    require 'templates\footer.php';
?>
<?php 
else: 
    header('Location:index.php '); 
endif; ?>
<?php 
else: 
    header('Location:index.php '); 
endif; ?>