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
                        <div><i class="bx bxs-file me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info"><?= $judul; ?></h5>
                    </div>
                    <hr />
                    <?= form_open_multipart("admin/penilaian/edit_penilaian/" . $NIS . "/$semester"); ?>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?= nama_siswa($NIS); ?>" readonly>
                        </div>
                    </div>
                    <?php foreach ($kriteria as $k) :
                        $nama_kriteria = str_replace(" ", "_", $k['kriteria']);
                        $nilai_siswa = $this->M_admin_select->nilai_kriteria($NIS, $k['id_kriteria'], $semester);
                    ?>
                        <div class="row mb-3">
                            <label for="<?= $nama_kriteria; ?>" class="col-sm-3 col-form-label"><?= str_replace("_", " ", $nama_kriteria); ?></label>
                            <div class="col-sm-9">
                                <input type="number" step="0.01" class="form-control" id="<?= $nama_kriteria; ?>" name="<?= $nama_kriteria; ?>" value="<?= $nilai_siswa ? $nilai_siswa['nilai'] : set_value($nama_kriteria); ?>" placeholder="Masukan Angka">
                                <?= form_error("$nama_kriteria", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
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