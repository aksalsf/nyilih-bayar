<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['penerbit_message'])) {
        unset($_SESSION['penerbit_message']);
    }
    require '../db-conn.php';
    $nama_penerbit = $_POST["nama_penerbit"];
    $kota_penerbit = $_POST["kota_penerbit"];
    // GET ID
    $get_the_year = date('y');
    $penerbit_id_prefix = strtoupper("PUB").$get_the_year;
    $sql_get_penerbit_id_prefix = "SELECT penerbit_id FROM tb_penerbit WHERE penerbit_id LIKE '$penerbit_id_prefix%' ";
    $penerbit_id_index = sprintf( "%03d", (mysqli_num_rows(mysqli_query($conn, $sql_get_penerbit_id_prefix)) + 1));
    $penerbit_id = $penerbit_id_prefix . $penerbit_id_index;
    // SQL
    $sql_tambah_penerbit = "INSERT INTO tb_penerbit (penerbit_id, penerbit_nama, penerbit_kota) VALUES ('$penerbit_id', '$nama_penerbit', '$kota_penerbit')";
    if (mysqli_query($conn, $sql_tambah_penerbit)) {
        $_SESSION['penerbit_message'] = "Penerbit berhasil ditambahkan!";
    } else {
        $_SESSION['penerbit_message'] = "Error: " . $sql_tambah_penerbit . "<br>" . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>