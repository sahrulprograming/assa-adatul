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
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">Edit Siswa</h5>
                    </div>
                    <hr />
                    <?= form_open_multipart("admin/siswa/edit_siswa/" . $siswa['NIS']); ?>
                    <div class="row mb-3">
                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $siswa['nama_lengkap']; ?>" placeholder="Masukan nama lengkap">
                            <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9 col-lg-2 col-md-4">
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <?php if ($siswa['jenis_kelamin'] == 'L') : ?>
                                    <option value="<?= $siswa['jenis_kelamin']; ?>" selected>Laki - Laki</option>
                                <?php elseif ($siswa['jenis_kelamin'] == 'P') : ?>
                                    <option value="<?= $siswa['jenis_kelamin']; ?>" selected>Perempuan</option>
                                <?php else : ?>
                                    <option value="" selected>pilih</option>
                                <?php endif; ?>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9 col-lg-2 col-md-4">
                            <select id="kelas" name="kelas" class="form-select">
                                <?php if ($siswa['id_kelas']) : ?>
                                    <option value="<?= $siswa['id_kelas']; ?>" selected><?= $siswa['nama_kelas']; ?></option>
                                <?php else : ?>
                                    <option value="" selected>pilih</option>
                                <?php endif; ?>
                                <?php foreach ($kelas as $k) : ?>
                                    <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $siswa['tempat_lahir']; ?>" placeholder="Masukan kota tempat lahir">
                            <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">tanggal Lahir</label>
                        <div class="col-sm-9 col-lg-2 col-md-4">
                            <input class="result form-control" type="text" id="date" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir']; ?>" placeholder="Masukan tanggal lahir">
                            <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="agama" name="agama" value="<?= $siswa['agama']; ?>" placeholder="Masukan nama agama">
                            <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $siswa['nama_ayah']; ?>" placeholder="Masukan nama ayah">
                            <?= form_error('nama_ayah', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $siswa['nama_ibu']; ?>" placeholder="Masukan nama ibu">
                            <?= form_error('nama_ibu', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukan alamat"><?= $siswa['alamat']; ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $siswa['email']; ?>" placeholder="Masukan nama email">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_hp" class="col-sm-3 col-form-label">No Handphone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $siswa['no_hp']; ?>" placeholder="Masukan nomer handphone">
                            <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="is_active" class="col-sm-3 col-form-label">Status Aktif</label>
                        <div class="col-sm-9 col-lg-2 col-md-4">
                            <select id="is_active" name="is_active" class="form-select">
                                <?php if ($siswa['is_active'] == 'Y') : ?>
                                    <option value="<?= $siswa['is_active']; ?>" selected>Active</option>
                                <?php elseif ($siswa['is_active'] == 'N') : ?>
                                    <option value="<?= $siswa['is_active']; ?>" selected>Non active</option>
                                <?php else : ?>
                                    <option value="" selected>pilih</option>
                                <?php endif; ?>
                                <option value="Y">Active</option>
                                <option value="N">Non active</option>
                            </select>
                            <?= form_error('is_active', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-3 col-form-label">Upload Foto</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="foto" name="foto">
                            <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- Ambil Foto lama -->
                        <input type="hidden" name="foto_lama" value="<?= $siswa['foto']; ?>">
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9 mt-2">
                            <button type="submit" class="btn btn-primary px-5">Edit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>