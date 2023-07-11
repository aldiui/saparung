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
                    <a href="<?= base_url();?>menu/submenu">Manajemen Submenu</a>
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
                            <input type="hidden" name="id" class="form-control" value="<?= $submenu['id_submenu'];?>">
                            <div class="form-group">
                                <label for="title">Submenu</label>
                                <input type="text" name="title" id="title" class="form-control" value="<?= $submenu["title"];?>" placeholder="Masukan Submenu..">
                                <?= form_error("title", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="title">Menu</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <?php foreach($menu as $m):?>
                                        <?php if($m["id_menu"] == $submenu["menu_id"]):?>
                                            <option value="<?= $m["id_menu"];?>" selected><?= $m["menu"];?></option>
                                        <?php else:?>
                                            <option value="<?= $m["id_menu"];?>"><?= $m["menu"];?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="url">Url</label>
                                <input type="text" name="url" id="url" class="form-control" value="<?= $submenu["url"];?>" placeholder="Masukan URL..">
                                <?= form_error("url", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="icon">Ikon</label> 
                                <input type="text" name="icon" id="icon" class="form-control" value="<?= $submenu["icon"];?>" placeholder="Masukan Ikon..">
                                <?= form_error("icon", '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="form-group">
                                <div>
                                    <?php if($submenu["is_active"] == 1):?>
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