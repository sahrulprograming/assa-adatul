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
                    <?= form_open_multipart("admin/pengguna/tambah_pengguna"); ?>
                    <?php
                    $dk = array_keys($admin[0]);
                    foreach (array_slice(array_keys($admin[0]), 1, 8) as $keys) : ?>
                        <div class="row mb-3">
                            <label for="<?= $keys; ?>" class="col-sm-3 col-form-label"><?= ucwords(str_replace("_", " ", $keys)); ?></label>
                            <?php if ($keys === 'level') : ?>
                                <div class="col-sm-9 col-lg-2 col-md-4">
                                    <select id=<?= $keys; ?> name=<?= $keys; ?> class="form-select">
                                        <option value="<?= set_value($keys); ?>" selected><?= set_value($keys) ? set_value($keys) : "Pilih"; ?></option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Guru">Guru</option>
                                    </select>
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'jenis_kelamin') : ?>
                                <div class="col-sm-9 col-lg-2 col-md-4">
                                    <select id=<?= $keys; ?> name=<?= $keys; ?> class="form-select">
                                        <option value="<?= set_value($keys); ?>" selected><?= !set_value($keys) ? "Pilih" : (set_value($keys) == "L" ? "Laki- Laki" : "Perempuan"); ?></option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'alamat') : ?>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>" rows="3" placeholder="Masukan alamat"><?= set_value($keys); ?></textarea>
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'no_telp') : ?>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>" value="<?= set_value($keys); ?>" placeholder="Masukan nomer handphone">
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php elseif ($keys === 'foto') : ?>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>" value="<?= set_value($keys); ?>">
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="<?= $keys; ?>" name="<?= $keys; ?>" value="<?= set_value($keys); ?>" placeholder="<?= str_replace("_", " ", $keys); ?>">
                                    <?= form_error($keys, '<small class="text-danger">', '</small>'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9 mt-2">
                            <button type="submit" class="btn btn-success px-5">Tambah</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>