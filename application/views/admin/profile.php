<div class="page-wrapper">
    <div class="container-fluid hero-bg">
    </div>
    <div class="container profile">
        <div class="row row-cols-1">
            <div class="col col-md-5">
                <img src="<?= base_url() ?>assets/pribadi/img/admin/<?= $profile[
    'foto'
] ?>" class="user-img border border-success border-4" alt="profile">
                <a href="" class="d-none d-sm-block btn btn-sm btn-rounded btn-outline-secondary">Upload</a>
            </div>
            <div class="col col-md-7 mt-2">
                <h3 class="text-light nama"><?= substr(
                    $profile['nama_lengkap'],
                    0,
                    20
                ) ?></h3>
                <div class="level">
                    <i class="bx bxs-briefcase-alt-2"></i>
                    <h6 class="d-inline-block ms-1"><?= $profile[
                        'level'
                    ] ?></h6>
                </div>
                <div class="alamat">
                    <i class="bx bx-current-location"></i>
                    <h6 class="d-inline-block ms-1">Alamat</h6>
                    <h6><?= $admin['alamat'] ?></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-profile">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>Ubah Password</h5>
                        <?= form_open_multipart(
                            'admin/kriteria/edit_kriteria/'
                        ) ?>
                        <div class="row mb-3">
                            <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_lama" name="password_lama" value="" placeholder="Masukan password lama">
                                <?= form_error(
                                    'password_lama',
                                    '<small class="text-danger">',
                                    '</small>'
                                ) ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_baru" name="password_baru" value="" placeholder="Masukan password baru">
                                <?= form_error(
                                    'password_baru',
                                    '<small class="text-danger">',
                                    '</small>'
                                ) ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="konfirmasi" class="col-sm-3 col-form-label">Konfirmasi</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" value="" placeholder="password konfirmasi">
                                <?= form_error(
                                    'konfirmasi',
                                    '<small class="text-danger">',
                                    '</small>'
                                ) ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9 mt-2 text-end">
                                <button type="submit" class="btn btn-primary px-5">Ubah</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>