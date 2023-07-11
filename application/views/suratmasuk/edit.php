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
                    <a href="<?= base_url();?>surat/suratmasuk">Surat Masuk</a>
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
                            <input type="hidden" name="id" class="form-control" value="<?= $surat_masuk['id_sm'];?>">
                            <div class="form-group">
                                <label for="tgl_surat">Tanggal Surat</label>
                                <input type="date" name="tgl_surat" id="tgl_surat" class="form-control"  value="<?= $surat_masuk['tgl_surat'];?>">
                                <?= form_error("tgl_surat", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="no_surat">Nomor Surat</label>
                                <input type="text" name="no_surat" id="no_surat" class="form-control" value="<?= $surat_masuk['no_surat'];?>" placeholder="Masukan Nomor Surat..">
                                <?= form_error("no_surat", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="isi_surat">Isi Surat</label>
                                <textarea name="isi_surat" id="isi_surat" cols="30" rows="4" class="form-control" placeholder="Masukan Isi Surat.."><?= $surat_masuk['isi_surat'];?></textarea>
                                <?= form_error("isi_surat", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tujuan">Ditujukan Kepada</label>
                                <input type="text" name="tujuan" id="tujuan" class="form-control" value="<?= $surat_masuk['tujuan'];?>" placeholder="Masukan Tujuan..">
                                <?= form_error("tujuan", '<small class="text-danger">', '</small>');?>
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