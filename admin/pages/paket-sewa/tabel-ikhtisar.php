<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-gradient-warning">
                        <h3 class="card-title">Ubah Paket</h3>
                    </div>
                    <?php 
                        $paket_id = $_POST["paket_id"];
                        $sql_wtc_paket_sewa = "SELECT * FROM tb_paket WHERE paket_id = '$paket_id'";
                        $result_wtc_paket_sewa = $conn->query($sql_wtc_paket_sewa);
                        $data_wtc_paket_sewa = mysqli_fetch_assoc($result_wtc_paket_sewa);
                    ?>
                    <div class="card-body">
                        <form class="row" action="modules/paket-sewa/ubah-paket.php" method="post">
                            <div class="form-group col-4">
                                <label class="mr-3" for="nama_paket">Nama Paket</label>
                                <input type="text" name="nama_paket" class="form-control" value="<?php echo $data_wtc_paket_sewa["paket_nama"]?>" required>
                            </div>
                            <div class="form-group col-4">
                                <label class="mr-3" for="durasi">Durasi</label>
                                <input type="number" name="durasi" min="1" required placeholder="Durasi (Hari)" class="form-control" value="<?php echo $data_wtc_paket_sewa["paket_durasi"]?>">
                            </div>
                            <div class="form-group col-4">
                                <label class="mr-3" for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?php echo $data_wtc_paket_sewa["paket_harga"]?>" min="1000" step="500" required placeholder="Harga (Rupiah)">
                            </div>
                            <input type="hidden" name="paket_id" value="<?php echo $paket_id; ?>">
                            <button type="submit" class="btn btn-outline-warning col-1 offset-11">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-12">
                <?php if(isset($_SESSION['paket_message'])): ?>
                <div class="alert alert-default-danger">
                    <?php echo $_SESSION['paket_message']; ?>
                </div>
                <?php 
                    if (isset($_SESSION['paket_message'])) {
                        unset($_SESSION['paket_message']);
                    }
                ?>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header d-flexs">
                        <h3 class="card-title">Paket Sewa</h3>
                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#modalTambahData"><i class="fas fa-plus-square mr-2"></i>Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <!-- Menangkap data dari Tabel Paket Sewa -->
                    <?php 
                        $sql_paket_sewa = "SELECT * FROM tb_paket";
                        $result_paket_sewa = $conn->query($sql_paket_sewa);
                    ?>
                    <?php if($result_paket_sewa->num_rows > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nama Paket</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th width="120px">Status Paket</th>
                                    <th width="160px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_paket_sewa = $result_paket_sewa->fetch_assoc()): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?php echo $data_paket_sewa["paket_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_paket_sewa["paket_nama"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_paket_sewa["paket_durasi"] . " Hari"; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php 
                                        echo "Rp " . number_format($data_paket_sewa["paket_harga"],2,',','.'); 
                                        ?>
                                    </td>
                                    <form action="modules/paket-sewa/ubah-status.php" method="POST">
                                        <td>
                                            <?php $paket_status = $data_paket_sewa['paket_status']; ?>
                                            <div class="form-group">
                                                <select name="paket_status" class="custom-select">
                                                    <option value="0" <?php echo ($paket_status == 0 ? "selected" : ""); ?>>Tidak Aktif</option>
                                                    <option value="1" <?php echo ($paket_status == 1 ? "selected" : ""); ?>>Aktif</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="d-flex flex-column">
                                            <input type="hidden" name="paket_id" value="<?php echo $data_paket_sewa["paket_id"]; ?>">
                                            <button class="btn btn-sm btn-outline-primary mb-2 w-100" type="submit" name="submit">
                                                <i class="fa fa-clipboard-check mr-2"></i>
                                                Ubah Status
                                            </button>
                                    </form>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                        <input type="hidden" name="paket_id" value="<?php echo $data_paket_sewa["paket_id"]; ?>">
                                        <button class="btn btn-sm btn-outline-warning mb-2 w-100" type="submit" name="submit">
                                            <i class="fa fa-edit mr-2"></i>
                                            Ubah Detail
                                        </button>
                                    </form>
                                    </td>
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
<?php require 'modal-tambah-data.php' ?>