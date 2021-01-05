<?php 
    $idbuku= $_GET['showDetails'];
    $sql="SELECT * FROM tb_buku WHERE buku_id='$idbuku'";
    $result = mysqli_query($conn, $sql);
?>
<?php if (mysqli_num_rows($result) > 0):?>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<div class="row pt-5 pb-5">
    <div class="col-md-4">
        <img class="img-fluid" src="../assets/img/books/<?php echo $row['buku_cover']; ?>">
        <input required type="file" name="buku_cover" accept=".jpg" class="form-control-file">
    </div>
    <div class="col-md-8 my-auto">
        <input required type="text" class="form-control form-control-lg" value="<?php echo $row['buku_judul'] ?>" name="buku_judul">
        <table class="table table-borderless">
            <tr>
                <td>Pengarang</td>
                <td>
                    <select name="pengarang_id" class="custom-select">
                        <?php 
                            $bukupengarangid = $row['pengarang_id'];
                            $sql_tampilkan_pengarang = "SELECT * FROM tb_pengarang";
                            $result_tampilkan_pengarang = mysqli_query($conn, $sql_tampilkan_pengarang);
                        ?>
                        <?php while($row_tampilkan_pengarang = mysqli_fetch_assoc($result_tampilkan_pengarang)): ?>
                        <option required value="<?php echo $row_tampilkan_pengarang['pengarang_id'];?>" <?php echo ($row_tampilkan_pengarang['pengarang_id'] == $bukupengarangid) ? "selected" : ""; ?>>
                            <?php echo $row_tampilkan_pengarang['pengarang_nama'];?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Bahasa</td>
                <td>
                    <select name="bahasa_id" class="custom-select">
                        <?php 
                            $bukubahasaid = $row['bahasa_id'];
                            $sql_tampilkan_bahasa = "SELECT * FROM tb_bahasa";
                            $result_tampilkan_bahasa = mysqli_query($conn, $sql_tampilkan_bahasa);
                        ?>
                        <?php while($row_tampilkan_bahasa = mysqli_fetch_assoc($result_tampilkan_bahasa)): ?>
                        <option required value="<?php echo $row_tampilkan_bahasa['bahasa_id'];?>" <?php echo ($row_tampilkan_bahasa['bahasa_id'] == $bukubahasaid) ? "selected" : ""; ?>>
                            <?php echo $row_tampilkan_bahasa['bahasa_nama'];?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori_id" class="custom-select">
                        <?php 
                            $bukukategoriid = $row['kategori_id'];
                            $sql_tampilkan_kategori = "SELECT * FROM tb_kategori";
                            $result_tampilkan_kategori = mysqli_query($conn, $sql_tampilkan_kategori);
                        ?>
                        <?php while($row_tampilkan_kategori = mysqli_fetch_assoc($result_tampilkan_kategori)): ?>
                        <option required value="<?php echo $row_tampilkan_kategori['kategori_id'];?>" <?php echo ($row_tampilkan_kategori['kategori_id'] == $bukukategoriid) ? "selected" : ""; ?>>
                            <?php echo $row_tampilkan_kategori['kategori_nama'];?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td>
                    <input required type="text" class="form-control d-inline" value="<?php echo $row['buku_isbn'] ?>" name="buku_isbn" maxlength="18">
                </td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>
                    <select name="penerbit_id" class="custom-select">
                        <?php 
                            $bukupenerbitid = $row['penerbit_id'];
                            $sql_tampilkan_penerbit = "SELECT * FROM tb_penerbit";
                            $result_tampilkan_penerbit = mysqli_query($conn, $sql_tampilkan_penerbit);
                        ?>
                        <?php while($row_tampilkan_penerbit = mysqli_fetch_assoc($result_tampilkan_penerbit)): ?>
                        <option required value="<?php echo $row_tampilkan_penerbit['penerbit_id'];?>" <?php echo ($row_tampilkan_penerbit['penerbit_id'] == $bukupenerbitid) ? "selected" : ""; ?>>
                            <?php echo $row_tampilkan_penerbit['penerbit_nama'];?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td>
                    <input required type="number" minlength="4" maxlength="4" min="1800" max="<?php echo date("Y"); ?>" class="form-control d-inline" value="<?php echo $row['buku_tahun_terbit'] ?>" name="buku_tahun_terbit">
                </td>
            </tr>
        </table>
    </div>
</div>
<h6>Sinopsis</h6>
<hr>
<textarea required name="buku_sinopsis" cols="30" rows="10" class="form-control" value="<?php echo $row['buku_sinopsis']; ?>">
    <?php echo $row['buku_sinopsis']; ?>
</textarea>
<?php endwhile; ?>
<?php endif; ?>