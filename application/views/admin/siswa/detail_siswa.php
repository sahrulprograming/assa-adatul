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
                <div class="breadcrumb-title pe-3">Profile Siswa</div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body border-top border-5 border-success">
                                <div class="align-items-center text-center mt-4">
                                    <img src="<?= base_url('assets/pribadi/img/siswa/' . $siswa['foto']); ?>" alt="siswa" class="rounded-circle p-1 bg-gradient-ohhappiness" width="170" height="200">
                                    <div class="mt-3">
                                        <h4><?= $siswa['nama_lengkap']; ?></h4>
                                    </div>
                                </div>
                                <hr class="mb-2 mt-4" />
                                <div class="row">
                                    <div class="col text-start">NIS</div>
                                    <div class="col text-end"><?= $siswa['NIS']; ?></div>
                                </div>
                                <hr class="my-2" />
                                <div class="row">
                                    <div class="col text-start">Kelas</div>
                                    <div class="col text-end"><?= $siswa['nama_kelas']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body border-top border-5 border-success">
                                <p class="heading">Profile Lengkap</p>
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless" style="width: 18rem;">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td> : <?= $siswa['nama_lengkap']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td> : <?php if ($siswa['jenis_kelamin'] == 'L') {
                                                        echo "Laki - Laki";
                                                    } elseif ($siswa['jenis_kelamin'] == 'P') {
                                                        echo "Perempuan";
                                                    } else {
                                                        echo "Belum Di tentukan";
                                                    } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td> : <?= $siswa['tempat_lahir']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td> : <?= tanggal_helper($siswa['tanggal_lahir']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td> : <?= $siswa['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Masuk</th>
                                            <td> : <?= $siswa['tahun_masuk']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Ayah</th>
                                            <td> : <?= $siswa['nama_ayah']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Ibu</th>
                                            <td> : <?= $siswa['nama_ibu']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td> : <?= $siswa['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>No Handphone</th>
                                            <td> : <?= $siswa['no_hp']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status Active</th>
                                            <?php if ($siswa['is_active'] == 'Y') : ?>
                                                <td> : Active</td>
                                            <?php else : ?>
                                                <td> : Non active</td>
                                            <?php endif; ?>
                                        </tr>
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