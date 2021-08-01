<div class="error-404 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="card py-5">
            <div class="row g-0">
                <div class="col col-xl-5">
                    <div class="card-body p-4">
                        <h1 class="display-1"><span class="text-primary">4</span><span class="text-danger">0</span><span class="text-success">4</span></h1>
                        <h2 class="font-weight-bold display-4">Halaman Tidak Ditemukan</h2>
                        <div class="mt-5">
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url(); ?>" class="btn btn-primary btn-lg px-md-5 radius-30">Home</a>
                                </div>
                                <div class="col">
                                    <a href="<?= $this->session->userdata('previous_url'); ?>" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <img src="<?= base_url('assets/404.png'); ?>" class="img-fluid" alt="">
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>