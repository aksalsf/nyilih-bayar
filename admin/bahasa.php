<?php require 'templates/header.php'; ?>
<div class="wrapper">
    <?php require 'templates/navbar.php'; ?>
    <?php require 'templates/sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php require 'pages/bahasa/tabel-ikhtisar.php'; ?>
    </div>
    <!-- /.content-wrapper -->
    <?php require 'templates/content-footer.php'; ?>
</div>
<!-- ./wrapper -->
<?php require 'templates/script.php'; ?>
<!-- page script -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<?php require 'templates/footer.php'; ?>