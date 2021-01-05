<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['paket_message'])) {
        unset($_SESSION['paket_message']);
    }
    require '../db-conn.php';
    $paket_id = $_POST["paket_id"];
    // SQL
    $sql_hapus_paket = "DELETE FROM tb_paket WHERE paket_id = '$paket_id'";
    if (mysqli_query($conn, $sql_hapus_paket)) {
        $_SESSION['paket_message'] = "Paket berhasil dihapus!";
    } else {
        $_SESSION['paket_message'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>