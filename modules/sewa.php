<?php
    require 'login-check.php';
    require 'koneksi.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $get_the_year = date('y');
        $get_the_month = date('m');
        $transaksi_id_prefix = strtoupper("T" . $get_the_year . $get_the_month);
        $sql_get_transaksi_id_prefix = "SELECT transaksi_id FROM tb_transaksi WHERE transaksi_id LIKE '$transaksi_id_prefix%' ";
        $transaksi_id_index = sprintf( "%03d", (mysqli_num_rows(mysqli_query($conn, $sql_get_transaksi_id_prefix)) + 1));
        $transaksi_id = $transaksi_id_prefix . $transaksi_id_index;
        $idpenyewa = $_POST['idpenyewa'];
        $idbuku = $_POST['idbuku'];
        $idpaket = $_POST['idpaket'];
        $sql = "INSERT INTO tb_transaksi(transaksi_id, penyewa_id, buku_id, paket_id, transaksi_status) VALUES ('$transaksi_id', '$idpenyewa', '$idbuku', '$idpaket', 0)";
        if (mysqli_query($conn, $sql)) {
            header("location: ../detail_buku.php");
        }
    }
    else {
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }
?>