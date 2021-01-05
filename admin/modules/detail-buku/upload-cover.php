<?php
$target_dir = "../../../assets/img/books/";
$target_file = $target_dir . $buku_cover;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["buku_cover"]["tmp_name"]);
  if($check !== false) {
    $_SESSION['buku_message'] = "File is an image - " . $check["mime"] . ".";
  } else {
    $_SESSION['buku_message'] = "File is not an image.";
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    exit;
  exit;
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    exit;
  }
}

// Check file size
if ($_FILES["buku_cover"]["size"] > 500000) {
  $_SESSION['buku_message'] = "Sorry, your file is too large.";
  header("Location: ".$_SERVER["HTTP_REFERER"]);
  exit;
}

// Allow certain file formats
if($imageFileType != "jpg") {
  $_SESSION['buku_message'] = "Maaf, tolong unggah berkas dengan format .jpg!";
  header("Location: ".$_SERVER["HTTP_REFERER"]);
  exit;
}

if (move_uploaded_file($_FILES["buku_cover"]["tmp_name"], $target_file)) {
    $_SESSION['buku_message'] = "Cover buku berhasil diubah!";
} else {
    $_SESSION['buku_message'] = "Sorry, there was an error uploading your file.";
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    exit;
}

?>