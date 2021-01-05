<?php 

require '../db-conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $transaksi_id = $_POST['transaksi_id'];
    $transaksi_status = $_POST['transaksi_status'];
    $sql_update_status_transaksi = "UPDATE tb_transaksi SET transaksi_status = '$transaksi_status' WHERE transaksi_id = '$transaksi_id'";
    session_start();
    if (isset($_SESSION['update_status_transaksi_message'])) {
        unset($_SESSION['update_status_transaksi_message']);
    }
    if ($conn->query($sql_update_status_transaksi) === TRUE) {
        $_SESSION['update_status_transaksi_message'] = "Status Berhasil Diubah!";
    } else {
        $_SESSION['update_status_transaksi_message'] = "Error updating record: " . $conn->error;
    }
} 

header("Location: ../../riwayat-transaksi.php");

?>