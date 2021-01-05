<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <?php if(isset($_GET['changePasswordByID'])): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-gradient-danger">
                        <h3 class="card-title">Ganti Password Penyewa</h3>
                    </div>
                    <div class="card-body">
                        <form action="modules/penyewa/ganti-password.php" method="post" class="form-inline">
                            <div class="form-group col-md-11">
                                <input type="hidden" name="penyewa_id" value="<?php echo $_GET['changePasswordByID']; ?>">
                                <input required type="text" class="form-control w-100" name="penyewa_password" value="<?php echo uniqid(); ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-outline-danger">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-12">
                <?php if(isset($_SESSION['update_penyewa_message'])): ?>
                <div class="alert alert-default-danger">
                    <?php echo $_SESSION['update_penyewa_message']; ?>
                </div>
                <?php 
                    if (isset($_SESSION['update_penyewa_message'])) {
                        unset($_SESSION['update_penyewa_message']);
                    }
                ?>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Penyewa</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php 
                        $penyewa_id = "";
                        $sql_select_penyewa = "SELECT * FROM tb_penyewa";
                        $result_select_penyewa = mysqli_query($conn, $sql_select_penyewa);
                    ?>
                    <?php if(mysqli_num_rows($result_select_penyewa) > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_select_penyewa = mysqli_fetch_assoc($result_select_penyewa)): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?php echo $penyewa_id = $data_select_penyewa['penyewa_id']; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_select_penyewa['penyewa_firstname'] . " " . $data_select_penyewa['penyewa_lastname']; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_select_penyewa['penyewa_email']; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_select_penyewa['penyewa_telepon']; ?>
                                    </td>
                                    <form action="modules/penyewa/verifikasi-status-penyewa.php" method="post">
                                        <td class="align-middle text-center">
                                            <?php $penyewa_status = $data_select_penyewa['penyewa_status']; ?>
                                            <div class="form-group">
                                                <select name="penyewa_status" class="custom-select">
                                                    <option value="0" <?php echo ($penyewa_status == 0 ? "selected" : ""); ?>>Belum Verifikasi</option>
                                                    <option value="1" <?php echo ($penyewa_status == 1 ? "selected" : ""); ?>>Terverifikasi</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="d-flex flex-column justify-content-around">
                                            <a href="../assets/img/ktp/<?php echo $data_select_penyewa['penyewa_ktp']; ?>" target="_blank" class="btn bg-gradient-teal mb-2">
                                                <i class="fa fa-eye"></i>
                                                Lihat KTP
                                            </a>
                                            <input type="hidden" name="penyewa_id" value="<?php echo $penyewa_id; ?>">
                                            <button class="btn btn-sm btn-outline-primary mb-2" type="submit" name="submit"><i class="fa fa-clipboard-check mr-2"></i>Verifikasi</button>
                                            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?changePasswordByID=" . $penyewa_id;?>" class="btn btn-sm btn-outline-danger" type="button"><i class="fas fa-key mr-2"></i>Ganti Password</a>
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