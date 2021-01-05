<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-gradient-warning">
                        <h3 class="card-title">Ubah Pengarang</h3>
                    </div>
                    <?php 
                        $pengarang_id = $_POST["pengarang_id"];
                        $sql_wtc_pengarang = "SELECT * FROM tb_pengarang WHERE pengarang_id = '$pengarang_id'";
                        $result_wtc_pengarang = $conn->query($sql_wtc_pengarang);
                        $data_wtc_pengarang = mysqli_fetch_assoc($result_wtc_pengarang);
                    ?>
                    <div class="card-body">
                        <form class="row" action="modules/pengarang/ubah-pengarang.php" method="post">
                            <div class="form-group col-11">
                                <label class="mr-3" for="nama_pengarang">Nama pengarang</label>
                                <input type="text" name="nama_pengarang" class="form-control" value="<?php echo $data_wtc_pengarang["pengarang_nama"]?>" required>
                            </div>
                            <div class="form-group col-1 mt-auto">
                                <input type="hidden" name="pengarang_id" value="<?php echo $pengarang_id; ?>">
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
                <?php if(isset($_SESSION['pengarang_message'])): ?>
                <div class="alert alert-default-danger">
                    <?php echo $_SESSION['pengarang_message']; ?>
                </div>
                <?php 
                    if (isset($_SESSION['pengarang_message'])) {
                        unset($_SESSION['pengarang_message']);
                    }
                ?>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header d-flexs">
                        <h3 class="card-title">Data Pengarang</h3>
                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#modalTambahData"><i class="fas fa-plus-square mr-2"></i>Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <!-- Menangkap data dari Tabel Data Pengarang -->
                    <?php 
                        $sql_pengarang = "SELECT * FROM tb_pengarang";
                        $result_pengarang = $conn->query($sql_pengarang);
                    ?>
                    <?php if($result_pengarang->num_rows > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nama pengarang</th>
                                    <th width="160px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_pengarang = $result_pengarang->fetch_assoc()): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?php echo $data_pengarang["pengarang_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_pengarang["pengarang_nama"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            <input type="hidden" name="pengarang_id" value="<?php echo $data_pengarang["pengarang_id"]; ?>">
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