<header class="login-header shadow  d-none d-sm-block">
    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url(); ?>assets/logo/logo.png" width="50" height="50" alt="Logo" />
                <div class="logo-text d-inline-block">
                    <h3 class="text-success" style="font-weight: bold;">Assa'adatul Abadiyah</h3>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="#"><i class='bx bx-home-alt me-1'></i>Home</a>
                    </li>
                    <?php if ($this->session->userdata('nama')) : ?>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin'); ?>"><i class='bx bx-user me-1'></i><?= substr($this->session->userdata('nama'), 0, 17); ?></a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('auth'); ?>"><i class='bx bx-user me-1'></i>Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<header class="login-header shadow d-block d-sm-none">
    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
        <div class="container text-center">
            <a class="navbar-brand ms-3" href="#">
                <img src="<?= base_url(); ?>assets/logo/logo.png" width="50" height="50" alt="Logo" />
                <div class="logo-text d-inline-block">
                    <h3 class="text-success" style="font-weight: bold;">Assa'adatul Abadiyah</h3>
                </div>
            </a>
        </div>
    </nav>
    <nav class="fixed-bottom bg-white rounded-0 shadow-sm">
        <div class="container">
            <div class="row row-cols-2 text-center p-2">
                <div class="col">
                    <a class="text-dark" aria-current="page" href="<?= base_url(); ?>"><i class='bx bx-home-alt d-block'></i>Home</a>
                </div>
                <div class="col">
                    <a class="text-dark" href="<?= base_url('auth'); ?>"><i class='bx bx-user d-block'></i>Login</a>
                </div>
            </div>
        </div>
    </nav>
</header>