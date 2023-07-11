<div class="content">
	<div class="panel-header bg-primary-gradient bubble-shadow">
		<div class="page-inner py-5">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-12 ">
                    <img src="<?= base_url();?>assets/img/Tasikmalaya.png"class="mb-1" alt="" width="80px">
                    <h2 class="text-white mb-1 fw-bold"><?= $judul;?></h2>
                    <h5 class="text-white op-7 mb-2">
                        Sistem Administrasi Desa Parung (SAPARUNG)
                    </h5>
                </div>
            </div>
		</div>
	</div>
	<div class="page-inner mt--5">
		<div class="row row-card-no-pd mt--2">
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row">
							<div class="col-5">
								<div class="icon-big text-center">
									<i class="fa fa-fw fa-briefcase text-success"></i>
								</div>
							</div>
							<div class="col-7 col-stats">
								<div class="numbers">
									<p class="card-category">Staff Desa</p>
									<h4 class="card-title"><?= $staff_desa;?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row">
							<div class="col-5">
								<div class="icon-big text-center">
									<i class="fa fa-fw fa-user text-primary"></i>
								</div>
							</div>
							<div class="col-7 col-stats">
								<div class="numbers">
									<p class="card-category">Data Penduduk</p>
									<h4 class="card-title"><?= $data_penduduk; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row">
							<div class="col-5">
								<div class="icon-big text-center">
									<i class="fa fa-fw fa-envelope text-secondary"></i>
								</div>
							</div>
							<div class="col-7 col-stats">
								<div class="numbers">
									<p class="card-category">Surat Masuk</p>
									<h4 class="card-title"><?= $surat_masuk;?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row">
                            <div class="col-5">
								<div class="icon-big text-center">
									<i class="fa fa-fw fa-envelope-open text-danger"></i>
								</div>
							</div>
							<div class="col-7 col-stats">
								<div class="numbers">
									<p class="card-category">Surat Keluar</p>
									<h4 class="card-title">
										<?= $surat_keluar;?>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-category text-center">Statistik Penduduk Desa Parung</div>
					</div>
					<div class="card-body">
						<div class="row justify-content-center">
							<div class="col-lg-7">
								<div class="chart-container">
									<canvas id="statistikPenduduk"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-category text-center">Statistik Surat Tahun <?= date("Y");?></div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="statistikSurat" style="width: 50%; height: 50%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-category text-center">Statistik Surat Berdasarkan Bulan, Tahun <?= date("Y");?></div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="statistikSuratBulan"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

