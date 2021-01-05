<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['bahasa_message'])) {
        unset($_SESSION['bahasa_message']);
    }
    require '../db-conn.php';
    $nama_bahasa = $_POST["nama_bahasa"];
    $bahasa_id = $_POST["bahasa_id"];
    // SQL
    $sql_ubah_bahasa = "UPDATE tb_bahasa SET bahasa_nama = '$nama_bahasa' WHERE bahasa_id = '$bahasa_id'";
    if (mysqli_query($conn, $sql_ubah_bahasa)) {
        $_SESSION['bahasa_message'] = "Detail bahasa berhasil diubah!";
    } else {
        $_SESSION['bahasa_message'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>