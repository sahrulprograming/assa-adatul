<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase"><?= $judul; ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <!-- Menampilkan Pesan ALert -->
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table id="table2" class="table table-striped table-bordered">
                        <thead class="table-secondary text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">NIS</th>
                                <th width="30%">Nama</th>
                                <th width="10%">Kelas</th>
                                <th width="20%">Nilai SAW</th>
                                <th width="5%">Rata Rata Kriteria</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($siswa as $s) :
                                $nilai_rata2 = $this->M_admin_select->nilai_rata2($s['NIS'], $s['nama_kelas']);
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $s['NIS']; ?></td>
                                    <td><?= $s['nama_lengkap']; ?></td>
                                    <td class="text-center"><?= $s['nama_kelas']; ?></td>
                                    <td class="text-center"><?= metode_SAW($s['NIS'], $s['nama_kelas']) == 0 ? 'Belum di nilai' : metode_SAW($s['NIS'], $s['nama_kelas']); ?></td>
                                    <td class="text-center"><?= $nilai_rata2 == 0 ? 'belum di nilai' : $nilai_rata2; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/penilaian/edit_penilaian/' . $s['NIS']); ?>" class="btn-sm btn-primary"><i class="bx bx-edit"></i> Edit</a>
                                        <a href="<?= base_url('admin/penilaian/detail_penilaian/' . $s['NIS']); ?>" class="btn-sm btn-info"><i class="lni lni-eye"></i> Lihat Nilai</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>