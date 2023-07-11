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
                    <a href="<?= base_url();?>user">User</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"><?= $judul;?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12 text-center mb-2">
                                <img src="<?= base_url().'assets/img/profile/'.$user['image'];?>" alt="..." width="150px" class="img-rounded mb-2">
                                <?php
                                    $role_cari = $user["role_id"];
                                    $queryCari = "SELECT `user_role`.`id_role`, `role` 
                                                FROM `user_role` JOIN `user` 
                                                ON `user_role`.`id_role` = `user`.`role_id`
                                                WHERE `user_role`.`id_role` = $role_cari 
                                            ";
                                    $jabatan = $this->db->query($queryCari)->row_array();
                                ?>
                                <h2 class="fw-bold"><strong><?= $user["name"];?></strong></h2>
                                <p class="mb-0"><?=  $user["jabatan"];?> (<?= $jabatan["role"];?>)</p>
                                <p class="mb-0"><?= $user["email"];?></p>
                                <small class="text-muted">Daftar Sejak <?= convertDateDBtoIndo(date('Y-m-d',$user["date_created"]));?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Edit Profil</h4>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart("user/edit");?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?= $user['email'];?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'];?>" placeholder="Masukan Nama..">
                                <?= form_error("name", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $user['jabatan'];?>" placeholder="Masukan Jabatan..">
                                <?= form_error("jabatan", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="image" class="d-block">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="Image">Pilih file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="ml-0 btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Ubah Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url("user/changepassword");?>" method="POST">
                            <div class="form-group">
                                <label for="current_password">Password Lama</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Masukan Password Lama..">
                                <?= form_error("current_password", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1">Password Baru</label>
                                <input type="password" name="new_password1" id="new_password1" class="form-control" placeholder="Masukan Password Baru..">
                                <?= form_error("new_password1", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2">Konfirmasi Password</label>
                                <input type="password" name="new_password2" id="new_password2" class="form-control" placeholder="Masukan Konfirmasi Password..">
                                <?= form_error("new_password2", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="ml-0 btn btn-primary">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>