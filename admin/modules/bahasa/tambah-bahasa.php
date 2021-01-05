<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['bahasa_message'])) {
        unset($_SESSION['bahasa_message']);
    }
    require '../db-conn.php';
    $nama_bahasa = $_POST["nama_bahasa"];
    // GET ID
    $bahasa_id_prefix = strtoupper("BLANG");
    $sql_get_bahasa_id_prefix = "SELECT bahasa_id FROM tb_bahasa WHERE bahasa_id LIKE '$bahasa_id_prefix%' ";
    $bahasa_id_index = sprintf( "%03d", (mysqli_num_rows(mysqli_query($conn, $sql_get_bahasa_id_prefix)) + 1));
    $bahasa_id = $bahasa_id_prefix . $bahasa_id_index;
    // SQL
    $sql_tambah_bahasa = "INSERT INTO tb_bahasa (bahasa_id, bahasa_nama) VALUES ('$bahasa_id', '$nama_bahasa')";
    if (mysqli_query($conn, $sql_tambah_bahasa)) {
        $_SESSION['bahasa_message'] = "Bahasa berhasil ditambahkan!";
    } else {
        $_SESSION['bahasa_message'] = "Error: " . $sql_tambah_bahasa . "<br>" . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>