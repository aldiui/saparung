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
                    <a><?= $judul;?></a>
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
                            <input type="hidden" name="id" value="<?= $data_penduduk["id_data"];?>">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" value="<?= $data_penduduk['nik'];?>" placeholder="Masukan NIK..">
                                <?= form_error("nik", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_penduduk['nama'];?>" placeholder="Masukan Nama..">
                                <?= form_error("nama", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <?php foreach($jk as $jenisk):?>
                                        <?php if($jenisk == $data_penduduk['jk']):?>
                                            <option value="<?= $jenisk;?>" selected><?= $jenisk;?></option>
                                        <?php else:?>
                                            <option value="<?= $jenisk;?>"><?= $jenisk;?></option>
                                        <?php endif?>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("jk", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lhr">Tempat Lahir</label>
                                <input type="text" name="tempat_lhr" id="tempat_lhr" class="form-control" value="<?= $data_penduduk['tempat_lhr'];?>" placeholder="Masukan Tempat Lahir..">
                                <?= form_error("tempat_lhr", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lhr">Tanggal Lahir</label>
                                <input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control" value="<?= $data_penduduk['tgl_lhr'];?>">
                                <?= form_error("tgl_lhr", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <?php foreach($agama as $a):?>
                                        <?php if($a == $data_penduduk['alamat']):?>
                                            <option value="<?= $a;?>" selected><?= $a;?></option>
                                        <?php else:?>
                                            <option value="<?= $a;?>"><?= $a;?></option>
                                        <?php endif?>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("agama", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    <?php foreach($pendidikan as $p):?>
                                        <?php if($p == $data_penduduk['pendidikan']):?>
                                            <option value="<?= $p;?>" selected><?= $p;?></option>
                                        <?php else:?>
                                            <option value="<?= $p;?>"><?= $p;?></option>
                                        <?php endif?>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("pendidikan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control" placeholder="Masukan Alamat.."><?= $data_penduduk['alamat'];?></textarea>
                                <?= form_error("alamat", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <?php foreach($status as $s):?>
                                        <?php if($s == $data_penduduk['status']):?>
                                            <option value="<?= $s;?>" selected><?= $s;?></option>
                                        <?php else:?>
                                            <option value="<?= $s;?>"><?= $s;?></option>
                                        <?php endif?>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("status", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="<?= $data_penduduk['pekerjaan'];?>" placeholder="Masukan Pekerjaan">
                                <?= form_error("pekerjaan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="ortu">Nama Orang Tua</label>
                                <input type="text" name="ortu" id="ortu" class="form-control" value="<?= $data_penduduk["ortu"];?>" placeholder="Masukan Nama Otang Tua..">
                                <?= form_error("ortu", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

