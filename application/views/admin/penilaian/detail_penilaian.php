<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= $this->session->userdata('previous_url'); ?>" class="btn btn-secondary"><i class="bx bx-arrow-back"></i>Kembali</a>
                </ol>
            </nav>
            <div class="ps-3">
                <div class="breadcrumb-title pe-3">Data Nilai Siswa</div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-top border-5 border-success">
                                <p class="heading">Data Lengkap Nilai</p>
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless" style="width: 18rem;">
                                        <tr>
                                            <th>NIS</th>
                                            <td> : <?= $siswa['NIS']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td> : <?= $siswa['nama_lengkap']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kelas</th>
                                            <td> : <?= $siswa['nama_kelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status Active</th>
                                            <?php if ($siswa['is_active'] == 'Y') : ?>
                                                <td> : Active</td>
                                            <?php else : ?>
                                                <td> : Non active</td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="my-2">Data Nilai Kriteria</p>
                                            </td>
                                        </tr>

                                        <div class="table-responsive">
                                            <table id="table1" class="table table-striped table-bordered">
                                                <thead class="table-secondary text-center">
                                                    <tr>
                                                        <th>Nama Kriteria</th>
                                                        <th>Nilai Kriteria</th>
                                                        <th>Grade</th>
                                                        <th>keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($kriteria as $k) : ?>
                                                        <?php $nilai_kriteria = $this->M_admin_select->nilai_kriteria($siswa['NIS'], $k['id_kriteria'], $semester); ?>
                                                        <tr class="text-center">
                                                            <th class="text-start"><?= $k['kriteria']; ?></th>
                                                            <td><?= $nilai_kriteria ? $nilai_kriteria['nilai'] : 'belum di nilai'; ?></td>
                                                            <td><?= $nilai_kriteria ? $nilai_kriteria['grade'] : 'belum di nilai'; ?></td>
                                                            <td><?= $nilai_kriteria ? $nilai_kriteria['keterangan'] : 'belum di nilai'; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>