<!-- Modal -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Modal Title -->
                <h5 class="modal-title" id="modalTambahDataLabel">
                    Buku
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="modules/detail-buku/tambah-buku.php" method="post" enctype="multipart/form-data">
                <!-- Modal Content -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="buku_judul">Judul Buku</label>
                        <input type="text" name="buku_judul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="buku_isbn">ISBN</label>
                        <input type="text" name="buku_isbn" class="form-control" required maxlength="18">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" class="custom-select">
                            <?php 
                            $bukukategoriid = $row['kategori_id'];
                            $sql_tampilkan_kategori = "SELECT * FROM tb_kategori";
                            $result_tampilkan_kategori = mysqli_query($conn, $sql_tampilkan_kategori);
                        ?>
                            <?php while($row_tampilkan_kategori = mysqli_fetch_assoc($result_tampilkan_kategori)): ?>
                            <option required value="<?php echo $row_tampilkan_kategori['kategori_id'];?>">
                                <?php echo $row_tampilkan_kategori['kategori_nama'];?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pengarang_id">Pengarang</label>
                        <select name="pengarang_id" class="custom-select">
                            <?php 
                            $bukupengarangid = $row['pengarang_id'];
                            $sql_tampilkan_pengarang = "SELECT * FROM tb_pengarang";
                            $result_tampilkan_pengarang = mysqli_query($conn, $sql_tampilkan_pengarang);
                        ?>
                            <?php while($row_tampilkan_pengarang = mysqli_fetch_assoc($result_tampilkan_pengarang)): ?>
                            <option required value="<?php echo $row_tampilkan_pengarang['pengarang_id'];?>">
                                <?php echo $row_tampilkan_pengarang['pengarang_nama'];?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penerbit_id">Penerbit</label>
                        <select name="penerbit_id" class="custom-select">
                            <?php 
                            $bukupenerbitid = $row['penerbit_id'];
                            $sql_tampilkan_penerbit = "SELECT * FROM tb_penerbit";
                            $result_tampilkan_penerbit = mysqli_query($conn, $sql_tampilkan_penerbit);
                        ?>
                            <?php while($row_tampilkan_penerbit = mysqli_fetch_assoc($result_tampilkan_penerbit)): ?>
                            <option required value="<?php echo $row_tampilkan_penerbit['penerbit_id'];?>">
                                <?php echo $row_tampilkan_penerbit['penerbit_nama'];?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bahasa_id">Bahasa</label>
                        <select name="bahasa_id" class="custom-select">
                            <?php 
                            $bukubahasaid = $row['bahasa_id'];
                            $sql_tampilkan_bahasa = "SELECT * FROM tb_bahasa";
                            $result_tampilkan_bahasa = mysqli_query($conn, $sql_tampilkan_bahasa);
                        ?>
                            <?php while($row_tampilkan_bahasa = mysqli_fetch_assoc($result_tampilkan_bahasa)): ?>
                            <option required value="<?php echo $row_tampilkan_bahasa['bahasa_id'];?>">
                                <?php echo $row_tampilkan_bahasa['bahasa_nama'];?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="buku_tahun_terbit">Tahun Terbit</label>
                        <input required type="number" minlength="4" maxlength="4" min="1800" max="<?php echo date("Y"); ?>" class="form-control d-inline" name=" buku_tahun_terbit">
                    </div>
                    <div class="form-group">
                        <label for="buku_sinopsis">Sinopsis</label>
                        <textarea name="buku_sinopsis" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="buku_cover">Unggah Cover</label>
                        <input required type="file" name="buku_cover" accept=".jpg" class="form-control-file">
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>