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
                    <?= form_open_multipart("admin/kriteria/edit_kriteria/"); ?>
                    <div class="row mb-3">
                        <label for="kriteria" class="col-sm-3 col-form-label">Kriteria</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kriteria" name="kriteria" value="<?= $kriteria['kriteria']; ?>" placeholder="Masukan nama kriteria">
                            <?= form_error('kriteria', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="bobot" class="col-sm-3 col-form-label">Bobot</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="bobot" name="bobot" value="<?= $kriteria['bobot']; ?>" placeholder="Masukan jumlah bobot">
                            <?= form_error('bobot', '<small class="text-danger">', '</small>'); ?>
                        </div>
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