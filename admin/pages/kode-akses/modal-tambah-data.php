<!-- Modal -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Modal Title -->
                <h5 class="modal-title" id="modalTambahDataLabel">
                    Kode Akses
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="modules/kode-akses/tambah-kode-akses.php" method="post">
                <!-- Modal Content -->
                <div class="modal-body">
                    <!-- Kode Akses -->
                    <?php 
                        function secure_random_string($length) {
                            $random_string = '';
                            for($i = 0; $i < $length; $i++) {
                                $number = random_int(0, 36);
                                $character = base_convert($number, 10, 36);
                                $random_string .= $character;
                            }
                        
                            return $random_string;
                        }
                        $akses_kode = strtoupper(secure_random_string(8));
                    ?>
                    <div class="form-group">
                        <label for="akses_kode">Kode Akses</label>
                        <input type="text" name="akses_kode" class="form-control" value="<?php echo $akses_kode; ?>" pattern="[a-zA-Z0-9]{8}" minlength="8" maxlength="8">
                    </div>
                    <!-- Menangkap data dari Tabel Transaksi -->
                    <?php 
                        $sql_transaksi = "SELECT transaksi_id, penyewa_id FROM tb_transaksi WHERE transaksi_status = 1";
                        $result_transaksi = $conn->query($sql_transaksi);
                    ?>
                    <?php if($result_transaksi->num_rows > 0): ?>
                    <div class="form-group">
                        <label for="transaksi_id">ID Transaksi</label>
                        <select name="transaksi_id" class="custom-select">
                            <?php while($data_transaksi = $result_transaksi->fetch_assoc()): ?>
                            <!-- Mendapatkan ID dan nama penyewa yang ID-nya terdapat pada tabel transaksi -->
                            <?php 
                                $transaksi_id = $data_transaksi['transaksi_id'];
                                $transaksi_penyewa_id = $data_transaksi['penyewa_id'];
                                $sql_penyewa = "SELECT penyewa_id, penyewa_firstname, penyewa_lastname FROM tb_penyewa WHERE penyewa_id = '$transaksi_penyewa_id' AND penyewa_status = 1";
                                $result_penyewa = $conn->query($sql_penyewa);
                            ?>
                            <?php if($result_penyewa->num_rows > 0): ?>
                            <?php while($data_penyewa = $result_penyewa->fetch_assoc()): ?>
                            <option value="<?php echo $transaksi_id; ?>"><?php echo $transaksi_id . " (".$data_penyewa['penyewa_firstname']." ".$data_penyewa['penyewa_lastname'].")"; ?></option>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>