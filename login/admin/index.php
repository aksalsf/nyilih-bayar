<?php 
    require 'conn.php';

        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_email = '$email'");

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row["admin_password"])) {
                    $_SESSION['admin'] = true;
                    $_SESSION['admin_username'] = $row["admin_username"];
                    header("Location:../../admin/index.php");
                     exit;
                 } 
            } 

            $error = true;
            if (isset($error)) {
                echo "<script>
                    alert('password atau email yang anda masukkan salah, silakan mengisi kembali');
                </script>";
            }
        }
 ?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php");?>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/admin.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="" method="post">
                    <span class="login100-form-title">
                        Admin Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="login">
                            Login
                        </button>
                    </div><br><br>
                </form>
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