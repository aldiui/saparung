<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"><?= $judul;?></h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="<?= base_url();?>user">        
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>surat/suratmasuk"><?= $judul;?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Tabel Data <?= $judul;?></h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url();?>surat/inputsuratmasuk" class="btn btn-primary mb-3">
                            <i class="fa fa-plus mr-2"></i> Tambah Data
                        </a>
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#sm">
                            <i class="fa fa-print mr-2"></i> Cetak Laporan
                        </button>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover table-bordered " style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Diterima</th>
                                        <th scope="col">Tanggal Surat</th>
                                        <th scope="col">Nomor Surat</th>
                                        <th scope="col">Isi Surat</th>
                                        <th scope="col">Ditujukan Kepada</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; 
                                    foreach($surat_masuk as $srm):?>
                                        <tr>
                                            <td scope="row"><?= $no++;?></td>
                                            <td><?= $srm["tgl_terima"]; ?></td>
                                            <td><?= $srm["tgl_surat"]; ?></td>
                                            <td><?= $srm["no_surat"]; ?></td>
                                            <td><?= $srm["isi_surat"]; ?></td>
                                            <td><?= $srm["tujuan"]; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a href="<?= base_url("surat/editsuratmasuk/").$srm["id_sm"];?>" class="btn btn-icon btn-success btn-round d-inline-flex align-items-center justify-content-center mr-1"><i class="fa fa-pen-to-square"></i></a>
                                                    <a href="<?= base_url("surat/deletesuratmasuk/").$srm["id_sm"];?>" class="btn btn-icon btn-danger btn-round d-inline-flex align-items-center justify-content-center tombol-hapus"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sm" tabindex="-1" role="dialog" aria-labelledby="smLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Surat Masuk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form action="<?= base_url('surat/cetaksuratmasuk');?>" method="post">
                <?= csrf();?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="">Pilih Bulan</option>
                            <?php foreach($bulan as $b):?>
                                <option value="<?= $b["no"];?>"><?= $b["nama"];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control" required>
                            <option value="">Pilih Tahun</option>
                            <?php foreach($tahun as $t):?>
                                <option value="<?= $t;?>"><?= $t;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cetak</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
		</div>
	</div>
</div>