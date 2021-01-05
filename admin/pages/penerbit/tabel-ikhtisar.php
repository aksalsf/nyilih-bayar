<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-gradient-warning">
                        <h3 class="card-title text-capitalize">Ubah penerbit</h3>
                    </div>
                    <?php 
                        $penerbit_id = $_POST["penerbit_id"];
                        $sql_wtc_penerbit = "SELECT * FROM tb_penerbit WHERE penerbit_id = '$penerbit_id'";
                        $result_wtc_penerbit = $conn->query($sql_wtc_penerbit);
                        $data_wtc_penerbit = mysqli_fetch_assoc($result_wtc_penerbit);
                    ?>
                    <div class="card-body">
                        <form class="row" action="modules/penerbit/ubah-penerbit.php" method="post">
                            <div class="form-group col-11">
                                <label class="mr-3" for="nama_penerbit" class="text-capitalize">Nama penerbit</label>
                                <input type="text" name="nama_penerbit" class="form-control" value="<?php echo $data_wtc_penerbit["penerbit_nama"]?>" required>
                            </div>
                            <div class="form-group col-11">
                                <label class="mr-3" for="penerbit_kota" class="text-capitalize">Kota Penerbit</label>
                                <input type="text" name="penerbit_kota" class="form-control" value="<?php echo $data_wtc_penerbit["penerbit_kota"]?>" required>
                            </div>
                            <div class="form-group col-1 mt-auto">
                                <input type="hidden" name="penerbit_id" value="<?php echo $penerbit_id; ?>">
                                <button type="submit" class="btn btn-outline-warning">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-12">
                <?php if(isset($_SESSION['penerbit_message'])): ?>
                <div class="alert alert-default-danger">
                    <?php echo $_SESSION['penerbit_message']; ?>
                </div>
                <?php 
                    if (isset($_SESSION['penerbit_message'])) {
                        unset($_SESSION['penerbit_message']);
                    }
                ?>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header d-flexs">
                        <h3 class="card-title">Data penerbit</h3>
                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#modalTambahData"><i class="fas fa-plus-square mr-2"></i>Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <!-- Menangkap data dari Tabel Data penerbit -->
                    <?php 
                        $sql_penerbit = "SELECT * FROM tb_penerbit";
                        $result_penerbit = $conn->query($sql_penerbit);
                    ?>
                    <?php if($result_penerbit->num_rows > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nama Penerbit</th>
                                    <th>Kota Penerbit</th>
                                    <th width="160px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_penerbit = $result_penerbit->fetch_assoc()): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?php echo $data_penerbit["penerbit_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_penerbit["penerbit_nama"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_penerbit["penerbit_kota"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            <input type="hidden" name="penerbit_id" value="<?php echo $data_penerbit["penerbit_id"]; ?>">
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