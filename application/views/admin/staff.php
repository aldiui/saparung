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
                    <a href="<?= base_url();?>admin/staff"><?= $judul;?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Tabel Data <?= $judul;?></h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url();?>admin/inputstaff" class="btn btn-primary mb-3">
                            <i class="fa fa-plus mr-2"></i> Tambah Data
                        </a>
                        <div class="table-responsive">
                            <table id="basic" class="display table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; 
                                    foreach($staff as $s):?>
                                        <tr>
                                            <td scope="row"><?= $no++;?></td>
                                            <td><img src="<?= base_url('assets/img/profile/').$s['image'];?>" class="rounded-3 py-2" width="80px" alt=""></td>
                                            <td><?= $s["name"];?></td>
                                            <td><?= $s["jabatan"];?></td>
                                            <td><?= $s["email"];?></td>
                                            <td>
                                                <?php if( $s["is_active"] == "1"):?>
                                                    <div class="badge badge-success">Aktif</div>
                                                <?php elseif( $s["is_active"] == "0"):?>
                                                    <div class="badge badge-danger">Belum Aktif</div>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a href="<?= base_url("admin/editstaff/").$s["id_user"];?>" class="btn btn-icon btn-success btn-round d-inline-flex align-items-center justify-content-center mr-1"><i class="fa fa-pen-to-square"></i></a>
                                                    <a href="<?= base_url("admin/deletestaff/").$s["id_user"];?>" class="btn btn-icon btn-danger btn-round d-inline-flex align-items-center justify-content-center tombol-hapus"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </div>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>