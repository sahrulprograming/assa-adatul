<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase"><?= $judul; ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <!-- Menampilkan Pesan ALert -->
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('admin/kriteria/tambah_kriteria'); ?>" class="btn btn-success mb-3">Tambah Admin</a>
                <div class="table-responsive">
                    <table id="table2" class="table table-striped table-bordered">
                        <thead class="table-secondary text-center">
                            <tr>
                                <th width="5%">No</th>
                                <?php $i = 0;
                                $ky = [];
                                $th = array_keys($admin[0]);
                                $keys = $th;
                                foreach (array_slice($th, 1) as $th) :
                                ?>
                                    <th><?= str_replace("_", " ", $th); ?></th>
                                <?php
                                    $ky[$i] = $th;
                                    $i++;
                                endforeach; ?>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($admin as $admin) : ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <?php foreach ($ky as $ky) : ?>
                                        <td class="text-center"><?= $admin[$ky]; ?></td>
                                    <?php endforeach; ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/pengguna/edit_pengguna/' . $admin[$keys[0]]); ?>" class="btn-sm btn-primary"><i class="bx bx-edit"></i> Edit</a>
                                        <a href="javascript:;" class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $admin[$keys[0]]; ?>"><i class="bx bx-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="hapus<?= $admin[$keys[0]]; ?>" tabindex="-1" aria-hidden="true">
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
                                                        <label for="id_admin" class="col-sm-3 col-form-label">id kriteria</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="<?= $admin[$keys[0]]; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama lengkap</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $admin['nama_lengkap']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?= form_open('admin/kriteria/hapus_kriteria'); ?>
                                                <input type="hidden" value="<?= $admin[$keys[0]]; ?>" name="id_admin">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-dark">hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>