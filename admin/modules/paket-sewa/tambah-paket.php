<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['paket_message'])) {
        unset($_SESSION['paket_message']);
    }
    require '../db-conn.php';
    $nama_paket = $_POST["nama_paket"];
    $durasi = $_POST["durasi"];
    $harga = $_POST["harga"];
    // GET ID
    $paket_id_prefix = strtoupper("PK");
    $sql_get_paket_id_prefix = "SELECT paket_id FROM tb_paket WHERE paket_id LIKE '$paket_id_prefix%' ";
    $paket_id_index = sprintf( "%02d", (mysqli_num_rows(mysqli_query($conn, $sql_get_paket_id_prefix)) + 1));
    $paket_id = $paket_id_prefix . $paket_id_index;
    // SQL
    $sql_tambah_paket = "INSERT INTO tb_paket (paket_id, paket_nama, paket_durasi, paket_harga) VALUES ('$paket_id', '$nama_paket', '$durasi', '$harga')";
    if (mysqli_query($conn, $sql_tambah_paket)) {
        $_SESSION['paket_message'] = "Paket berhasil ditambahkan!";
    } else {
        $_SESSION['paket_message'] = "Error: " . $sql_tambah_paket . "<br>" . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>