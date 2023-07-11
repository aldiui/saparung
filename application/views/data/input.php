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
                    <a href="<?= base_url();?>data">Data Penduduk</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>data/inputdatapenduduk"><?= $judul;?></a>
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
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK..." value="<?= set_value('nik');?>">
                                <?= form_error("nik", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama..." value="<?= set_value('nama');?>">
                                <?= form_error("nama", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <?php foreach($jk as $jenisk):?>
                                        <option value="<?= $jenisk;?>"><?= $jenisk;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("jk", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lhr">Tempat Lahir</label>
                                <input type="text" name="tempat_lhr" id="tempat_lhr" class="form-control" placeholder="Masukan Tempat Lahir..." value="<?= set_value('tempat_lhr');?>">
                                <?= form_error("tempat_lhr", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lhr">Tanggal Lahir</label>
                                <input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control" <?= set_value('tgl_lhr');?>>
                                <?= form_error("tgl_lhr", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="">Pilih Agama</option>
                                    <?php foreach($agama as $a):?>
                                        <option value="<?= $a;?>"><?= $a;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("agama", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    <option value="">Pilih Pendidikan</option>
                                    <?php foreach($pendidikan as $p):?>
                                        <option value="<?= $p;?>"><?= $p;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("pendidikan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control" placeholder="Masukan Alamat.."><?= set_value('alamat');?></textarea>
                                <?= form_error("alamat", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <?php foreach($status as $s):?>
                                        <option value="<?= $s;?>"><?= $s;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("status", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan..." value="<?= set_value('pekerjaan');?>">
                                <?= form_error("pekerjaan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="ortu">Nama Orang Tua</label>
                                <input type="text" name="ortu" id="ortu" class="form-control" placeholder="Masukan Nama Orang Tua..." value="<?= set_value('ortu');?>">
                                <?= form_error("ortu", '<small class="text-danger">', '</small>');?>
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