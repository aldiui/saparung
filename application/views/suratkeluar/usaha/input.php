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
                    <a href="<?= base_url();?>surat/usaha">Usaha</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>surat/inputusaha"><?= $judul;?></a>
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
                                <input type="text" name="nomor" id="nomor" class="form-control" value="145.06/<?= $kode;?>/PR-06/<?= getRomawi(date('m'));?>/<?= date('Y');?>" readonly>
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
                                <label for="jenis_usaha">Jenis Usaha</label>
                                <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control" placeholder="Masukan Keperluan..." value="<?= set_value('jenis_usaha');?>">
                                <?= form_error("jenis_usaha", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Usaha</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control" placeholder="Masukan Alamat Usaha.."><?= set_value('alamat');?></textarea>
                                <?= form_error("alamat", '<small class="text-danger">', '</small>');?>
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