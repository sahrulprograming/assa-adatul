<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3">
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?= count($siswa); ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-group fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-2">Siswa</p>
                        </div>
                        <div class="card-footer bg-transparent border-white text-center text-white"><a href="<?= base_url('admin/siswa'); ?>" class="link-light">Selengkapnya<i data-feather="chevrons-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?= count($kelas); ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-folder fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-2">Kelas</p>
                        </div>
                        <div class="card-footer bg-transparent border-white text-center text-white"><a href="<?= base_url('admin/kelas'); ?>" class="link-light">Selengkapnya<i data-feather="chevrons-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?= count($kriteria); ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-file fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-2">Kriteria</p>
                        </div>
                        <div class="card-footer bg-transparent border-white text-center text-white"><a href="<?= base_url('admin/kriteria'); ?>" class="link-light">Selengkapnya<i data-feather="chevrons-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="col-12">
            <div class="card radius-10 overflow-hidden w-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <caption>
                            <div class="text-center">
                                <h4 class="mb-0">Kriteria</h4>
                                <hr>
                            </div>
                        </caption>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>normalisasi</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_bobot = sum_bobot($kriteria);
                                foreach ($kriteria as $k) : ?>
                                    <tr>
                                        <td><?= $k['kriteria'] ?></td>
                                        <td class="text-center"><?= $k['bobot']; ?></td>
                                        <th class="text-center"><?= round($k['bobot'] / $total_bobot, 2); ?></th>
                                        <th class="text-center"><?= round(($k['bobot'] / $total_bobot) * 100, 0); ?> %</th>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->