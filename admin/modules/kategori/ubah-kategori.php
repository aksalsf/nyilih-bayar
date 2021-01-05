<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['kategori_message'])) {
        unset($_SESSION['kategori_message']);
    }
    require '../db-conn.php';
    $nama_kategori = $_POST["nama_kategori"];
    $kategori_id = $_POST["kategori_id"];
    // SQL
    $sql_ubah_kategori = "UPDATE tb_kategori SET kategori_nama = '$nama_kategori' WHERE kategori_id = '$kategori_id'";
    if (mysqli_query($conn, $sql_ubah_kategori)) {
        $_SESSION['kategori_message'] = "Detail kategori berhasil diubah!";
    } else {
        $_SESSION['kategori_message'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>