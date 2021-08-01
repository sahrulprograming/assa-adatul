<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase"><?= $judul; ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <!-- Menampilkan Pesan ALert -->
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('admin/siswa/tambah_siswa'); ?>" class="btn btn-success mb-3">tambah siswa</a>
                <div class="table-responsive">
                    <table id="table2" class="table table-striped table-bordered">
                        <thead class="table-secondary text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">NIS</th>
                                <th width="30%">Nama</th>
                                <th width="10%">Kelas</th>
                                <th width="20%">Jenis Kelamin</th>
                                <th width="5%">Active</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($siswa as $s) : ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $s['NIS']; ?></td>
                                    <td><?= $s['nama_lengkap']; ?></td>
                                    <td class="text-center"><?= $s['nama_kelas']; ?></td>
                                    <td class="text-center"><?= $s['jenis_kelamin']; ?></td>
                                    <td class="text-center"><?= $s['is_active']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/siswa/detail_siswa/' . $s['NIS']); ?>" class="btn-sm btn-info"><i class="lni lni-eye"></i> Detail</a>
                                        <a href="<?= base_url('admin/siswa/edit_siswa/' . $s['NIS']); ?>" class="btn-sm btn-primary"><i class="bx bx-edit"></i> Edit</a>
                                        <a href="javascript:;" class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $s['NIS']; ?>"><i class="bx bx-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <!-- Modal hapus Siswa -->
                                <div class="modal fade" id="hapus<?= $s['NIS']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white">Hapus Siswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-white">
                                                    <h5 class="text-white">Yakin ingin menghapus siswa?</h5>
                                                    <div class="row mb-3">
                                                        <label for="NIS" class="col-sm-3 col-form-label">NIS</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="<?= $s['NIS']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $s['nama_lengkap']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?= form_open('admin/siswa/hapus_siswa'); ?>
                                                <input type="hidden" value="<?= $s['NIS']; ?>" name="NIS">
                                                <input type="hidden" value="<?= $s['foto']; ?>" name="foto">
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