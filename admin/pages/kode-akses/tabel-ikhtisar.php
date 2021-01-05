<!-- Main content -->
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if(isset($_SESSION['akses_kode_message'])): ?>
                <div class="alert alert-default-danger">
                    <?php echo $_SESSION['akses_kode_message']; ?>
                </div>
                <?php 
                    if (isset($_SESSION['akses_kode_message'])) {
                        unset($_SESSION['akses_kode_message']);
                    }
                ?>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header d-flexs">
                        <h3 class="card-title">Kode Akses</h3>
                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#modalTambahData"><i class="fas fa-plus-square mr-2"></i>Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <!-- Menangkap data dari Tabel Kode Akses -->
                    <?php 
                        $sql_kode_akses = "SELECT * FROM tb_akses";
                        $result_kode_akses = $conn->query($sql_kode_akses);
                    ?>
                    <?php if($result_kode_akses->num_rows > 0): ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Kode Akses</th>
                                    <th>ID Penyewa</th>
                                    <th>ID Buku</th>
                                    <th>ID Transaksi</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data_kode_akses = $result_kode_akses->fetch_assoc()): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kode_akses["akses_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kode_akses["akses_kode"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kode_akses["penyewa_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kode_akses["buku_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kode_akses["transaksi_id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kode_akses["akses_tanggal_awal"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php echo $data_kode_akses["akses_tanggal_akhir"]; ?>
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
<?php  require 'modal-tambah-data.php' ?>