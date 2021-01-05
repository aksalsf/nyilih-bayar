<?php
    require 'templates\header.php';
    require 'modules\koneksi.php';

    $email = $_SESSION['email'];
    $sql="SELECT * FROM tb_penyewa WHERE penyewa_email='$email'";
    $result = mysqli_query($conn, $sql);
?>
<?php if (mysqli_num_rows($result) > 0):?>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<div class="container">
    <div class="row pt-5 pb-5">
        <div class="col-md-4">
            <img class="img-fluid" src="assets/img/avataaars.svg">
        </div>
        <div class="col-md-8">
            <h1 class="mb-3"><?php echo $row['penyewa_firstname']." ".$row['penyewa_lastname']; ?></h1>
            <table class="table table-borderless">
                <tr>
                    <td>Nomor Telepon</td>
                    <td>:
                        <?php 
                        echo $penyewa_telepon = $row['penyewa_telepon'];
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:
                        <?php 
                        echo $penyewa_email = $row['penyewa_email'];
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:
                        <a href="mailto:admin@nyilihbayar.id" class="badge badge-outline-primary">Lupa Password</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <h6>Buku Saya</h6>
    <hr>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php
    $penyewaid = $_SESSION['idpenyewa'];
    $sqlbukusaya = "SELECT buku_id FROM tb_transaksi WHERE penyewa_id='$penyewaid'";
    require 'templates\buku-saya.php';
    require 'templates\footer.php';
?>