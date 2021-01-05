<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <?php if(isset($_SESSION['buku_message'])): ?>
        <div class="alert alert-default-danger">
            <?php echo $_SESSION['buku_message']; ?>
        </div>
        <?php 
            if (isset($_SESSION['buku_message'])) {
                unset($_SESSION['buku_message']);
            }
        ?>
        <?php endif; ?>
        <div class="row">
            <?php if(isset($_GET['showDetails'])): ?>
            <div class="col-12">
                <form action="modules/detail-buku/ubah-buku.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Buku</h3>
                            <input type="hidden" name="buku_id" value="<?php echo $_GET['showDetails'];?>">
                            <button class="btn btn-primary float-right" type="submit"><i class="fas fa-save mr-2"></i>Simpan</button>
                        </div>
                        <div class="card-body">
                            <?php require 'detail-buku.php'; ?>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif; ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flexs">
                        <h3 class="card-title">Data buku</h3>
                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#modalTambahData"><i class="fas fa-plus-square mr-2"></i>Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <!-- Menangkap data dari Tabel Data buku -->
                    <?php 
                        $sql_buku = "SELECT * FROM tb_buku";
                        $result_buku = $conn->query($sql_buku);
                    ?>
                    <?php if($result_buku->num_rows > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Judul Buku</th>
                                    <th width="160px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_buku = $result_buku->fetch_assoc()): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?php echo $data_buku["buku_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_buku["buku_judul"]; ?>
                                    </td>
                                    <td class="align-middle text-center d-flex flex-column">
                                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?showDetails=<?php echo $data_buku["buku_id"]; ?>" class="btn btn-info w-100 mb-2"><i class="fa fa-eye mr-2"></i>Lihat Detail</a>
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