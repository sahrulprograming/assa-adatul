<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?= base_url(); ?>assets/logo/logo.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Assa'adatul</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?= base_url('admin'); ?>">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">MASTER</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-folder-open'></i>
                </div>
                <div class="menu-title">Data Master</div>
            </a>
            <ul>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <i data-feather="chevrons-right"></i>
                        <div class="menu-title">Data Siswa</div>
                    </a>
                    <ul>
                        <li> <a href="<?= base_url('admin/siswa') ?>"><i class="bx bx-right-arrow-alt"></i>Semua Siswa</a>
                        </li>
                        <?php foreach ($kelas as $k) : ?>
                            <li> <a href="<?= base_url('admin/siswa/data_siswa/' . $k['id_kelas']); ?>"><i class="bx bx-right-arrow-alt"></i>Kelas <?= $k['nama_kelas']; ?></a>
                            </li>
                        <?php endforeach; ?>
                        <li> <a href="<?= base_url('admin/siswa/siswa_non_active') ?>"><i class="bx bx-right-arrow-alt"></i>Siswa Non Active</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('admin/kelas'); ?>">
                        <i data-feather="chevrons-right"></i>
                        <div class="menu-title">Data Kelas</div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/kriteria'); ?>">
                        <i data-feather="chevrons-right"></i>
                        <div class="menu-title">Data Kriteria</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <i data-feather="chevrons-right"></i>
                        <div class="menu-title">Nilai Siswa</div>
                    </a>
                    <ul>
                        <?php foreach ($kelas as $k) : ?>
                            <li> <a href="<?= base_url('admin/penilaian/index/' . $k['id_kelas']); ?>"><i class="bx bx-right-arrow-alt"></i>Kelas <?= $k['nama_kelas']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url('admin/analisis'); ?>">
                <div class="parent-icon"><i class='bx bx-analyse'></i>
                </div>
                <div class="menu-title">Hasil Analisis</div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/pengguna'); ?>">
                <div class="parent-icon"><i class='bx bx-user-pin'></i>
                </div>
                <div class="menu-title">Data Pengguna</div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('auth/logout'); ?>">
                <div class="parent-icon"><i class='bx bx-log-out'></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>