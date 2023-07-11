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
                    <a href="<?= base_url();?>admin/staff">Staff Desa</a>
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
                            <input type="hidden" name="id" value="<?= $staff["id_user"];?>">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama..." value="<?= $staff['name'];?>">
                                <?= form_error("name", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email..." value="<?= $staff['email'];?>">
                                <?= form_error("email", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="jabatan" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan Jabatan..." value="<?= $staff['jabatan'];?>">
                                <?= form_error("jabatan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <div>
                                    <?php if($staff["is_active"] == 1):?>
                                        <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input ml-0" checked>
                                    <?php else:?>
                                        <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input ml-0">
                                    <?php endif;?>
                                    <label for="is_active" class="form-check-label">
                                        Aktif ?
                                    </label>
                                </div>
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