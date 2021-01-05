<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if(isset($_SESSION['update_status_transaksi_message'])): ?>
                <div class="alert alert-default-danger">
                    <?php echo $_SESSION['update_status_transaksi_message']; ?>
                </div>
                <?php 
                    if (isset($_SESSION['update_status_transaksi_message'])) {
                        unset($_SESSION['update_status_transaksi_message']);
                    }
                ?>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Riwayat Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php 
                        $sql_select_transaksi = "SELECT * FROM tb_transaksi";
                        $result_select_transaksi = mysqli_query($conn, $sql_select_transaksi);
                        require 'modules/readable_date.php';
                    ?>
                    <?php if(mysqli_num_rows($result_select_transaksi) > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="160px">Tanggal</th>
                                    <th width="160px">Nama Pelanggan</th>
                                    <th>Pilihan Sewa</th>
                                    <th width="240px">Judul Buku</th>
                                    <th width="240px">Status</th>
                                    <th width="160px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_select_transaksi = mysqli_fetch_assoc($result_select_transaksi)): ?>
                                <tr>
                                    <td class="align-middle">
                                        <?php echo $transaksi_id = $data_select_transaksi['transaksi_id']; ?>
                                    </td>
                                    <td class="align-middle">
                                        <!-- 
                                        date('M j Y g:i A', strtotime('2010-05-29 01:17:35'))
                                     -->
                                        <?php 
                                            $transaksi_timestamp = $data_select_transaksi['transaksi_timestamp']; 
                                            echo readable_date(date('Y-m-d', strtotime($transaksi_timestamp)));
                                        ?>
                                    </td>
                                    <!-- Mengambil data nama penyewa dari tabel penyewa dengan ID Penyewa di tabel Transaksi -->
                                    <?php 
                                        $transaksi_penyewa_id = $data_select_transaksi['penyewa_id'];
                                        $sql_select_penyewa = "SELECT penyewa_firstname, penyewa_lastname FROM tb_penyewa WHERE penyewa_id = '$transaksi_penyewa_id'";
                                        $result_select_penyewa = mysqli_query($conn, $sql_select_penyewa);
                                    ?>
                                    <?php if(mysqli_num_rows($result_select_penyewa) > 0): ?>
                                    <?php while($data_select_penyewa = mysqli_fetch_assoc($result_select_penyewa)): ?>
                                    <td class="align-middle"><?php echo $data_select_penyewa["penyewa_firstname"] . " " . $data_select_penyewa["penyewa_lastname"]; ?></td>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                    <!-- END -->

                                    <!-- Mengambil data nama paket dari tabel paket dengan ID paket di tabel Transaksi -->
                                    <?php 
                                        $transaksi_paket_id = $data_select_transaksi['paket_id'];
                                        $sql_select_paket = "SELECT paket_nama FROM tb_paket WHERE paket_id = '$transaksi_paket_id'";
                                        $result_select_paket = mysqli_query($conn, $sql_select_paket);
                                    ?>
                                    <?php if(mysqli_num_rows($result_select_paket) > 0): ?>
                                    <?php while($data_select_paket = mysqli_fetch_assoc($result_select_paket)): ?>
                                    <td class="align-middle"><?php echo $data_select_paket["paket_nama"]; ?></td>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                    <!-- END -->

                                    <!-- Mengambil data nama buku dari tabel buku dengan ID buku di tabel Transaksi -->
                                    <?php 
                                        $transaksi_buku_id = $data_select_transaksi['buku_id'];
                                        $sql_select_buku = "SELECT buku_judul FROM tb_buku WHERE buku_id = '$transaksi_buku_id'";
                                        $result_select_buku = mysqli_query($conn, $sql_select_buku);
                                    ?>
                                    <?php if(mysqli_num_rows($result_select_buku) > 0): ?>
                                    <?php while($data_select_buku = mysqli_fetch_assoc($result_select_buku)): ?>
                                    <td class="align-middle"><?php echo $data_select_buku["buku_judul"]; ?></td>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                    <!-- END -->

                                    <!-- Status Pembayaran -->
                                    <?php 
                                        $transaksi_status = $data_select_transaksi['transaksi_status'];
                                    ?>
                                    <form action="modules/riwayat-transaksi/verifikasi-transaksi.php" method="post">
                                        <td class="align-middle">
                                            <div class="form-group">
                                                <?php if($transaksi_status == 2): ?>
                                                <span class="badge badge-success">
                                                    Transaksi Selesai
                                                </span>
                                                <?php else: ?>
                                                <select name="transaksi_status" class="custom-select">
                                                    <option value="0" <?php echo ($transaksi_status == 0 ? "selected" : ""); ?>>Belum Bayar</option>
                                                    <option value="1" <?php echo ($transaksi_status == 1 ? "selected" : ""); ?>>Sudah Bayar</option>
                                                </select>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <!-- END -->
                                        <td class="align-middle">
                                            <input type="hidden" name="transaksi_id" value="<?php echo $transaksi_id; ?>">
                                            <button <?php echo ($transaksi_status == 2) ? "disabled" : ""; ?> class="btn btn-sm btn-outline-primary" type="submit" name="submit" onclick="return confirm('Apakah Anda yakin ingin mengubah status transaksi?')"><i class="fas fa-clipboard-check mr-2"></i>Verifikasi</button>
                                        </td>
                                    </form>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <?php endif; ?>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->