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
                    <a href="<?= base_url();?>surat/suratkeluar">Surat Keluar</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>surat/taksirantanah">Taksiran Tanah</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>surat/inputtaksirantanah"><?=  $judul;?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"><?= $judul;?></h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="kode" id="kode" class="form-control" value="<?= $kode;?>">
                            <div class="form-group">
                                <label for="nomor">Nomor Surat</label>
                                <input type="text" name="nomor" id="nomor" class="form-control" value="145.05/<?= $kode;?>/PR-06/<?= getRomawi(date('m'));?>/<?= date('Y');?>" readonly>
                                <?= form_error("nomor", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="dp">Data Penduduk</label>
                                <select name="dp" id="dp" class="form-control">
                                    <option value="">Pilih Data Penduduk</option>
                                    <?php foreach($data_penduduk as $dp):?>
                                        <option value="<?= $dp["id_data"];?>"><?= $dp["nama"];?></option>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("dp", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="nop">NOP</label>
                                <input type="text" name="nop" id="nop" class="form-control" placeholder="Masukan NOP..." value="<?= set_value('nop');?>">
                                <?= form_error("nop", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukan Kelas..." value="<?= set_value('kelas');?>">
                                <?= form_error("kelas", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="luas">Luas (M<sup>2</sup>)</label>
                                <input type="text" name="luas" id="luas" class="form-control" placeholder="Masukan Luas..." value="<?= set_value('luas');?>">
                                <?= form_error("luas", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukan Batas Harga..." value="<?= set_value('harga');?>">
                                <?= form_error("harga", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="utara">Batas Utara</label>
                                <input type="text" name="utara" id="utara" class="form-control" placeholder="Masukan Batas Utara..." value="<?= set_value('utara');?>">
                                <?= form_error("utara", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="timur">Batas Timur</label>
                                <input type="text" name="timur" id="timur" class="form-control" placeholder="Masukan Batas Timur..." value="<?= set_value('timur');?>">
                                <?= form_error("timur", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="selatan">Batas Selatan</label>
                                <input type="text" name="selatan" id="selatan" class="form-control" placeholder="Masukan Batas Selatan..." value="<?= set_value('selatan');?>">
                                <?= form_error("selatan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="barat">Batas Barat</label>
                                <input type="text" name="barat" id="barat" class="form-control" placeholder="Masukan Batas Barat..." value="<?= set_value('barat');?>">
                                <?= form_error("barat", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="keperluan">Untuk Keperluan</label>
                                <input type="text" name="keperluan" id="keperluan" class="form-control" placeholder="Masukan Untuk Keperluan..." value="<?= set_value('keperluan');?>">
                                <?= form_error("keperluan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>