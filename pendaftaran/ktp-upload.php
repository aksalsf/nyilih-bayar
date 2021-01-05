<?php
$target_dir = "../assets/img/ktp/";
$target_file = $target_dir . $penyewa_ktp;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["ktp"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
  } else {
    echo "File is not an image.";
  }
}

// Check file size
if ($_FILES["ktp"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
}

// Allow certain file formats
if($imageFileType != "jpg") {
  echo "Maaf, tolong unggah berkas dengan format .jpg!";
}

if (move_uploaded_file($_FILES["ktp"]["tmp_name"], $target_file)) {
    echo "KTP berhasil diunggah!";
} else {
    echo "Sorry, there was an error uploading your file.";
}

?>