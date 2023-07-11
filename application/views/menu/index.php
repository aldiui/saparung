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
                    <a href="<?= base_url();?>menu"><?= $judul;?></a>
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
                        <?= form_error("menu", '<div class="alert alert-danger text-danger" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');?> 
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#menu">
                            <i class="fa fa-plus mr-2"></i> Tambah Data
                        </button>
                        <div class="table-responsive">
                            <table id="basic" class="display table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; 
                                    foreach($menu as $m):?>
                                        <tr>
                                            <td scope="row"><?= $no++;?></td>
                                            <td><?= $m["menu"];?></td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a href="<?= base_url("menu/editmenu/").$m["id_menu"];?>" class="btn btn-icon btn-success btn-round d-inline-flex align-items-center justify-content-center mr-2"><i class="fa fa-pen-to-square"></i></a>
                                                    <a href="<?= base_url("menu/deletemenu/").$m["id_menu"];?>" class="btn btn-icon btn-danger btn-round d-inline-flex align-items-center justify-content-center tombol-hapus"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Menu Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form action="<?= base_url('menu');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" name="menu" id="menu" class="form-control" placeholder="Masukan Nama Menu...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
		</div>
	</div>
</div>