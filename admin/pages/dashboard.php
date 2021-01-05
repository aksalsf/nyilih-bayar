<!-- Main content -->
<div class="content pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Penghasilan</span>
                        <?php 
                            $sql_get_paket_id_from_transaksi = "SELECT paket_id FROM tb_transaksi WHERE transaksi_status = 1 OR transaksi_status = 2";
                            $result = mysqli_query($conn, $sql_get_paket_id_from_transaksi);
                            $total_penghasilan = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row_get_paket_id_from_transaksi = mysqli_fetch_assoc($result)) {
                                $paket_id = $row_get_paket_id_from_transaksi['paket_id'];
                                $sql_get_paket_harga = "SELECT paket_harga FROM tb_paket WHERE paket_id = '$paket_id'";
                                $paket_harga = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_paket_harga));
                                $total_penghasilan = $total_penghasilan + intval($paket_harga['paket_harga']);
                            }
                            }
                        ?>
                        <span class="info-box-number"><?php echo "Rp " . number_format($total_penghasilan,2,',','.'); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fa fa-shopping-bag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Transaksi Berhasil</span>
                        <span class="info-box-number">
                            <?php 
                                $sql_total_transaksi = "SELECT transaksi_id FROM tb_transaksi WHERE transaksi_status = 2";
                                $total_transaksi = mysqli_num_rows(mysqli_query($conn, $sql_total_transaksi));
                                echo $total_transaksi;
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-gradient-purple"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pengguna</span>
                        <span class="info-box-number">
                            <?php 
                                $sql_total_penyewa = "SELECT penyewa_id FROM tb_penyewa WHERE penyewa_status = 1";
                                $total_penyewa = mysqli_num_rows(mysqli_query($conn, $sql_total_penyewa));
                                echo $total_penyewa;
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-gradient-pink"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Buku</span>
                        <span class="info-box-number">
                            <?php 
                                $sql_total_buku = "SELECT buku_id FROM tb_buku";
                                $total_buku = mysqli_num_rows(mysqli_query($conn, $sql_total_buku));
                                echo $total_buku;
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php 
                            $sql_get_transaksi_number = "SELECT transaksi_id FROM tb_transaksi WHERE transaksi_status = 0";
                            $get_transaksi_number = mysqli_num_rows(mysqli_query($conn, $sql_get_transaksi_number));
                        ?>
                        <h3><?php echo $get_transaksi_number; ?></h3>
                        <p>Transaksi Baru</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="riwayat-transaksi.php" class="small-box-footer">Kelola <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <?php 
                            $sql_get_transaksi_number = "SELECT transaksi_id FROM tb_transaksi WHERE transaksi_status = 1";
                            $get_transaksi_number = mysqli_num_rows(mysqli_query($conn, $sql_get_transaksi_number));
                        ?>
                        <h3><?php echo $get_transaksi_number; ?></h3>
                        <p>Permintaan Kode Akses</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-key"></i>
                    </div>
                    <a href="kode-akses.php" class="small-box-footer">Kelola <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <?php 
                            $sql_get_penyewa_number = "SELECT penyewa_id FROM tb_penyewa WHERE penyewa_status = 0";
                            $get_penyewa_number = mysqli_num_rows(mysqli_query($conn, $sql_get_penyewa_number));
                        ?>
                        <h3><?php echo $get_penyewa_number; ?></h3>
                        <p>Pengguna Belum Terverifikasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="penyewa.php" class="small-box-footer">Kelola <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->