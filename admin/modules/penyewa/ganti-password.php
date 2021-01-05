<?php 

require '../db-conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $penyewa_id = $_POST['penyewa_id'];
    $penyewa_password = password_hash($_POST['penyewa_password'], PASSWORD_DEFAULT);
    $sql_update_password_penyewa = "UPDATE tb_penyewa SET penyewa_password = '$penyewa_password' WHERE penyewa_id = '$penyewa_id'";
    if (isset($_SESSION['update_penyewa_message'])) {
        unset($_SESSION['update_penyewa_message']);
    }
    if ($conn->query($sql_update_password_penyewa) === TRUE) {
        echo $_SESSION['update_penyewa_message'] = "Password Berhasil Diubah!";
    } else {
        echo $_SESSION['update_penyewa_message'] = "Error updating record: " . $conn->error;
    }
} 

header("Location: ../../penyewa.php");

?>