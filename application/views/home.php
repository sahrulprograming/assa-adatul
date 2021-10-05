<div class="user-content">
	<div class="container-fluid bg-success hero-section p-5">
		<h1 class="text-light m-0">Hasil Seleksi Siswa Berprestasi</h1>
		<p class="text-light m-0">Berikut adalah hasil seleksi siswa berprestasi dengan metode Simple Additive Weighting
			(SAW)</p>
	</div>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<ul class="nav nav-tabs nav-success" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
							aria-selected="true">
							<div class="d-flex align-items-center">
								<div class="tab-title">Semester 1</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
							aria-selected="false">
							<div class="d-flex align-items-center">
								<div class="tab-title">Semester 2</div>
							</div>
						</a>
					</li>
				</ul>
				<div class="tab-content py-3">
					<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
						<h3 class="text-center mt-4">Daftar Peringkat Seleksi Siswa Berprestasi</h3>
						<h3 class="text-center">Semester 1</h5>
							<hr />
							<?php foreach ($kelas as $kelas) : ?>
							<h5 class="text-center">Siswa Kelas <?= $kelas['nama_kelas']; ?></h5>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="example"
											class="table table-striped table-bordered text-center align-middle"
											style="width:100%;">
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
												<?php $ranking = $this->M_admin_select->rangking($kelas['nama_kelas'], '1');
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
															<img src="<?= base_url('assets/pribadi/img/siswa/' . foto_siswa($r)); ?>"
																class="card-img-top" alt="...">
														</div>
													</td>
													<td><?= metode_SAW($r, $kelas['nama_kelas'], 1); ?></td>
													<td>
														<?= form_open('home/detail_nilai/1'); ?>
														<input type="hidden" name="NIS" value="<?= $r; ?>">
														<input type="hidden" name="kelas"
															value="<?= $kelas['nama_kelas']; ?>">
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
					<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
						<h3 class="text-center mt-4">Daftar Peringkat Seleksi Siswa Berprestasi</h3>
						<h3 class="text-center">Semester 2</h5>
							<hr />
							<?php foreach ($kelas2 as $kelas) : ?>
							<h5 class="text-center">Siswa Kelas <?= $kelas['nama_kelas']; ?></h5>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="example"
											class="table table-striped table-bordered text-center align-middle"
											style="width:100%;">
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
												<?php $ranking = $this->M_admin_select->rangking($kelas['nama_kelas'], 2);
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
															<img src="<?= base_url('assets/pribadi/img/siswa/' . foto_siswa($r)); ?>"
																class="card-img-top" alt="...">
														</div>
													</td>
													<td><?= metode_SAW($r, $kelas['nama_kelas'], 2); ?></td>
													<td>
														<?= form_open('home/detail_nilai/2'); ?>
														<input type="hidden" name="NIS" value="<?= $r; ?>">
														<input type="hidden" name="kelas"
															value="<?= $kelas['nama_kelas']; ?>">
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
		</div>
	</div>
