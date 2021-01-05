<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['pengarang_message'])) {
        unset($_SESSION['pengarang_message']);
    }
    require '../db-conn.php';
    $nama_pengarang = $_POST["nama_pengarang"];
    $pengarang_id = $_POST["pengarang_id"];
    // SQL
    $sql_ubah_pengarang = "UPDATE tb_pengarang SET pengarang_nama = '$nama_pengarang' WHERE pengarang_id = '$pengarang_id'";
    if (mysqli_query($conn, $sql_ubah_pengarang)) {
        $_SESSION['pengarang_message'] = "Detail pengarang berhasil diubah!";
    } else {
        $_SESSION['pengarang_message'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>