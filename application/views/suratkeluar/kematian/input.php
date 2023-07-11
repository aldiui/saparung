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
                    <a href="<?= base_url();?>surat/kematian">Kematian</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>surat/inputkematian"><?= $judul;?></a>
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
                                <input type="text" name="nomor" id="nomor" class="form-control" value="145.04/<?= $kode;?>/PR-06/<?= getRomawi(date('m'));?>/<?= date('Y');?>" readonly>
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
                                <label for="tgl_mati">Tanggal Meninggal</label>
                                <input type="date" name="tgl_mati" id="tgl_mati" class="form-control" value="<?= set_value('tgl_mati');?>">
                                <?= form_error("tgl_mati", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jam_mati">Jam Meninggal</label>
                                <input type="text" name="jam_mati" id="jam_mati" class="form-control" placeholder="Masukan Jam Meninggal.." value="<?= set_value('jam_mati');?>">
                                <?= form_error("jam_mati", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="sebab">Sebab Meninggal</label>
                                <input type="text" name="sebab" id="sebab" class="form-control" placeholder="Masukan Sebab Meninggal.." value="<?= set_value('sebab');?>">
                                <?= form_error("sebab", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="meninggal_di">Tempat Meninggal</label>
                                <textarea name="meninggal_di" id="meninggal_di" cols="30" rows="4" class="form-control" placeholder="Masukan Tempat Meninggal.."><?= set_value('meninggal_di');?></textarea>
                                <?= form_error("meninggal_di", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jam_kubur">Jam Di Kuburkan</label>
                                <input type="text" name="jam_kubur" id="jam_kubur" class="form-control" placeholder="Masukan Jam Di Kuburkan.." value="<?= set_value('jam_kubur');?>">
                                <?= form_error("jam_kubur", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="dikuburkan_di">Tempat Di Kuburkan</label>
                                <textarea name="dikuburkan_di" id="dikuburkan_di" cols="30" rows="4" class="form-control" placeholder="Masukan Tempat Di Kuburkan.."><?= set_value('dikuburkan_di');?></textarea>
                                <?= form_error("dikuburkan_di", '<small class="text-danger">', '</small>');?>
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