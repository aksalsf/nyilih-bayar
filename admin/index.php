<?php require 'templates/header.php'; ?>
<div class="wrapper">
    <?php require 'templates/navbar.php'; ?>
    <?php require 'templates/sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php require 'pages/dashboard.php'; ?>
    </div>
    <!-- /.content-wrapper -->
    <?php require 'templates/content-footer.php'; ?>
</div>
<!-- ./wrapper -->
<?php require 'templates/script.php'; ?>
<?php require 'templates/footer.php'; ?>