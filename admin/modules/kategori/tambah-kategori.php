<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['kategori_message'])) {
        unset($_SESSION['kategori_message']);
    }
    require '../db-conn.php';
    $nama_kategori = $_POST["nama_kategori"];
    // GET ID
    $get_the_year = date('y');
    $kategori_id_prefix = strtoupper("CAT").$get_the_year;
    $sql_get_kategori_id_prefix = "SELECT kategori_id FROM tb_kategori WHERE kategori_id LIKE '$kategori_id_prefix%' ";
    $kategori_id_index = sprintf( "%03d", (mysqli_num_rows(mysqli_query($conn, $sql_get_kategori_id_prefix)) + 1));
    $kategori_id = $kategori_id_prefix . $kategori_id_index;
    // SQL
    $sql_tambah_kategori = "INSERT INTO tb_kategori (kategori_id, kategori_nama) VALUES ('$kategori_id', '$nama_kategori')";
    if (mysqli_query($conn, $sql_tambah_kategori)) {
        $_SESSION['kategori_message'] = "Kategori berhasil ditambahkan!";
    } else {
        $_SESSION['kategori_message'] = "Error: " . $sql_tambah_kategori . "<br>" . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>