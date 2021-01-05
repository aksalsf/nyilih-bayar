<body>
	<?php 
		require('function.php');
		$nama_depan = $_POST ['depan'];
		$nama_belakang = $_POST ['belakang'];
		$email = $_POST['email']; 
		$password = $_POST ['pass'];
		$telephone = $_POST ['telp'];
		$gambar_ktp = $_POST['ktp'];

		$result = mysqli_query($conn, "SELECT email FROM jajal WHERE email = '$email'");
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
                alert('email tersebut sudah terdaftar, silakan kembali ke halaman pendaftaran');
            </script>";
            
            return false;
		}



		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO jajal(nama_depan, nama_belakang, email, password, telephone,  gambar_ktp) VALUES ('$nama_depan', '$nama_belakang', '$email', '$password', '$telephone',  '$gambar_ktp')";

		if ($conn->query($sql) === TRUE) {
			echo "<script>
                alert('user berhasil ditambahkan');
            </script>";
		} else {
			echo "Error: ". $sql . "<br>". $conn->error;
		}
		$conn->close();
	 ?>
</body>