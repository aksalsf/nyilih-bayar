<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "nyilih_bayar";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

?>

<!-- Check Connection -->
<?php if(!$conn): ?>
<div class="alert alert-danger m-5 pb-5">
    <?php echo die("Connection failed: " . mysqli_connect_error()); ?>
</div>
<?php else: ?>
<?php session_start(); ?>
<?php endif; ?>