<footer class="container-fluid bg-white p-5 border-top">
    <div class="row">
        <nav class="col-md-3">
            <h6 class="mb-3">Tentang Kami</h6>
            <ul class="list-unstyled">
                <li>
                    <a class="footer__link" href="#">Tentang NyilihBayar</a>
                </li>
                <li>
                    <a class="footer__link" href="#">Legalitas</a>
                </li>
                <li>
                    <a class="footer__link" href="#">Karir</a>
                </li>
                <li>
                    <a class="footer__link" href="#">Blog</a>
                </li>
                <li>
                    <a class="footer__link" href="#">Kontak</a>
                </li>
            </ul>
        </nav>
        <nav class="col-md-3">
            <h6 class="mb-3">Kebijakan</h6>
            <ul class="list-unstyled">
                <li>
                    <a class="footer__link" href="#">Kebijakan Privasi</a>
                </li>
                <li>
                    <a class="footer__link" href="#">Informasi Hak Cipta</a>
                </li>
                <li>
                    <a class="footer__link" href="#">Prosedur Penyewaan</a>
                </li>
            </ul>
        </nav>
        <nav class="col-md-3">
            <h6 class="mb-3">Layanan</h6>
            <ul class="list-unstyled">
                <li>
                    <a class="footer__link" href="#">Pusat Bantuan</a>
                </li>
                <li>
                    <a class="footer__link" href="#">Panduan Penggunaan</a>
                </li>
                <li>
                    <a class="footer__link" href="#">Dukungan</a>
                </li>
            </ul>
        </nav>
    </div>
</footer>

<script>
$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();
    if (scrollDistance >= 80) {
        $("#navbarContainer").addClass("fixed-top");
    } else {
        $("#navbarContainer").removeClass("fixed-top");
    }
});
</script>

</body>

</html>