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
                        <div><i class="bx bxs-building-house me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">Edit Kelas</h5>
                    </div>
                    <hr />
                    <?= form_open_multipart("admin/kelas/edit_kelas/" . $detail_kelas['id_kelas']); ?>
                    <div class="row mb-3">
                        <label for="nama_kelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $detail_kelas['nama_kelas']; ?>" placeholder="Masukan nama lengkap">
                            <?= form_error('nama_kelas', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_ruangan" class="col-sm-3 col-form-label">Nama Ruangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="<?= $detail_kelas['nama_ruangan']; ?>" placeholder="Masukan kota tempat lahir">
                            <?= form_error('nama_ruangan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lantai" class="col-sm-3 col-form-label">Lantai Ke</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lantai" name="lantai" value="<?= $detail_kelas['lantai']; ?>" placeholder="Masukan kota tempat lahir">
                            <?= form_error('lantai', '<small class="text-danger">', '</small>'); ?>
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