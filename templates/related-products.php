<?php
   
    $resultrelated = mysqli_query($conn, $sqlrelated);

?>
<?php if (mysqli_num_rows($resultrelated) > 0):?>
<div class="container mt-5 mb-5">
    <div class="row">
        <?php while($rowrelated = mysqli_fetch_assoc($resultrelated)): ?>
        <div class="col-md-2 mb-md-3">
            <a href="detail_buku.php?idbuku=<?php echo $rowrelated['buku_id']; ?>" >
                <figure class="figure text-center">
                    <img src="assets/img/books/<?php echo $rowrelated['buku_cover']; ?>" class="figure-img img-fluid rounded">
                    <h6 class="mt-2 book__list-title"><?php echo $rowrelated['buku_judul'] ?></h6>
                    <figcaption class="figure-caption">
                        <p class="book__list-author">
                        <?php 
                        $bukupengarangid = $rowrelated['pengarang_id'];
                        $sqlpengarang = "SELECT pengarang_nama FROM tb_pengarang WHERE pengarang_id='$bukupengarangid'";
                        $namapengarang = mysqli_fetch_assoc(mysqli_query($conn, $sqlpengarang));
                        ?>
                             <?php echo $namapengarang['pengarang_nama'];?>
                        </p>
                        <span class="book__list-category rounded">
                        <?php
                         $kategoriid = $rowrelated['kategori_id'];
                         $sqlkategori = "SELECT kategori_nama FROM tb_kategori WHERE kategori_id='$kategoriid'";
                         $namakategori = mysqli_fetch_assoc(mysqli_query($conn, $sqlkategori));
                        ?>
                            <?php echo $namakategori['kategori_nama']; ?>
                        </span>
                    </figcaption>
                </figure>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</div>
        <?php endif;?>
        