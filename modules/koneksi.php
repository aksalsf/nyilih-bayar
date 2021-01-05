<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="nyilih_bayar";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>