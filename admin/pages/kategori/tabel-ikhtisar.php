<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-gradient-warning">
                        <h3 class="card-title">Ubah Kategori</h3>
                    </div>
                    <?php 
                        $kategori_id = $_POST["kategori_id"];
                        $sql_wtc_kategori = "SELECT * FROM tb_kategori WHERE kategori_id = '$kategori_id'";
                        $result_wtc_kategori = $conn->query($sql_wtc_kategori);
                        $data_wtc_kategori = mysqli_fetch_assoc($result_wtc_kategori);
                    ?>
                    <div class="card-body">
                        <form class="row" action="modules/kategori/ubah-kategori.php" method="post">
                            <div class="form-group col-11">
                                <label class="mr-3" for="nama_kategori">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" value="<?php echo $data_wtc_kategori["kategori_nama"]?>" required>
                            </div>
                            <div class="form-group col-1 mt-auto">
                                <input type="hidden" name="kategori_id" value="<?php echo $kategori_id; ?>">
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
                <?php if(isset($_SESSION['kategori_message'])): ?>
                <div class="alert alert-default-danger">
                    <?php echo $_SESSION['kategori_message']; ?>
                </div>
                <?php 
                    if (isset($_SESSION['kategori_message'])) {
                        unset($_SESSION['kategori_message']);
                    }
                ?>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header d-flexs">
                        <h3 class="card-title">Data kategori</h3>
                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#modalTambahData"><i class="fas fa-plus-square mr-2"></i>Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <!-- Menangkap data dari Tabel Data kategori -->
                    <?php 
                        $sql_kategori = "SELECT * FROM tb_kategori";
                        $result_kategori = $conn->query($sql_kategori);
                    ?>
                    <?php if($result_kategori->num_rows > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
                                    <th width="160px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_kategori = $result_kategori->fetch_assoc()): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kategori["kategori_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kategori["kategori_nama"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            <input type="hidden" name="kategori_id" value="<?php echo $data_kategori["kategori_id"]; ?>">
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