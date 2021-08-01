<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase"><?= $judul; ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <!-- Menampilkan Pesan ALert -->
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('admin/kriteria/tambah_kriteria'); ?>" class="btn btn-success mb-3">Tambah Kriteria</a>
                <div class="table-responsive">
                    <table id="table2" class="table table-striped table-bordered">
                        <thead class="table-secondary text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="60%">kriteria</th>
                                <th width="20%">bobot</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kriteria as $k) : ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $k['kriteria']; ?></td>
                                    <td class="text-center"><?= $k['bobot']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/kriteria/edit_kriteria/' . $k['id_kriteria']); ?>" class="btn-sm btn-primary"><i class="bx bx-edit"></i> Edit</a>
                                        <a href="javascript:;" class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $k['id_kriteria']; ?>"><i class="bx bx-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <!-- Modal hapus kriteria -->
                                <div class="modal fade" id="hapus<?= $k['id_kriteria']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white">Hapus kriteria</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-white">
                                                    <h5 class="text-white">Yakin ingin menghapus kriteria?</h5>
                                                    <div class="row mb-3">
                                                        <label for="id_kriteria" class="col-sm-3 col-form-label">id kriteria</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="<?= $k['id_kriteria']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="kriteria" class="col-sm-3 col-form-label">Nama kriteria</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="kriteria" name="kriteria" value="<?= $k['kriteria']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?= form_open('admin/kriteria/hapus_kriteria'); ?>
                                                <input type="hidden" value="<?= $k['id_kriteria']; ?>" name="id_kriteria">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-dark">hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>