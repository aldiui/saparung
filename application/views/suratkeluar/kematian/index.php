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
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Tabel Data <?= $judul;?></h4>
                    </div>
                    <div class="card-body">                    
                        <a href="<?= base_url();?>surat/inputkematian" class="btn btn-primary mb-3">
                            <i class="fa fa-plus mr-2"></i> Tambah Data
                        </a>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">L/P</th>
                                        <th scope="col">Tanggal Meninggal</th>
                                        <th scope="col">Sebab Kematian</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; 
                                    foreach($kematian as $k):?>
                                        <tr>
                                            <td scope="row"><?= $no++;?></td>
                                            <td scope="row"><?= $k["tanggal"];?></td>
                                            <td scope="row"><?= $k["nama"];?></td>
                                            <td scope="row"><?= $k["tgl_lhr"];?></td>
                                            <td scope="row">
                                                <?php if($k["jk"] == "Laki - Laki"):?>
                                                    L
                                                <?php elseif($k["jk"] == "Perempuan"):?>
                                                    P
                                                <?php endif;?>
                                            </td>
                                            <td scope="row"><?= $k["tgl_mati"];?></td>
                                            <td scope="row"><?= $k["sebab"];?></td>
                                            <td scope="row"><?= $k["alamat"];?></td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a href="<?= base_url("surat/editkematian/").$k["id_kematian"];?>" class="btn btn-icon btn-success btn-round d-inline-flex align-items-center justify-content-center mr-1"><i class="fa fa-pen-to-square"></i></a>
                                                    <a href="<?= base_url("surat/deletekematian/").$k["id_kematian"];?>" class="btn btn-icon btn-danger btn-round d-inline-flex align-items-center justify-content-center mr-1 tombol-hapus"><i class="fa fa-trash"></i></a>
                                                    <a href="<?= base_url("surat/cetakkematian/").$k["id_kematian"];?>" class="btn btn-icon btn-info btn-round d-inline-flex align-items-center justify-content-center"><i class="fa fa-print"></i></a>
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