<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-gradient-warning">
                        <h3 class="card-title">Ubah Bahasa</h3>
                    </div>
                    <?php 
                        $bahasa_id = $_POST["bahasa_id"];
                        $sql_wtc_bahasa = "SELECT * FROM tb_bahasa WHERE bahasa_id = '$bahasa_id'";
                        $result_wtc_bahasa = $conn->query($sql_wtc_bahasa);
                        $data_wtc_bahasa = mysqli_fetch_assoc($result_wtc_bahasa);
                    ?>
                    <div class="card-body">
                        <form class="row" action="modules/bahasa/ubah-bahasa.php" method="post">
                            <div class="form-group col-11">
                                <label class="mr-3" for="nama_bahasa">Nama Bahasa</label>
                                <input type="text" name="nama_bahasa" class="form-control" value="<?php echo $data_wtc_bahasa["bahasa_nama"]?>" required>
                            </div>
                            <div class="form-group col-1 mt-auto">
                                <input type="hidden" name="bahasa_id" value="<?php echo $bahasa_id; ?>">
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
                <?php if(isset($_SESSION['bahasa_message'])): ?>
                <div class="alert alert-default-danger">
                    <?php echo $_SESSION['bahasa_message']; ?>
                </div>
                <?php 
                    if (isset($_SESSION['bahasa_message'])) {
                        unset($_SESSION['bahasa_message']);
                    }
                ?>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header d-flexs">
                        <h3 class="card-title">Data bahasa</h3>
                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#modalTambahData"><i class="fas fa-plus-square mr-2"></i>Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <!-- Menangkap data dari Tabel Data bahasa -->
                    <?php 
                        $sql_bahasa = "SELECT * FROM tb_bahasa";
                        $result_bahasa = $conn->query($sql_bahasa);
                    ?>
                    <?php if($result_bahasa->num_rows > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nama bahasa</th>
                                    <th width="160px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_bahasa = $result_bahasa->fetch_assoc()): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?php echo $data_bahasa["bahasa_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_bahasa["bahasa_nama"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            <input type="hidden" name="bahasa_id" value="<?php echo $data_bahasa["bahasa_id"]; ?>">
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