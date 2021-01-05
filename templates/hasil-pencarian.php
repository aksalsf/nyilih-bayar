<?php
    require 'modules/koneksi.php';
    $sql= "SELECT tb_buku.buku_judul, tb_pengarang.pengarang_nama, tb_kategori.kategori_nama, tb_buku.buku_cover FROM tb_buku NATURAL JOIN tb_kategori NATURAL JOIN tb_pengarang NATURAL JOIN tb_penerbit WHERE tb_buku.buku_judul LIKE '%$querry%' OR tb_kategori.kategori_nama LIKE '%$querry%' OR tb_pengarang.pengarang_nama LIKE '%$querry%' OR tb_penerbit.penerbit_nama LIKE '%$querry%' OR tb_buku.buku_sinopsis LIKE '%$querry%'";
    $result = mysqli_query($conn, $sql);

?>
<?php if (mysqli_num_rows($result) > 0):?>
<div class="container mt-5 mb-5">
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="col-md-2 mb-md-3">
            <a href="detail_buku.php?idbuku=<?php echo $row['buku_id']; ?>">
                <figure class="figure text-center">
                    <img src="assets/img/books/<?php echo $row['buku_cover']; ?>" class="figure-img img-fluid rounded">
                    <h6 class="mt-2 book__list-title"><?php echo $row['buku_judul'] ?></h6>
                    <figcaption class="figure-caption">
                        <p class="book__list-author">

                            <?php echo $row['pengarang_nama'];?>
                        </p>
                        <span class="book__list-category rounded">

                            <?php echo $row['kategori_nama']; ?>
                        </span>
                    </figcaption>
                </figure>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif;?>