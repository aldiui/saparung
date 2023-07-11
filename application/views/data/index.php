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
                    <a href="<?= base_url();?>data"><?= $judul;?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Tabel <?= $judul;?></h4>
                    </div>
                    <div class="card-body">                    
                        <a href="<?= base_url();?>data/inputdatapenduduk" class="btn btn-primary mb-3">
                            <i class="fa fa-plus mr-2"></i> Tambah Data
                        </a>
                        <div class="table-responsive">
                            <table id="basic" class="display table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pendidikan</th>
                                        <th scope="col">L/P</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; 
                                    foreach($data_penduduk as $dp):?>
                                        <tr>
                                            <td scope="row"><?= $no++;?></td>
                                            <td scope="row"><?= $dp["nik"];?></td>
                                            <td scope="row"><?= $dp["nama"];?></td>
                                            <td scope="row"><?= $dp["pendidikan"];?></td>
                                            <td scope="row">
                                                <?php if($dp["jk"] == "Laki - Laki"):?>
                                                    L
                                                <?php elseif($dp["jk"] == "Perempuan"):?>
                                                    P
                                                <?php endif;?>
                                            </td>
                                            <td scope="row"><?= $dp["alamat"];?></td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a href="<?= base_url("data/editdatapenduduk/").$dp["id_data"];?>" class="btn btn-icon btn-success btn-round d-inline-flex align-items-center justify-content-center mr-1"><i class="fa fa-pen-to-square"></i></a>
                                                    <a href="<?= base_url("data/deletedatapenduduk/").$dp["id_data"];?>" class="btn btn-icon btn-danger btn-round d-inline-flex align-items-center justify-content-center tombol-hapus"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
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