<?php if ($_SERVER['REQUEST_METHOD']=='POST'):?>
<?php 
    $querry=$_POST['query'];
    
    require 'templates\header.php';
   
    require 'templates\hasil-pencarian.php';
    require 'templates\banner-section.php';

?>

<div class="container mt-5">
    <h4>Rekomendasi Tahun Baru </h4>
</div>

<?php 
    require 'templates\rek-book.php';
    require 'templates\promotion.php';
    require 'templates\footer.php';
    else :
        header('Location:index.php ');
    endif;
?>
