<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['buku_message'])) {
        unset($_SESSION['buku_message']);
    }
    require '../db-conn.php';
    $buku_id = $_POST["buku_id"];
    $buku_judul = $_POST["buku_judul"];
    $buku_isbn = $_POST["buku_isbn"];
    $kategori_id = $_POST["kategori_id"];
    $pengarang_id = $_POST["pengarang_id"];
    $penerbit_id = $_POST["penerbit_id"];
    $bahasa_id = $_POST["bahasa_id"];
    $buku_tahun_terbit = $_POST["buku_tahun_terbit"];
    $buku_sinopsis = $_POST["buku_sinopsis"];
    $buku_cover = $buku_isbn.".jpg";
    require 'upload-cover.php';
    // SQL
    $sql_ubah_buku = "UPDATE tb_buku SET buku_judul = '$buku_judul', buku_isbn = '$buku_isbn', kategori_id = '$kategori_id', pengarang_id = '$pengarang_id', penerbit_id = '$penerbit_id', bahasa_id = '$bahasa_id', buku_tahun_terbit = '$buku_tahun_terbit', buku_sinopsis = '$buku_sinopsis', buku_cover = '$buku_cover' WHERE buku_id = '$buku_id'";
    if (mysqli_query($conn, $sql_ubah_buku)) {
        $_SESSION['buku_message'] = "Detail buku berhasil diubah!";
    } else {
        $_SESSION['buku_message'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>