<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= $this->session->userdata('previous_url'); ?>" class="btn btn-secondary"><i class="bx bx-arrow-back"></i>Kembali</a>
                </ol>
            </nav>
        </div>
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <!-- Menampilkan Pesan ALert -->
                <?= $this->session->flashdata('message'); ?>
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user-pin me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info"><?= $judul; ?></h5>
                    </div>
                    <hr />
                    <?= form_open_multipart("admin/pengguna/edit_pengguna/" . $admin['id_admin']); ?>
                    <?php
                    $dk = array_keys($admin);
                    foreach (array_slice(array_keys($admin), 1) as $keys) : ?>
                        <div class="row mb-3">
                            <label for="<?= $keys; ?>" class="col-sm-3 col-form-label"><?= ucwords(str_replace("_", " ", $keys)); ?></label>
                            <?php if ($keys === 'is_active') : ?>
                                <div class="col-sm-9 col-lg-2 col-md-4">
                                    <select id="<?= $keys; ?>" name="<?= $keys; ?>" class="form-select">
                                        <?php if ($admin[$keys] == 'Y') : ?>
                                            <option value="<?= $admin[$keys]; ?>" selected>Active</option>
                                        <?php elseif ($admin[$keys] == 'N') : ?>
                                            <option value="<?= $admin[$keys]; ?>" selected>Non active</option>
                                        <?php else : ?>
                                            <option value="" selected>pilih</option>
                                        <?php endif; ?>
                                        <option value="Y">Active</option>
                                        <option value="N">Non active</option>
                                    </select>
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'jenis_kelamin') : ?>
                                <div class="col-sm-9 col-lg-2 col-md-4">
                                    <select id="<?= $keys; ?>" name="<?= $keys; ?>" class="form-select">
                                        <?php if ($admin[$keys] == 'L') : ?>
                                            <option value="<?= $admin[$keys]; ?>" selected>Laki - Laki</option>
                                        <?php elseif ($admin[$keys] == 'P') : ?>
                                            <option value="<?= $admin[$keys]; ?>" selected>Perempuan</option>
                                        <?php else : ?>
                                            <option value="" selected>pilih</option>
                                        <?php endif; ?>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'foto') : ?>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>">
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'level') : ?>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>" value="<?= $admin[$keys]; ?>" placeholder="<?= str_replace("_", " ", $keys); ?>" readonly>
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'password') : ?>
                                <div class="col-sm-9">
                                    <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#reset">Reset Password</a>
                                </div>
                            <?php elseif ($keys === 'alamat') : ?>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>" rows="3" placeholder="<?= str_replace("_", " ", $keys); ?>"><?= $admin[$keys]; ?></textarea>
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'no_telp') : ?>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>" value="<?= $admin[$keys]; ?>" placeholder="<?= str_replace("_", " ", $keys); ?>">
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>" value="<?= $admin[$keys]; ?>" placeholder="<?= str_replace("_", " ", $keys); ?>">
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9 mt-2">
                            <button type="submit" class="btn btn-primary px-5">Edit</button>
                        </div>
                    </div>
                    </form>
                    <div class="modal fade" id="reset" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content bg-warning">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white">Reset Pasword</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-dark">
                                        <h5 class="text-dark">Yakin ingin Reset password?</h5>
                                        <div class="row mb-3">
                                            <label for="id_admin" class="col-sm-3 col-form-label"><?= str_replace("_", " ", $dk[0]); ?></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $admin[$dk[0]]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $admin[$dk[1]]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= form_open('admin/pengguna/reset_password'); ?>
                                    <input type="hidden" value="<?= $admin[$dk[0]]; ?>" name="<?= $dk[0]; ?>">
                                    <input type="hidden" value="<?= $admin['foto']; ?>" name="foto_lama">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-secondary">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>