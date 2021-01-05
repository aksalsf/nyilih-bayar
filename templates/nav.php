<nav class="navbar navbar-expand-lg navbar-light bg-brand" id="navbarContainer">
    <div class="container-fluid nav__container">
        <!-- Logo Brand -->
        <a class="navbar-brand" href="/nyilih-bayar-main">
            <img src="assets/img/logo.svg" alt="Logo Nyilih Bayar" class="img-fluid nav__logo">
        </a>
        <!-- Mobile Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Content -->
        <div class="collapse navbar-collapse" id="navbar">
            <form class="d-flex input-group mx-auto pr-5 pl-5" method="POST" action="hasil-pencarian.php">
                <input name="query" class="form-control form__cari bg-white border-0 me-2" type="search" placeholder="Aroma Karsa..." aria-label="Search">
                <div class="input-group-append">
                    <button name="submit" class="btn btn__cari bg-white" type="submit">
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php session_start(); ?>
                <?php if (isset($_SESSION['login'])): ?>
                <a href="profil.php" class="btn btn__masuk btn-outline-light"><?php echo $_SESSION['nama']; ?></a>
                <a href="modules/logout.php" class="btn btn-outline-danger ml-3">Keluar</a>
                <?php else:?>
                <a href="login/member/index.php" class="btn btn__masuk btn-outline-light">Masuk</a>
                <a href="pendaftaran/index.php" class="btn btn__daftar btn-light ml-3">Daftar</a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>