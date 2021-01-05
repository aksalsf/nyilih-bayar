<?php 

    require 'function.php';
    if (isset($_POST["daftar"])) {
        if (registrasi($_POST) > 0) {
            echo "<script>
                alert('user baru berhasil ditambahkan');
            </script>";
            header("Location:../login/member/index.php");
        } else {
            echo mysqli_error($conn);
        }

    }
 ?>

<!DOCTYPE html>
<html lang="en">

<?php include("head.php") ?>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="">
                    <span class="login100-form-title">
                        Daftar Akun
                    </span>

                    <table class="rtable">
                        <td>
                            <div class="wrap-input100 validate-input" required>
                                <input class="input100" type="text" name="depan" placeholder="Nama Depan" required>
                                <span class="focus-input100"></span>
                            </div>
                        </td>
                        <td style="color: white;">a</td>
                        <td>
                            <div class="wrap-input100 validate-input" required>
                                <input class="input100" type="text" name="belakang" placeholder="Nama Belakang" required>
                                <span class="focus-input100"></span>
                            </div>
                        </td>
                    </table>

                    <div class="wrap-input100" required>
                        <input class="input100" type="email" name="email" placeholder="email" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100" required>
                        <input class="input100" type="password" name="pass" placeholder="Password" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="tel" name="telp" placeholder="No. Telp" required maxlength="13">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100 " type="file" name="ktp" placeholder="Gambar KTP" accept=".jpg" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="daftar">
                            Daftar
                        </button>
                    </div><br><br>
                </form>

                <div class="login100-pic js-tilt" data-tilt>
                    <br><br><img src="images/book.jpg" alt="IMG" height="385" width="1000" style="padding-bottom: 40px">
                </div>
            </div>
        </div>
    </div>


    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <script src="js/main.js"></script>
</body>

</html>