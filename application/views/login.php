<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col mx-auto">
                <div class="card mt-5 mt-lg-0">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="text-center">
                                <h3 class="">Login</h3>
                            </div>
                            <div class="login-separater text-center mb-4"> <span>LOGIN WITH EMAIL OR USERNAME</span>
                                <hr />
                            </div>
                            <!-- Menampilkan Sesuatu Ketika Gagal Login -->
                            <?= $this->session->flashdata('message'); ?>
                            <div class="form-body">
                                <?= form_open('auth', 'class="row g-3"'); ?>
                                <div class="col-12">
                                    <label for="username" class="form-label">Email / Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Email / Username" value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Masukan Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Masukan Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                    </div>
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success"><i class="bx bxs-lock-open"></i>Login</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>