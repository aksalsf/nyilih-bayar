<?php 

require '../db-conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $penyewa_id = $_POST['penyewa_id'];
    $penyewa_status = $_POST['penyewa_status'];
    $sql_update_status_penyewa = "UPDATE tb_penyewa SET penyewa_status = '$penyewa_status' WHERE penyewa_id = '$penyewa_id'";
    if (isset($_SESSION['update_penyewa_message'])) {
        unset($_SESSION['update_penyewa_message']);
    }
    if ($conn->query($sql_update_status_penyewa) === TRUE) {
        $_SESSION['update_penyewa_message'] = "Status Berhasil Diubah!";
    } else {
        $_SESSION['update_penyewa_message'] = "Error updating record: " . $conn->error;
    }
} 

header("Location: ../../penyewa.php");

?>