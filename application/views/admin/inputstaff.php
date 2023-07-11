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
                    <a href="<?= base_url();?>admin/inputstaff"><?= $judul;?></a>
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
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama..." value="<?= set_value('name');?>">
                                <?= form_error("name", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email..." value="<?= set_value('email');?>">
                                <?= form_error("email", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="jabatan" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan Jabatan..." value="<?= set_value('jabatan');?>">
                                <?= form_error("jabatan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" name="password1" id="password1" class="form-control" placeholder="Masukan Password..." value="<?= set_value('password1');?>">
                                <?= form_error("password1", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="password2">Konfirmasi Password</label>
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Masukan Konfirmasi Password..." value="<?= set_value('password2');?>">
                                <?= form_error("password2", '<small class="text-danger">', '</small>');?>
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