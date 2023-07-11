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
                    <a><?=  $judul;?></a>
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
                            <input type="hidden" name="id" id="id" value="<?= $taksiran_tanah['id_tt'];?>">
                            <div class="form-group">
                                <label for="nomor">Nomor Surat</label>
                                <input type="text" name="nomor" id="nomor" class="form-control" value="<?= $taksiran_tanah["nomor"];?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="dp">Data Penduduk</label>
                                <select name="dp" id="dp" class="form-control">
                                    <?php foreach($data_penduduk as $dp):?>
                                        <?php if($dp["id_data"] == $taksiran_tanah["data_id"]):?>
                                            <option value="<?= $dp["id_data"];?>" selected><?= $dp["nama"];?></option>
                                        <?php else:?>
                                            <option value="<?= $dp["id_data"];?>"><?= $dp["nama"];?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error("dp", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="nop">NOP</label>
                                <input type="text" name="nop" id="nop" class="form-control" value="<?= $taksiran_tanah['nop'];?>" placeholder="Masukan NOP..">
                                <?= form_error("nop", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $taksiran_tanah['kelas'];?>" placeholder="Masukan Kelas..">
                                <?= form_error("kelas", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="luas">Luas (M<sup>2</sup>)</label>
                                <input type="text" name="luas" id="luas" class="form-control" value="<?= $taksiran_tanah['luas'];?>" placeholder="Masukan Luas..">
                                <?= form_error("luas", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control" value="<?= $taksiran_tanah['harga'];?>" placeholder="Masukan Harga..">
                                <?= form_error("harga", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="utara">Batas Utara</label>
                                <input type="text" name="utara" id="utara" class="form-control" value="<?= $taksiran_tanah['utara'];?>" placeholder="Masukan Batasan Utara..">
                                <?= form_error("utara", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="timur">Batas Timur</label>
                                <input type="text" name="timur" id="timur" class="form-control" value="<?= $taksiran_tanah['timur'];?>" placeholder="Masukan Batasan Timur..">
                                <?= form_error("timur", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="selatan">Batas Selatan</label>
                                <input type="text" name="selatan" id="selatan" class="form-control" value="<?= $taksiran_tanah['selatan'];?>" placeholder="Masukan Batasan Selatan..">
                                <?= form_error("selatan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="barat">Batas Barat</label>
                                <input type="text" name="barat" id="barat" class="form-control" value="<?= $taksiran_tanah['barat'];?>" placeholder="Masukan Batasan Barat..">
                                <?= form_error("barat", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="keperluan">Untuk Keperluan</label>
                                <input type="text" name="keperluan" id="keperluan" class="form-control" value="<?= $taksiran_tanah['keperluan'];?>" placeholder="Masukan Untuk Keperluan..">
                                <?= form_error("keperluan", '<small class="text-danger">', '</small>');?>
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