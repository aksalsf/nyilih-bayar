<?php 
	$conn =  mysqli_connect("localhost", "root", "", "nyilih_bayar");


	function registrasi($data){
		global $conn;

		$get_the_year = date('y');
    	$get_the_month = date('m');
    	$penyewa_id_prefix = strtoupper("C" . $get_the_year . $get_the_month);
    	$sql_get_penyewa_id_prefix = "SELECT penyewa_id FROM tb_penyewa WHERE penyewa_id LIKE '$penyewa_id_prefix%' ";
    	$penyewa_id_index = sprintf( "%03d", (mysqli_num_rows(mysqli_query($conn, $sql_get_penyewa_id_prefix)) + 1));
    	$penyewa_id = $penyewa_id_prefix . $penyewa_id_index;

		$penyewa_firstname = stripslashes($data['depan']);
		$penyewa_lastname = stripslashes($data['belakang']);
		$penyewa_email = $data['email']; 
		$penyewa_password = $data['pass'];
		$penyewa_ktp = $penyewa_id.".jpg";
		$penyewa_telepon = $data['telp'];
		require 'ktp-upload.php';

		$result = mysqli_query($conn, "SELECT penyewa_email FROM tb_penyewa WHERE penyewa_email = '$penyewa_email'");
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
                	alert('email tersebut sudah terdaftar');
            	</script>";
            
            return false;
		}

		$penyewa_password = password_hash($penyewa_password, PASSWORD_DEFAULT);

		mysqli_query($conn, "INSERT INTO tb_penyewa(penyewa_id, penyewa_firstname, penyewa_lastname, penyewa_email, penyewa_password, penyewa_ktp, penyewa_telepon, penyewa_status) VALUES('$penyewa_id', '$penyewa_firstname', '$penyewa_lastname', '$penyewa_email', '$penyewa_password', '$penyewa_ktp', '$penyewa_telepon', 0)");

		return mysqli_affected_rows($conn);


	}
 ?>