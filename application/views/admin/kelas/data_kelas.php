<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase"><?= $judul; ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <!-- Menampilkan Pesan ALert -->
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('admin/kelas/tambah_kelas'); ?>" class="btn btn-success mb-3">Tambah Kelas</a>
                <div class="table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead class="table-secondary text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Kelas</th>
                                <th width="30%">Ruang</th>
                                <th width="10%">Lantai</th>
                                <th width="20%">Jumlah Siswa</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kelas as $k) : ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $k['nama_kelas']; ?></td>
                                    <td><?= $k['nama_ruangan']; ?></td>
                                    <td class="text-center"><?= $k['lantai']; ?></td>
                                    <td class="text-center"><?= jumlah_siswa($k['id_kelas']); ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/kelas/edit_kelas/' . $k['id_kelas']); ?>" class="btn-sm btn-primary"><i class="bx bx-edit"></i> Edit</a>
                                        <a href="javascript:;" class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $k['id_kelas']; ?>"><i class="bx bx-trash"></i> Hapus</a>
                                        <a href="<?= base_url('admin/siswa/data_siswa/' . $k['id_kelas']); ?>" class="btn-sm btn-info"><i class="lni lni-eye"></i> Lihat siswa</a>
                                    </td>
                                </tr>
                                <!-- Modal hapus kelas -->
                                <div class="modal fade" id="hapus<?= $k['id_kelas']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white">Hapus kelas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-white">
                                                    <h5 class="text-white">Yakin ingin menghapus kelas?</h5>
                                                    <div class="row mb-3">
                                                        <label for="id_kelas" class="col-sm-3 col-form-label">id kelas</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="<?= $k['id_kelas']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="nama_kelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $k['nama_kelas']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?= form_open('admin/kelas/hapus_kelas'); ?>
                                                <input type="hidden" value="<?= $k['id_kelas']; ?>" name="id_kelas">
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