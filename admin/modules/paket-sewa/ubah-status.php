<?php 

require '../db-conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $paket_id = $_POST['paket_id'];
    $paket_status = $_POST['paket_status'];
    $sql_update_status_paket = "UPDATE tb_paket SET paket_status = '$paket_status' WHERE paket_id = '$paket_id'";
    if (isset($_SESSION['paket_message'])) {
        unset($_SESSION['paket_message']);
    }
    if ($conn->query($sql_update_status_paket) === TRUE) {
        $_SESSION['paket_message'] = "Status Paket Berhasil Diubah!";
    } else {
        $_SESSION['paket_message'] = "Error updating record: " . $conn->error;
    }
} 

header("Location: ../../paket-sewa.php");

?>