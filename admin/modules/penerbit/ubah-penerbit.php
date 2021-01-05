<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['penerbit_message'])) {
        unset($_SESSION['penerbit_message']);
    }
    require '../db-conn.php';
    $nama_penerbit = $_POST["nama_penerbit"];
    $penerbit_id = $_POST["penerbit_id"];
    $penerbit_kota = $_POST["penerbit_kota"];
    // SQL
    $sql_ubah_penerbit = "UPDATE tb_penerbit SET penerbit_nama = '$nama_penerbit', penerbit_kota = '$penerbit_kota' WHERE penerbit_id = '$penerbit_id'";
    if (mysqli_query($conn, $sql_ubah_penerbit)) {
        $_SESSION['penerbit_message'] = "Detail penerbit berhasil diubah!";
    } else {
        $_SESSION['penerbit_message'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>