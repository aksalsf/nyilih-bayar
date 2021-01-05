<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['buku_message'])) {
        unset($_SESSION['buku_message']);
    }
    require '../db-conn.php';
    // GET ID
    $get_the_year = date('y');
    $get_the_month = date('m');
    $buku_id_prefix = strtoupper("B" . $get_the_year . $get_the_month);
    $sql_get_buku_id_prefix = "SELECT buku_id FROM tb_buku WHERE buku_id LIKE '$buku_id_prefix%' ";
    $buku_id_index = sprintf( "%03d", (mysqli_num_rows(mysqli_query($conn, $sql_get_buku_id_prefix)) + 1));
    $buku_id = $buku_id_prefix . $buku_id_index;

    // GET POST DATA
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
    $sql_tambah_buku = "INSERT INTO tb_buku (buku_id, buku_judul, buku_isbn, kategori_id, pengarang_id, penerbit_id, bahasa_id, buku_tahun_terbit, buku_sinopsis, buku_cover) VALUES ('$buku_id','$buku_judul','$buku_isbn','$kategori_id','$pengarang_id','$penerbit_id','$bahasa_id','$buku_tahun_terbit','$buku_sinopsis','$buku_cover')";
    if (mysqli_query($conn, $sql_tambah_buku)) {
        $_SESSION['buku_message'] = "Buku berhasil ditambahkan!";
    } else {
        $_SESSION['buku_message'] = "Error: " . $sql_tambah_buku . "<br>" . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>