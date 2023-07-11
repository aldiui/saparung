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
                    <a href="<?= base_url();?>menu/submenu"><?= $judul;?></a>
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
                        <?php if(validation_errors()):?>
                            <div class="alert alert-danger text-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= validation_errors();?>
                            </div>
                        <?php endif;?>
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#submenu">
                            <i class="fa fa-plus mr-2"></i> Tambah Data
                        </button>
                        <div class="table-responsive">
                            <table id="basic" class="display table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Ikon</th>
                                        <th scope="col">Aktif</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; 
                                    foreach($subMenu as $sm):?>
                                        <tr>
                                            <td scope="row"><?= $no++;?></td>
                                            <td><?= $sm["title"];?></td>
                                            <td><?= $sm["menu"];?></td>
                                            <td><?= $sm["url"];?></td>
                                            <td><?= $sm["icon"];?></td>
                                            <td>
                                                <?php if( $sm["is_active"] == "1"):?>
                                                    <div class="badge badge-success">Aktif</div>
                                                <?php elseif( $sm["is_active"] == "0"):?>
                                                    <div class="badge badge-danger">Belum Aktif</div>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a href="<?= base_url("menu/editsubmenu/").$sm["id_submenu"];?>" class="btn btn-icon btn-success btn-round d-inline-flex align-items-center justify-content-center mr-1"><i class="fa fa-pen-to-square"></i></a>
                                                    <a href="<?= base_url("menu/deletesubmenu/").$sm["id_submenu"];?>" class="btn btn-icon btn-danger btn-round d-inline-flex align-items-center justify-content-center tombol-hapus"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="submenu" tabindex="-1" role="dialog" aria-labelledby="submenuLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Submenu Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form action="<?= base_url('menu/submenu');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Submenu</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Masukan Submenu...">
                    </div>
                    <div class="form-group">
                        <label for="menu_id">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilih Menu</option>
                            <?php foreach($menu as $m):?>
                                <option value="<?= $m["id_menu"];?>"><?= $m["menu"];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-control" placeholder="Masukan Url..." >
                    </div>
                    <div class="form-group">
                        <label for="icon">Ikon</label>
                        <input type="text" name="icon" id="icon" class="form-control" placeholder="Masukan Ikon...">
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input ml-0" checked>
                            <label for="is_active" class="form-check-label">
                                Aktif ?
                            </label>
                        </div>
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