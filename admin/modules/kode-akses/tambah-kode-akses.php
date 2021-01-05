<?php 

require '../db-conn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['akses_kode_message'])) {
        unset($_SESSION['akses_kode_message']);
    }
    // Generate the Akses Kode ID
    $get_the_year = date('y');
    $get_the_month = date('m');
    $akses_id_prefix = strtoupper("K" . $get_the_year . $get_the_month);
    $sql_get_akses_id_prefix = "SELECT akses_id FROM tb_akses WHERE akses_id LIKE '$akses_id_prefix%' ";
    $akses_id_index = sprintf( "%03d", (mysqli_num_rows(mysqli_query($conn, $sql_get_akses_id_prefix)) + 1));
    $akses_id = $akses_id_prefix . $akses_id_index;
    
    $transaksi_id = $_POST['transaksi_id'];
    $akses_kode = $_POST['akses_kode'];

    $sql_check_duplicate = "SELECT akses_kode FROM tb_akses";
    $result_check_duplicate = mysqli_query($conn, $sql_check_duplicate);

    if (mysqli_num_rows($result_check_duplicate) > 0) {
        while($data_check_duplicate = mysqli_fetch_assoc($result_check_duplicate)) {
            if ($data_check_duplicate['akses_kode'] == $akses_kode) {
                $_SESSION['akses_kode_message'] = "Kode Akses sudah ada!";
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit;
            }
        }
    }

    // Get Penyewa ID
    $sql_get_transaksi_penyewa_id = "SELECT penyewa_id from tb_transaksi WHERE transaksi_id = '$transaksi_id'";
    $data_penyewa_id = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_transaksi_penyewa_id));
    $transaksi_penyewa_id = $data_penyewa_id['penyewa_id'];

    // Get Buku ID
    $sql_get_transaksi_buku_id = "SELECT buku_id from tb_transaksi WHERE transaksi_id = '$transaksi_id'";
    $data_transaksi_buku_id = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_transaksi_buku_id));
    $transaksi_buku_id = $data_transaksi_buku_id['buku_id'];

    // Get Paket ID
    $sql_get_transaksi_paket_id = "SELECT paket_id from tb_transaksi WHERE transaksi_id = '$transaksi_id'";
    $data_transaksi_paket_id = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_transaksi_paket_id));
    $transaksi_paket_id = $data_transaksi_paket_id['paket_id'];
    
    // Generate Tanggal Awal dan Tanggal Akhir
    $sql_get_paket_durasi = "SELECT paket_durasi FROM tb_paket WHERE paket_id = '$transaksi_paket_id'";
    $data_paket_durasi = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_paket_durasi));
    $paket_durasi = $data_paket_durasi['paket_durasi'];
    $current_date = date_create(date("Y-m-d"));
    $starting_date = date_format($current_date, "Y-m-d");
    date_add($current_date,date_interval_create_from_date_string($paket_durasi." days"));
    $end_date = date_format($current_date, "Y-m-d");

    // Insert Data to Database
    $sql_insert_kode_akses = "INSERT INTO tb_akses (akses_id, akses_kode, penyewa_id, buku_id, transaksi_id, akses_tanggal_awal, akses_tanggal_akhir) VALUES ('$akses_id', '$akses_kode', '$transaksi_penyewa_id', '$transaksi_buku_id', '$transaksi_id', '$starting_date', '$end_date')";
    
    if (mysqli_query($conn, $sql_insert_kode_akses)) {
        $_SESSION['akses_kode_message'] = "Kode Akses berhasil ditambahkan!";
        $sql_update_status_transaksi = "UPDATE tb_transaksi SET transaksi_status = 2 WHERE transaksi_id = '$transaksi_id'";
        if (!mysqli_query($conn, $sql_update_status_transaksi)) {
            $_SESSION['akses_kode_message'] = "Error: " . $sql_update_status_transaksi . "<br>" . mysqli_error($conn);
        }
    } else {
        $_SESSION['akses_kode_message'] = "Error: " . $sql_insert_kode_akses . "<br>" . mysqli_error($conn);
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);

?>