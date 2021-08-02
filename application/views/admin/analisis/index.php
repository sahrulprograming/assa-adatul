<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h3 class="text-center m-4">Daftar Peringkat Seleksi Siswa Berprestasi</h3>
            <hr />
            <?php foreach ($kelas as $kelas) : ?>
                <h5 class="text-center">Siswa Kelas <?= $kelas['nama_kelas']; ?></h5>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered text-center align-middle" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th width="5%">Peringkat</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas Siswa</th>
                                        <th>Foto Siswa</th>
                                        <th>Total Nilai SAW</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ranking = $this->M_admin_select->rangking($kelas['nama_kelas']);
                                    $no = 0;
                                    foreach ($ranking as $r) :
                                        $no++;
                                    ?>
                                        <tr class="bg-biru-muda">
                                            <td><?= $no; ?></td>
                                            <td><?= $r; ?></td>
                                            <td><?= nama_siswa($r); ?></td>
                                            <td><?= nama_kelas(id_kelas($r)); ?></td>
                                            <td>
                                                <div class="card m-auto" style="width: 4rem;">
                                                    <img src="<?= base_url('assets/pribadi/img/siswa/' . foto_siswa($r)); ?>" class="card-img-top" alt="...">
                                                </div>
                                            </td>
                                            <td><?= metode_SAW($r, $kelas['nama_kelas']); ?></td>
                                            <td>
                                                <?= form_open('home/detail_nilai'); ?>
                                                <input type="hidden" name="NIS" value="<?= $r; ?>">
                                                <input type="hidden" name="kelas" value="<?= $kelas['nama_kelas']; ?>">
                                                <button type="submit" class="btn btn-info">Detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>