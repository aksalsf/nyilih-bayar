<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['pengarang_message'])) {
        unset($_SESSION['pengarang_message']);
    }
    require '../db-conn.php';
    $nama_pengarang = $_POST["nama_pengarang"];
    // GET ID
    $pengarang_id_prefix = strtoupper("AUTH");
    $sql_get_pengarang_id_prefix = "SELECT pengarang_id FROM tb_pengarang WHERE pengarang_id LIKE '$pengarang_id_prefix%' ";
    $pengarang_id_index = sprintf( "%04d", (mysqli_num_rows(mysqli_query($conn, $sql_get_pengarang_id_prefix)) + 1));
    $pengarang_id = $pengarang_id_prefix . $pengarang_id_index;
    // SQL
    $sql_tambah_pengarang = "INSERT INTO tb_pengarang (pengarang_id, pengarang_nama) VALUES ('$pengarang_id', '$nama_pengarang')";
    if (mysqli_query($conn, $sql_tambah_pengarang)) {
        $_SESSION['pengarang_message'] = "Pengarang berhasil ditambahkan!";
    } else {
        $_SESSION['pengarang_message'] = "Error: " . $sql_tambah_pengarang . "<br>" . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>