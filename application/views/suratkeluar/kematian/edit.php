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
                            <input type="hidden" name="id" id="id" value="<?= $kematian["id_kematian"];?>">
                            <div class="form-group">
                                <label for="nomor">Nomor Surat</label>
                                <input type="text" name="nomor" id="nomor" class="form-control" value="<?= $kematian["nomor"];?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="dp">Data Penduduk</label>
                                <select name="dp" id="dp" class="form-control">
                                    <?php foreach($data_penduduk as $dp):?>
                                        <?php if($dp["id_data"] == $kematian["data_id"]):?>
                                            <option value="<?= $dp["id_data"];?>" selected><?= $dp["nama"];?></option>
                                        <?php else:?>
                                            <option value="<?= $dp["id_data"];?>"><?= $dp["nama"];?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("dp", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tgl_mati">Tanggal Meninggal</label>
                                <input type="date" name="tgl_mati" id="tgl_mati" class="form-control" value="<?= $kematian['tgl_mati'];?>">
                                <?= form_error("tgl_mati", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jam_mati">Jam Meninggal</label>
                                <input type="text" name="jam_mati" id="jam_mati" class="form-control" placeholder="Masukan Jam Meninggal.." value="<?= $kematian['jam_mati'];?>">
                                <?= form_error("jam_mati", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="sebab">Sebab Meninggal</label>
                                <input type="text" name="sebab" id="sebab" class="form-control" placeholder="Masukan Sebab Meninggal.." value="<?= $kematian['sebab'];?>">
                                <?= form_error("sebab", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="meninggal_di">Tempat Meninggal</label>
                                <textarea name="meninggal_di" id="meninggal_di" cols="30" rows="4" class="form-control" placeholder="Masukan Tempat Meninggal.."><?= $kematian['meninggal_di'];?></textarea>
                                <?= form_error("meninggal_di", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jam_kubur">Jam Di Kuburkan</label>
                                <input type="text" name="jam_kubur" id="jam_kubur" class="form-control" placeholder="Masukan Jam Di Kuburkan.." value="<?= $kematian['jam_kubur'];?>">
                                <?= form_error("jam_kubur", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="dikuburkan_di">Tempat Di Kuburkan</label>
                                <textarea name="dikuburkan_di" id="dikuburkan_di" cols="30" rows="4" class="form-control" placeholder="Masukan Tempat Di Kuburkan.."><?= $kematian['dikuburkan_di'];?></textarea>
                                <?= form_error("dikuburkan_di", '<small class="text-danger">', '</small>');?>
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