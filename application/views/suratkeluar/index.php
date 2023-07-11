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
                    <a href="<?= base_url();?>surat/suratkeluar"><?= $judul;?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#sk">
                    <i class="fa fa-print mr-2"></i> Cetak Laporan
                </button>
            </div>
            <?php  
             $suratKeluar = "SELECT * 
                    FROM `user_sub_menu`
                    WHERE `menu_id` = 2
                    AND `is_active` = 1
            ";
            $getSK = $this->db->query($suratKeluar)->result_array();
            ?>
            <?php foreach($getSK as $sk):?>
                <?php if($sk["id_submenu"] >= 9 AND $sk["id_submenu"] <= 28):?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-dark bg-secondary-gradient">
                            <div class="card-body bubble-shadow"">
                                <h1><i class="<?= $sk["icon"];?>"></i></h1>
                                <h5 class="op-8"><?= $sk["title"];?></h5>
                                <div class="pull-right mb-0">
                                    <h3 class="fw-bold op-8"> <a href="<?= base_url().$sk["url"];?>" class="btn btn-primary btn-sm ">Buat Surat</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="modal fade" id="sk" tabindex="-1" role="dialog" aria-labelledby="skLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Surat Keluar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form action="<?= base_url('surat/cetaksuratkeluar');?>" method="post">
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