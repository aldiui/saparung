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
                    <a href="<?= base_url();?>surat/keramaian">Keramaian</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>surat/inputkeramaian"><?= $judul;?></a>
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
                                <input type="text" name="nomor" id="nomor" class="form-control" value="145.20/<?= $kode;?>/PR-06/<?= getRomawi(date('m'));?>/<?= date('Y');?>" readonly>
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
                                <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                <input type="text" name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" placeholder="Masukan Jenis Kegiatan..." value="<?= set_value('jenis_kegiatan');?>">
                                <?= form_error("jenis_kegiatan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="acara">Untuk Acara</label>
                                <input type="text" name="acara" id="acara" class="form-control" placeholder="Masukan Untuk Acara..." value="<?= set_value('acara');?>">
                                <?= form_error("acara", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tgl_acara">Tanggal Acara</label>
                                <input type="date" name="tgl_acara" id="tgl_acara" class="form-control" value="<?= set_value('tgl_acara');?>">
                                <?= form_error("tgl_acara", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jam">Jam Acara</label>
                                <input type="text" name="jam" id="jam" class="form-control" value="<?= set_value('jam');?>" placeholder="Masukan Jam Acara..">
                                <?= form_error("jam", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat Acara</label>
                                <input type="text" name="tempat" id="tempat" class="form-control" value="<?= set_value('tempat');?>" placeholder="Masukan Tempat Acara...">
                                <?= form_error("tempat", '<small class="text-danger">', '</small>');?>
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