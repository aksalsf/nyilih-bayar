<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['paket_message'])) {
        unset($_SESSION['paket_message']);
    }
    require '../db-conn.php';
    $nama_paket = $_POST["nama_paket"];
    $durasi = $_POST["durasi"];
    $harga = $_POST["harga"];
    $paket_id = $_POST["paket_id"];
    // SQL
    $sql_ubah_paket = "UPDATE tb_paket SET paket_nama = '$nama_paket', paket_durasi = '$durasi', paket_harga = '$harga' WHERE paket_id = '$paket_id'";
    if (mysqli_query($conn, $sql_ubah_paket)) {
        $_SESSION['paket_message'] = "Paket berhasil diubah!";
    } else {
        $_SESSION['paket_message'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>